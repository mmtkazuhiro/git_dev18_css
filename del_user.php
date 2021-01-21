<?php

require_once('funcs.php');
$pdo = db_conn();

// GETで送られてきたidを取得する
$id = $_GET['id'];

//２．データ削除SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_user_table WHERE id =:id");
$stmt ->bindValue(':id', h($id), PDO::PARAM_INT);

$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    // ここもfuncs.phpで関数化したsql_errorを使う
    sql_error($status);
} else {
    redirect('select_user.php');
}