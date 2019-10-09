<?php
// スレッドの内容を保存するためのファイル
require_once('../assets/assets/dbconnect.php');
//$thread_id2 = $_GET['id']; // ？以下でidを選択したから$_GETでスレッドの固有idがcreate.phpから送られてくる。それを代入。
//$thread_id2 = (int)$thread_id2;//整数化完了
$user_id = $_GET['user_id'];
$user_id = (int)$user_id;

$content = $_POST['content'];
date_default_timezone_set('Asia/Tokyo');
$datetime = date('Y/m/d H:m:s');

$thread_id = $_POST['thread_id'];// create.phpでthread.phpがとれてない。
$thread_id = (int)$thread_id;
// var_dump($thread_id, $user_id);die;

//ここでユーザーネームを代入して、thread_contentsに保存していきたい。
$stmt = $dbh->prepare("SELECT name FROM user_registration WHERE id = $user_id");
$stmt->execute();
$results = $stmt->fetchAll();
foreach ($results as $result){
    $name = $result['name'];
}
 


$stmt = $dbh->prepare('INSERT INTO thread_contents (content, datetime, thread_id, userid, name) VALUES (?, ?, ?, ?, ?)');
$stmt->execute([$content, $datetime, $thread_id, $user_id, $name]);//user_idをとってこなくてはいけない

header("Location: ../create.php?id=$thread_id&user_id=$user_id");