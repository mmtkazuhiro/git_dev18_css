<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$precode   = $_POST["precode"];
$code   = $_POST["code"];
$exp   = $_POST["exp"];
$url   = $_POST["url"];


//2. DB接続します
require_once("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(name, precode, code, exp, url, indate)VALUES(:name, :precode, :code, :exp, :url, sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':precode', $precode, PDO::PARAM_STR);
$stmt->bindValue(':code', $code, PDO::PARAM_STR);
$stmt->bindValue(':exp', $exp, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select.php");
}
