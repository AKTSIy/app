<?php
require_once('assets/assets/dbconnect.php');

$user_id = $_GET['user_id'];
$thread_id = $_GET['thread_id'];

$stmt = $dbh->prepare('INSERT INTO bookmark (thread_id, user_id) VALUES (?,?)');
$stmt->execute([$thread_id, $user_id]);

    header("Location: create.php?success=ブックマークしました&id=$thread_id&user_id=$user_id");//idとuser_idをおくる
