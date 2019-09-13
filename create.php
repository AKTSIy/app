<!-- このページでスレッドに内容を表示したい -->
<!-- thread_id を紐付けたい
thread_id = threadsのid の形

threadsからデータを所得。 -->
<?php
require_once('assets/assets/dbconnect.php');

$stmt = $dbh->prepare('SELECT * FROM thread_contents');
$stmt->execute();
$results = $stmt->fetchAll();

$thread_id = $_GET['id']; // ？以下でidを選択したから$_GETでidが送られてくる。それを代入。

// threadid が0のまま
// datetimeが00000？－＞date()で自動的に時間をとれる。

// $stmt = $dbh->prepare('SELECT * FROM thread_contents');
// $stmt->execute();
// $results = $stmt->fetchAll();

// foreach ($results as $thread_id) {
//     $thread_id['thread_id'];
// }

// $stmt = $dbh->prepare('SELECT * FROM thread_contents WHERE thread_id = $thread_id '); // ここでエラーが出てしまう。$thread_idが見つからない？GETで送られてきてるはずだけど
// $stmt->execute();
// $results = $stmt->fetchAll();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!-- スレッドの詳細を表示 -->
    <!-- indexから送られてきたthreaad_idと一致するレコードのデータを一覧表示する -->

    <?php foreach ($results as $result) : ?>
        <p class="center"><?php echo 'ニックネーム' . '<br>' . $result['nickname']; ?></p>
        <p class="center"><?php echo '内容' . '<br>' . $result['content']; ?></p>
        <p class="center"><?php echo '日付' . '<br>' . $result['datetime']; ?></p>
    <?php endforeach; ?>
    <!-- スレッドを表示している中に書き込むことで、そのすれidを受け取ることができる -->
    <form method="POST" action="submit.php">
        <div class="center">
            ニックネーム<br>
            <input type="text" name="nickname">
        </div>
        <div class="center">
            内容<br>
            <textarea name="content" class="yoko"></textarea>
        </div>
        <input type="hidden" value="<?php echo $thread_id ?>" name="thread_id">
        <!-- textなどの内容はいつもvalueで入っている。 -->
        <div class="center">
            <input type="submit" value="送信">
        </div>
    </form>
</body>

</html>