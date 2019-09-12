<?php
//DBに接続
//DBの接続設定があいまい
//ここはdbconnectじゃなくて新規作成？多分そう。dbconnectはただ、first_appと接続しているだけ。
//dbconnectをいち行ずつ日本語訳してみる
//削除機能もあったらいい

require_once('assets/assets/dbconnect.php');
//まずhtmlから始める。htmlで必要な物をそろえて、それを使ってDBを作っていく
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/style.css'>

    <title>スレッドをたてる</title>
</head>
<body>
    <form method="POST" action="submit2.php">
        <div class="center">
            <h2>スレッド名</h2><br>
            <input type="text" name="thread_name" class=yoko1>
        </div>
        <div class="center">
            <input type="submit" value="スレッドをたてる">
        </div>



    </form>
</body>
</html>