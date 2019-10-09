<?php
//編集を保存するページ
require_once('../assets/assets/dbconnect.php');
$user_id = $_GET['user_id']; 
$text = $_GET['text'];
$id = $_GET['id'];//thread_idを受け取る。このidはコンテンツの中の番号、id。だから新しくthread_idをとって来ないと、元のスレッドに戻れない。
$thread_id = $_GET['thread_id'];

$stmt = $dbh->prepare("UPDATE thread_contents SET content = (?) WHERE id =$id");
$stmt->execute([$text]);
// var_dump($thread_id);die;
header("Location: ../create.php?id=$thread_id&user_id=$user_id");