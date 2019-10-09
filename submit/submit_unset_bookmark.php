<?php
//ブックマークを解除するページ

require_once('../assets/assets/dbconnect.php');

$user_id = $_GET['user_id'];
// $user_id = (int)$user_id;
// 別にstringでも保存するときに勝手にintに変えてくれるらしい。
$thread_id = $_GET['thread_id'];
// $thread_id =(int)$thread_id;

$dbh->query("DELETE FROM bookmark WHERE thread_id = $thread_id AND user_id = $user_id ");

header("Location: ../create.php?id=$thread_id&user_id=$user_id");
