<?php
//DBに接続
//DBの接続設定があいまい
//ここはdbconnectじゃなくて新規作成？多分そう。dbconnectはただ、first_appと接続しているだけ。
//dbconnectをいち行ずつ日本語訳してみる
//削除機能もあったらいい

require_once('assets/assets/dbconnect.php');
//まずhtmlから始める。htmlで必要な物をそろえて、それを使ってDBを作っていく

$user_id = $_GET['user_id'];
$user_id = (int)$user_id;
?>
<!DOCTYPE html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/style.css'>
<html lang="ja">
<head>
    <meta charset="UTF-8">

    <title>スレッドをたてる</title>
</head>
<body class= "brown">
    <form method="POST" action="submit2.php">
        <div class="center">
            <h2>スレッド名</h2><br>
            <input type="text" name="thread_name" class=yoko>
        </div>
        <div class="center">
            <input type="submit" value="スレッドをたてる">
        </div>
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    </form>
</body>
</html>