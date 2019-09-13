<?php
// スレッドの内容を保存するためのファイル

require_once('assets/assets/dbconnect.php');
//データ保存
// 初めてページを表示したときの変数未定義エラーを消す。

$nickname = $_POST['nickname'];
$content = $_POST['content'];
$datetime = date('Y/m/d H:m:s');
$thread_id = $_POST['thread_id'];// create.phpでthread.phpがとれてない。
// var_dump($thread_id);z1

$stmt = $dbh->prepare('INSERT INTO thread_contents (nickname, content, datetime, thread_id) VALUES (?, ?, ?, ?)');
$stmt->execute([$nickname, $content, $datetime, $thread_id]);

header('Location: create.php');
