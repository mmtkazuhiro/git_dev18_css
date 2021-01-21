<?php
// 0. SESSION開始！！
session_start();

//１．関数群の読み込み
require_once("funcs.php");
loginCheck();

$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

// GETで送られてきたidを取得する
$id = $_GET['id'];

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id = " . $id . ';');
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    // ここもfuncs.phpで関数化したsql_errorを使う
    sql_error($status);
} else {
    // 1個だけデータを取り出して$rowに格納する
    $row = $stmt->fetch();
}


if($_SESSION["kanri_flg"] == 1){
    $yourname1= 'ようこそ'.$_SESSION["name"].'さん。あなたは管理者です。';
    $kanri='<li>'.'<a href="select_user.php">'.'ユーザー管理'.'</a>'.'</li>';
    $logout='<li>'.'<a href="logout.php">'.'Log out'.'</a>'.'</li>';
    $url1 ='select.php';
}elseif($_SESSION["kanri_flg"] == 2){
    $yourname2= 'ようこそ'.$_SESSION["name"].'さん。あなたは一般ユーザーです。';
    $logout='<li>'.'<a href="logout.php">'.'Log out'.'</a>'.'</li>';
    $url1 ='select.php';
}else{
    $yourname3='ようこそ！ゲストユーザーさん';
    $login='<li>'.'<a href="login.php">'.'Log in'.'</a>'.'</li>';
    $url2 ='login3.php';
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/kanri.css" rel="stylesheet">
    <title>ユーザー管理</title>
</head>
<body>

<ul>
    <li><a class="red" href="index.php">CSSメモ帳</a></li>
	<li><a href="<?= $url1?><?= $url2?>">投稿一覧</a></li>
    <?= $login ?>
    <?= $logout ?>
    <?= $kanri; ?>
</ul>

<div class="you1">
        <?= $yourname1; ?>
</div>

<div class="you2">
        <?= $yourname2; ?>
</div>

<div class="you3">
        <?= $yourname3; ?>
</div>

<div class="outreturn">
    <a class="return" href="select_user.php">←ユーザー管理一覧に戻る</a>
</div>

<div class="title">ユーザー変更</div>

<form action="update_user.php" method="post">

<table>
            <tr>
                <th>ユーザーネーム</th>
                <td><input type="text" name="name" value="<?= $row['name']; ?>"></td>
            </tr>

            <tr>
                <th>管理者/一般ユーザー</th>
                <td><input type="radio" name="kanri_flg" value="1" <?= $row['kanri_flg'] == "1" ? ' checked' : ''?>>管理者
                    <input type="radio" name="kanri_flg" value="2" <?= $row['kanri_flg'] == "2" ? ' checked' : ''?>>一般ユーザー
                </td>
            </tr>
            <tr>
                <th>退社/入社</th>
                <td><input type="radio" name="life_flg" value="0" <?= $row['life_flg'] == "0" ? ' checked' : ''?>>在社
                    <input type="radio" name="life_flg" value="1" <?= $row['life_flg'] == "1" ? ' checked' : ''?>>退社
            </td>
            </tr>
        </table>

        <input type="hidden" name="id" value="<?= $row['id']; ?>">

        <div class="outfix">
            <input type="submit" value="訂正" class="fix">
        </div>
</form>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
// エンターで送信されないようにする
// ここから
$(function(){
    $("input"). keydown(function(e) {
        if ((e.which && e.which === 13) || (e.keyCode && e.keyCode === 13)) {
            return false;
        } else {
            return true;
        }
    });
});
// ここまで
</script>
</html>