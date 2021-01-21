<?php
//1. POSTデータ取得
$check1 = $_POST["check1"];

//2. DB接続します
require_once("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(check1, indate)VALUES(:check1, sysdate())");
$stmt->bindValue(':check1', $check1, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select_show.php");
}
