<?php
// スレッドを立てるためのファイル
// 先生の話だと1つのテーブルにスレッド名とid、もう一つのテーブルにそのidと一致するような
// プライマリーキー？とふつうのidとあとなんだっけ？
// 2つのテーブルを用意して、上の関係を構築するようなSQLをかく。
// テーブルにはどんな項目がj必要なのか
// text と varchar の使い分けを聞く
// DBに接続
require_once('assets/assets/dbconnect.php');
// データを保存する
// submit.phpをパクる
$thread_name = $_POST['threadname'];// nameがthreadnameを受け取る
$thread_content = $_POST['threadcontent'];// nameがthreadcontentを受け取る
$thread_id = $_POST['threadid'];// nameがthreadidを受け取る

$stmt1 = $dbh->prepare('INSERT INTO thread_name (threadname) VALUES (?)');
$stmt1->execute([$thread_name]);

$stmt2 = $dbh->prepare('INSERT INTO thread_content (threadcontent, threadid) VALUES (?, ?)');
$stmt2->execute([$thread_content, $thread_id]);
