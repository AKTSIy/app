<!-- このページでスレッドに内容を表示したい -->
<!-- thread_id を紐付けたい
thread_id = threadsのid の形

threadsからデータを所得。 -->
<?php
$thread_id = $_GET['id']; // ？以下でidを選択したから$_GETでidが送られてくる。それを代入。

// threadid が0のまま
// datetimeが00000？－＞date()で自動的に時間をとれる。









// $stmt = $dbh->prepare('SELECT * FROM thread_contents');
// $stmt->execute();
// $results = $stmt->fetchAll();

// foreach ($results as $thread_id) {
//     $thread_id['thread_id'];
// }

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
    <form method="POST" action="submit.php">
        <div class="center">
            ニックネーム<br>
            <input type="text" name="nickname">
        </div>
        <div class="center">
            内容<br>
            <textarea name="content" class="yoko"></textarea>
        </div>
        <input type="hidden" value="<?php echo $thread_id ?>">
        <div class="center">
            <input type="submit" value="送信">
        </div>
    </form>
</body>

</html>