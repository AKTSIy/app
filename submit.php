<?php
// スレッドの内容を保存するためのファイル

require_once('assets/assets/dbconnect.php');
//データ保存
// 初めてページを表示したときの変数未定義エラーを消す。

$nickname = $_POST['nickname'];
$content = $_POST['content'];
$datetime = date('Y/m/d H:m:s');
$thread_id = $_POST['thread_id'];// create.phpでthread.phpがとれてない。
// var_dump($thread_id);

$stmt = $dbh->prepare('INSERT INTO thread_contents (nickname, content, datetime, thread_id) VALUES (?, ?, ?, ?)');
$stmt->execute([$nickname, $content, $datetime, $thread_id]);

// $stmt1 = $dbh->prepare('SELECT * FROM threads');
// $stmt1->execute();
// $results1 = $stmt1->fetchAll();
    // foreach($results1 as $result) {
//     header("Location: create.php?=$result[id] ");//スレッドidは取れたから、createで受け取るだけ。ほんとにとれたのかわからない
// }
header('Location: create.php');// create.
// スレッドの内容を表示するだけのファイルにしたほうがいい。
// なぜなら、headerに余計な値を交錯してしまうと混乱してしまうから。