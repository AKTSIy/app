<?php
// スレッドを立てるためのファイル
// 先生の話だと1つのテーブルにスレッド名とid、もう一つのテーブルにそのidと一致するような
// プライマリーキー？とふつうのidとあとなんだっけ？
// 2つのテーブルを用意して、上の関係を構築するようなSQLをかく。
// テーブルにはどんな項目がj必要なのか
// text と varchar の使い分けを聞く
// DBに接続
require_once('../assets/assets/dbconnect.php');

$user_id = $_GET['user_id'];
$user_id = (int)$user_id;
// var_dump($user_id);die;
// データを保存する
// submit.phpをパクる
$thread_name = $_GET['thread_name'];// nameがthreadnameを受け取る
// var_dump($thread_name, $_POST);die;
// $thread_content = $_POST['threadcontent'];// nameがthreadcontentを受け取る
// $thread_id = $_POST['threadid'];// nameがthreadidを受け取る
//                                  テーブル名（カラム名）
$stmt1 = $dbh->prepare('INSERT INTO threads (name) VALUES (?)');
$stmt1->execute([$thread_name]);

// $stmt2 = $dbh->prepare('INSERT INTO thread_contents (threadcontent, threadid) VALUES (?, ?)');
// $stmt2->execute([$thread_content, $thread_id]);

header("Location: ../index.php?user_id=$user_id");