<?php
// ユーザー名を登録するためのファイル
// DBに接続
require_once('assets/assets/dbconnect.php');
// データを保存する
$user_name = $_POST['user_name'];// nameがusernameを受け取る
// var_dump($user_name, $_POST);die;
//                                  テーブル名（カラム名）
$stmt1 = $dbh->prepare('INSERT INTO user_registration (user_name) VALUES (?)');
$stmt1->execute([$user_name]);

// $stmt2 = $dbh->prepare('INSERT INTO thread_contents (threadcontent, threadid) VALUES (?, ?)');
// $stmt2->execute([$thread_content, $thread_id]);

header('Location: index.php');