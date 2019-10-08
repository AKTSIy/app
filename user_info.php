<?php
//ユーザーが自分の情報を見るページ
require_once('assets/assets/dbconnect.php');
$user_id = $_GET['user_id']; 

$stmt = $dbh->prepare("SELECT * FROM user_registration WHERE id = $user_id");
$stmt->execute();
$results = $stmt->fetchAll();





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/style.css'>
    <title>ユーザー情報</title>
</head>
<body>
    <table border="1" class="center2">
        <tr>
            <td>ユーザー名</td>
            <td>ユーザーid</td>
            <td>パスワード</td>
        </tr>
        <tr>
        <?php foreach ($results as $result) : ?>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['id']; ?></td>
            <td><?php echo $result['password']; ?></td>
        <?php endforeach; ?>
            
        </tr>
    </table>
    <div>
        <p>ブックマーク一覧</p>

    </div>    

</body>
</html>