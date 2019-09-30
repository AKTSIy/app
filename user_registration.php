<?php
require_once('assets/assets/dbconnect.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/style.css'>
    <title>Document</title>
</head>

<body class="brown">
    <h2 class="center">ユーザー登録</h2>
    <form method="POST" action="submit3.php">
        <div class="center">
            ニックネーム<br>
            <input type="text" name="user_name">
            <input type="submit" class="btn btn-outline-info" value="登録する">
        </div>
    </form>
</body>

</html>