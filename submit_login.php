<!-- login.phpで送られてきたユーザー名をデータベースと照合して存在したらそのユーザーidを送り返す -->
<?php
require_once('assets/assets/dbconnect.php');

$user_name = $_GET['user_name'];

$stmt = $dbh->prepare("SELECT id FROM user_registration WHERE name = '$user_name'");//ここの''忘れがち。
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $result) {
    header("Location: index.php?user_id=$result[id]");//resultの中のidに''はいらないらしい
}






?>