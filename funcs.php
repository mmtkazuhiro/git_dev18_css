<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
function db_conn()
{
    try {
        $db_name = "gs_kadai3";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "localhost"; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header("Location: " . $file_name);
    exit();
}


// ログインチェク処理 loginCheck()
function loginCheck(){
if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()){
    // exitはこの場で処理を強制終了させる関数で、()の中の文字を表示させることもできる。
    header("Location: login.php");
    exit();
}else{
    // session_idは他のブラウザを開いたり、一定時間経たなかったりした限り保持できるが
    // ログインできた場合、session_regenerate_id関数でidを更新する
    // 人のIDを盗んで流用するのを防ぐ→セキュリティー上の安全性を確保するために以下の処理を行う
    // →「セッションハイジャック」と検索すればよくわかる
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
}
}