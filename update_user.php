<?php
//１．関数群の読み込み
require_once("funcs.php");

//1. POSTデータ取得
    $name = $_POST['name'];
    $kanri_flg = $_POST['kanri_flg'];
    $life_flg = $_POST['life_flg'];    
    $id = $_POST['id'];    

//2. DB接続
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE 
                        gs_user_table 
                    SET 
                        name = :name,
                        kanri_flg = :kanri_flg,
                        life_flg = :life_flg
                        WHERE
                        id = :id;
                        ");

$stmt->bindValue(':name', $name, PDO::PARAM_STR); 
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect('select_user.php');
}
