<?php
// 0. SESSION開始！！
session_start();

//１．関数群の読み込み
require_once("funcs.php");
loginCheck();

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($stmt);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $view .= '<div class="flame">'.
                '<span class="flame_title">'.
                        '<input class="checkbox" type="checkbox" name="check" id ="check" value = " ' .h($result['code']) .' " onchange="mycheck(this.value)">'.
                    '<a href="'. h($result['url']). '" class="link" target="_blank">'.
                        h($result['name']).
                    '</a>'.
                '</span>'.

                '<div class="naiyou">'.
                    '<p class="code">'.
                        h($result['precode']) .'{'.'<br>'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.' &nbsp'.
                        h($result['code']) .'<br>'.'}'.
                    '</p>'.
                    '<p class="exp">'.
                        h($result['exp']) .
                    '</p>'.
                '</div>'.

                '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.
                '<a class="show" href= "detail.php?id=' .$result['id'] .'">'.
                    h($result['show']) .
                '</a>';


    if($_SESSION["kanri_flg"] == 1){
        $view .= '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';
        $view .= '<a class="del" href="delete.php?id=' . $result["id"] . '">';
        $view .= '削除';
        $view .= '</a>';
    }

    $view .= '</div>';


    }
    if($_SESSION["kanri_flg"] == 1){
        $view1= '<th class="del">削除</th>';
    }

}

if($_SESSION["kanri_flg"] == 1){
    $yourname1= 'ようこそ'.$_SESSION["name"].'さん。あなたは管理者です。';
    $kanri='<li>'.'<a href="select_user.php">'.'ユーザー管理'.'</a>'.'</li>';
    $logout='<li>'.'<a href="logout.php">'.'Log out'.'</a>'.'</li>';
    $url1 ='select.php';
    $kanrisha ='4. あなたは管理者のため、削除ボタンをクリックすると、その投稿を削除することができます。';
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
    <link href="css/select.css" rel="stylesheet">
    <title>CSSメモ帳 掲示板</title>

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


<div class="title">CSSメモ帳 掲示板</div>

<div class="howto">
        <div class="content" onclick="obj=document.getElementById('open').style; obj.display=(obj.display=='none')?'block':'none';">
            <div style="cursor:pointer;">▼ 使い方 (クリックすると展開します)</div>
        </div>
            <div id="open" style="display:none;clear:both;">

                <p class="setumei">このページはcssメモ帳で入力した結果をまとめたページです。<br><br>
                1. 表示ボタンをクリックすると該当のcssが適用されたサンプルを確認することができます。<br>
                2. 2つ以上のcssをまとめて適用させたい場合はチェックをつけて「まとめて表示」ボタンをクリックしてください。<br>
                3. コード名部分をクリックすると、関連のあるページに遷移します (※URLを保存している場合のみ)。<br>
                <?= $kanrisha; ?></p>
            </div>
    </div>


<form name="form" action="insert_select.php" method="post">

    <?= $view; ?>
    
    <input type="hidden" id="result" name="check1">

    <input id="button_top" type="submit" value="まとめて表示">
    </form>


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/select.js"></script>

</html>
