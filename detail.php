<?php
session_start();

require_once('funcs.php');
loginCheck();

$pdo = db_conn();

// GETで送られてきたidを取得する
$id = $_GET['id'];


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id = " . $id . ';');
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
    <link href="css/detail.css" rel="stylesheet">
    <style>
    
    .sample{
    <?= $row['code']; ?>
    }

    </style>
    <title>サンプル表示</title>
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
    <a class="return" href="select.php">←投稿一覧へ戻る</a>
</div>

<div class="title">表示結果↓</div>


<div class="all">
    <div class="sample">これはサンプルです</div>
    <img src="img/maru.png" alt="これはサンプルです" class="sample">
</div>

<div class="title2">元々のスタイル↓</div>

<div class="all">
    <div class="origin">これはサンプルです</div>
    <img src="img/maru.png" alt="これはサンプルです" class="origin">
</div>
    
</body>
</html>