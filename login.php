<?php
require_once('assets/assets/dbconnect.php');
if (isset($_GET['caution'])) {
    $caution=$_GET['caution'];
}else{
    $caution=' ';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/style.css'>
    <title>ログイン</title>
</head>

<body class="brown center">
    <h1>ログインしてください</h1>
    <p class="red"><?php echo $caution;?></p>
    ユーザー名<br>
    <form method="POST" action="submit/submit_login.php">
    <!-- <form method="POST" action="submit_login.php"> -->
        <input type="text" name="user_name"><br>
        パスワード<br>
        <input type="text" name="password">
        <input type="submit" value="ログイン">
    </form>
    <h3>新規登録はこちら</h3>
    <form class="padding" action="user_registration.php">
        <button type="submit" class="btn btn-outline-primary">ユーザー登録</button>
    </form>
</body>

</html>