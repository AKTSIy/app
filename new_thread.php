<?php
//DBに接続
//ここはdbconnectじゃなくて新規作成？多分そう。dbconnectはただ、first_appと接続しているだけ。

require_once('assets/assets/dbconnect.php');

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
    <header class="kogecha">
        <form class="left padding" action="index.php">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
            <button type="submit" class="btn btn-outline-light">スレッド一覧ページに戻る</button>
        </form>
    </header>




    <form method="GET" action="submit/submit2.php">
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