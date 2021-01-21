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
    <link href="css/index.css" rel="stylesheet">
    <title>CSSメモ帳 投稿</title>
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


<div class="title">CSSメモ帳 投稿</div>

    <form action="insert.php" method="post">
        <table class="table">
            <tr>
                <th>名前</th>
                <td><input type="text" name="name" style="width:330px;height:35px" placeholder="例: フォントの色"></td>
            </tr>

            <tr>
                <th>コード</th>
                <td>
                *<a href="https://developer.mozilla.org/ja/docs/Web/CSS/Pseudo-classes" target="_blank">擬似クラス</a>用に".sample"部分も<br>変更できるようにしていますが、.sapmleは変更しないでください。*
                <p class="precode"><input type="text" name="precode" style="width:200px;height:25px" value=".sample" placeholder=".sample">{</p>
                <p class="code"><textarea type="text" name="code" style="width:300px;height:80px" placeholder="例: color: blue;"></textarea></p><div class="kakko2">}</div></td>
            </tr>

            <tr>
                <th>説明</th>
                <td><textarea type="text" name="exp" style="width:330px;height:80px" placeholder="例: フォントの色を変更できる。具体的な色を書いてもいいし、RBGやカラーコードでの指定も可能。"></textarea></td>
            </tr>

            <tr>
                <th>URL</th>
                <td><input type="text" name="url" style="width:330px;height:35px" placeholder="例: www.sample.sample"></td>
            </tr>
            
        </table>

        <div class="outsend">
            <input type="submit" value="送信" class="send">
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