<?php
session_start();
require_once("funcs.php");

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
    $yourname3='新規登録完了しました！ログインしてください';
    $login='<li>'.'<a href="login.php">'.'Log in'.'</a>'.'</li>';
    $url2 ='login3.php';
}



?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/log.css" rel="stylesheet">
    <title>ログイン</title>
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

<div class="you1">
        <?= $yourname3; ?>
</div>

<form action="login_act.php" method="POST">

    <div class="title">ログイン</div>

    <table class="log">
        <tr>
            <th>ID</th>
            <td><input type="text" name="lid"></td>
        </tr>

        <tr>
            <th>パスワード</th>
            <td><input type="password" name="lpw"></td>
        </tr>
    </table>

    <div class="outlogin">
        <input type="submit" value="Login" class="login">
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