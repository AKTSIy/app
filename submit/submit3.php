<?php
// ユーザー名を登録するためのファイル
// DBに接続
require_once('../assets/assets/dbconnect.php');
// データを保存する
$user_name = $_POST['user_name'];// nameがusernameを受け取る
// var_dump($user_name, $_POST);die;
$password = $_POST['password'];
//                                  テーブル名（カラム名）
$stmt1 = $dbh->prepare('INSERT INTO user_registration (name, password) VALUES (?,?)');
$stmt1->execute([$user_name, $password]);

// $stmt2 = $dbh->prepare('INSERT INTO thread_contents (threadcontent, threadid) VALUES (?, ?)');
// $stmt2->execute([$thread_content, $thread_id]);

$stmt = $dbh->prepare("SELECT id FROM user_registration WHERE name = '$user_name'");//ここの''忘れがち。
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $result) {
    header("Location: ../index.php?user_id=$result[id]");//resultの中のidに''はいらないらしい
}
