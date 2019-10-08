<!-- login.phpで送られてきたユーザー名をデータベースと照合して存在したらそのユーザーidを送り返す -->
<?php
require_once('assets/assets/dbconnect.php');
// var_dump($_POST['user_name']);die;
$user_name = $_POST['user_name'];

$password = $_POST['password'];

$stmt = $dbh->prepare("SELECT * FROM user_registration WHERE name = '$user_name'");//ここの''忘れがち。
$stmt->execute();
$results = $stmt->fetchAll();

foreach ($results as $result) {
    // var_dump($result['password']);die;

    if ($password = $result['password]']) {
        header("Location: index.php?user_id=$result[id]");//resultの中のデータで文字列なら''をつける。
    }else{
        header("Location: login.php?caution=ユーザー名かパスワードが間違っています");//resultの中のidに''はいらないらしい
    }
}

