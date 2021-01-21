<?php
// 0. SESSION開始！！
session_start();


//１．関数群の読み込み
require_once("funcs.php");
loginCheck();

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($stmt);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= 
        '<tr>'.
            '<td>'.
                h($result['id']).
            '</td>'.

            '<td>'.
                h($result['name']) .
            '</td>'.

            '<td>'.
                h($result['lid']) .
            '</td>'.

            '<td>'.
                '**********' .
            '</td>'.

            '<td class="kanri_flg">'.
                '<div hidden>'.
                    h($result['kanri_flg']) .
                '</div>'.
            '</td>'.

            '<td class="life_flg">'.
                '<div hidden>'.
                    h($result['life_flg']) .
                '</div>'.
            '</td>'.

            '<td>'.
                '<a class="fix_btn" href= "fix_user.php?id=' .$result['id'] .'">'.
                    h($result['fix']) .
                '</a>'.
            '</td>'.

            '<td>'.
                '<a class="del_btn" href= "del_user.php?id=' .$result['id'] .'">'.
                    h($result['del']) .
                '</a>'.
            '</td>'.
        '</tr>';

}
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/user.css" rel="stylesheet">
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


<div class="title">ユーザー管理一覧</div>

<table class="table">
        <tr>
            <th class="num">管理番号</th>
            <th class="name">ユーザーネーム</th>
            <th class="id">ID</th>
            <th class="pw">パスワード</th>
            <th class="kanri">管理者/一般</th>
            <th class="life">在社/退社</th>
            <th class="fix">修正</th>
            <th class="del">削除</th>
        </tr>
        <?= $view; ?>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/user.js"></script>
</body>
</html>