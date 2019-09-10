<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>掲示板</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/bootstrap.css'.css'>
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
    <h1>スレッド名</h1>
    

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


$nickname = '';//何これ？下のif文の中出でしか定義していない。検索が実行されていない時も$nicknameを定義している。
if (isset($_GET['nickname'])) {//isset？（イズセット受動態）。検索が実行された場合は、（'nickname'がGET(代入)されたら）｛｝を実行する。isset()の()の中があるとき、1を返す。
	$nickname = $_GET['nickname'];
}

$content = '';//何これ？下のif文の中出でしか定義していない。検索が実行されていない時も$nicknameを定義している。
if (isset($_GET['content'])) {//isset？（イズセット受動態）。検索が実行された場合は、（'nickname'がGET(代入)されたら）｛｝を実行する。isset()の()の中があるとき、1を返す。
	$content = $_GET['content'];
}
// $nickname = $_POST['nickname'];
// $content = $_POST['content'];
//全てのレコードをDBからもってきて、表示させたい。
$stmt = $dbh->prepare('select * FROM apuri WHERE nickname like ?');
$stmt2 = $dbh->prepare('select * FROM apuri WHERE content like ?');
$stmt->execute(["%nickname%"]);
$stmt2->execute(["%content%"]);
$results = $stmt->fetchAll();
$results2 = $stmt2->fetchAll();

// echo 'ニックネーム' . '<br>'. $nickname . '<br>';
// echo '内容' . '<br>' . $content;

$stmt = $dbh->prepare('INSERT INTO apuri (nickname, content) VALUES (?, ?)');
$stmt->execute([$nickname, $content]);//?を変数に置き換えてSQLを実行
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php foreach($results as $v ): ?>
        <p><?php echo $v['nickname'] ?></p>
    <?php endforeach; ?>
    <?php foreach($results2 as $c ): ?>
        <p><?php echo $c['content'] ?></p>
    <?php endforeach; ?>

    
</body>
</html>