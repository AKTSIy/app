<?php
require_once('assets/assets/dbconnect.php');

$user_id = $_GET['user_id'];
$thread_id = $_GET['thread_id'];

$stmt = $dbh->prepare("SELECT name FROM threads WHERE id = $thread_id");
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $result){
    $thread_name = $result['name'];
}

$stmt = $dbh->prepare('INSERT INTO bookmark (thread_id, user_id, name) VALUES (?,?,?)');
$stmt->execute([$thread_id, $user_id, $thread_name]);

    header("Location: create.php?success=ブックマークしました&id=$thread_id&user_id=$user_id");//idとuser_idをおくる

