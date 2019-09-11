    <!-- 2．表示される欄 -->

<?php

require_once('assets/assets/dbconnect.php');

//データ保存
// 初めてページを表示したときの変数未定義エラーを消す。

if($_POST['nickname'] == NULL ) {//これはだめなの？エラーが出る。$_POSTを宣言した時点でundefindが出てしまう。
    $nickname = '';
} else {
    $nickname = $_POST['nickname'];
}
if($_POST['content'] == NULL ) {
    $content = '';
} else {
    $content = $_POST['content'];
}

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
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>掲示板</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/bootstrap.css'> -->
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/style.css'>
    <!-- cssが適用されないのは何故？...キャッシュが残ってたから -->
    <!-- 4．スレッドを立てられるようにしたい -->
    <script src='main.js'></script>
</head>
<body>
    <!-- <div class="row"> -->
        <h2 class="center">タイトル</h2>
    <!-- </div> -->
        <h1 class="center">スレッド名</h1>
    <!-- 1．入力する欄 -->
    <form method="POST" action="index.php">

    <div class="center">
        ニックネーム<br>
        <input type="text" name="nickname">
    </div>
    <div class="center">
        内容<br>
        <textarea name="content" class="yoko"></textarea>
    </div>
    <div class="center">
        <input type="submit" value="送信">
    </div>
    </form>
    <?php foreach ($results as $result): ?>
        <p><?php echo 'ニックネーム' . '<br>' . $result['nickname']; ?></p>
        <p><?php echo '内容' . '<br>' . $result['content']; ?></p>
    <?php endforeach; ?>
    <!-- 3．フッター -->
</body>
</html>

