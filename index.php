<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>掲示板</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/bootstrap.css'.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/style.css'.css'>
    
    <script src='main.js'></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2 class="col-4"></h2>
            <h2 class="col-4">タイトル</h2>
            <h2 class="col-4"></h2>
        </div>
    </div>
    <!-- 3．ヘッダー -->
    <!-- 2．表示される欄 -->
    <div>
        <h1 class="a">スレッド名</h1>
    </div>

    <!-- 1．入力する欄 -->
    <form method="POST" action="index.php">
        <div>
            ニックネーム<br>
            <input type="text" name="nickname">
        </div>
        <div>
            内容<br>
            <textarea name="content"></textarea>
        </div>
        <input type="submit" value="送信">
    </form>
    <!-- 3．フッター -->
</body>
</html>
    <!-- 2．表示される欄 -->

<?php

require_once('assets/assets/dbconnect.php');

//データ保存
$nickname = $_POST['nickname'];
$content = $_POST['content'];

$stmt = $dbh->prepare('INSERT INTO apuri (nickname, content) VALUES (?, ?)');
$stmt->execute([$nickname, $content]);


//SQLを実行,データの一覧表示
$stmt = $dbh->prepare('SELECT * FROM apuri');
$stmt->execute();
$results = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>掲示板</title>
</head>
<body>
    <?php foreach ($results as $result): ?>
        <p><?php echo 'ニックネーム' . '<br>' . $result['nickname']; ?></p>
        <p><?php echo '内容' . '<br>' . $result['content']; ?></p>
    <?php endforeach; ?>
</body>
</html>

