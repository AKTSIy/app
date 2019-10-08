<!-- このページでスレッドに内容を表示したい -->

<?php
// error_reporting(0);
require_once('assets/assets/dbconnect.php');
$thread_id = $_GET['id']; // ？以下でidを選択したから$_GETでスレッドの固有idがindex.phpから送られてくる。それを代入。次は
//$thread_id = intval($thread_id);整数化成功
$thread_id = (int) $thread_id; //整数化成功
//var_dump($thread_id);//stringで受け取っている。ここはintegerで受けとるべき。なぜstringになった？indexの中ではinteger型だったけど、こっちに送られてからはstringとvardumされている。

$stmt = $dbh->prepare("SELECT * FROM thread_contents WHERE thread_id = $thread_id");
$stmt->execute();
$results = $stmt->fetchAll();

$stmt1 = $dbh->prepare("SELECT * FROM threads WHERE id = $thread_id");
$stmt1->execute();
$results1 = $stmt1->fetchAll();

$user_id = $_GET['user_id']; //user_idとしてnameをつけられたデータがここに入る。ここで仮に１を代入してみるときちんとユーザー名まで表示される。
$user_id = (int)$user_id;
// var_dump(isset($_GET['success']));die;
if (isset($_GET['success'])) {
    $success = $_GET['success'];   
}
// $success = if isset($_GET['success']) != false  ? '' : $_GET['success']
// var_dump($success);die;
// if (isset($_GET['success'])) {
//     echo $success;   
// }
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
    <!-- スレッドの詳細を表示 -->
    <!-- indexから送られてきたthreaad_idと一致するレコードのデータを一覧表示する -->
    <header class="kogecha">
        <div class="flex">
            <form action="index.php" class="margin">
                <button type="submit" class="btn btn-outline-light">スレッド一覧ページへ</button>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            </form>
            <form action="submit_bookmark.php" class="margin">
                <input type="hidden" name="thread_id" value="<?php echo $thread_id; ?>" >
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <button type="submit" class="btn btn-outline-light">ブックマークする</button>
            </form>
        </div>
    </header>

    <?php if (isset($_GET['success'])) :?>
    <p class="shita"><?php echo $success; ?></p>
    <?php endif;?>

    <?php foreach ($results1 as $result1) : ?>
        <h1 class="center"><?php echo $result1['name']; ?></h1>
        <!--スレッド名の表示 -->
    <?php endforeach; ?>

    <?php foreach ($results as $result) : ?>

        <p class="center"><?php echo 'ユーザー名：' . $result['name'] . '　' . $result['datetime']; ?></p>
        <p class="center"><?php echo '内容' . '<br>' . $result['content']; ?></p>
        <p><?php if ($result['userid'] = $user_id) :?>
                <form action="edit.php" class="center">
                    <button type="submit" class="btn btn-outline-info">編集する</button>
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <input type="hidden" name="text" value="<?php echo $result['content'] ?>">
                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                    <input type="hidden" name="thread_id" value="<?php echo $thread_id; ?>">
                </form>
            <?php endif; ?>

    <?php endforeach; ?>
    <!-- ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->
    <?php foreach ($results1 as $result1) : ?>
        <form method="POST" action="submit.php?id=<?php echo $result1['id']; ?>&user_id=<?php echo $user_id; ?>">
            <!-- urlでスレッドidを送っている、hiddenとかぶってる？ -->
            <!-- なぜここだけPOSTで送っていいるのか？ -->
            <!-- idとuser_id、thread_idはPOSTで送信されるのではないのか？
                    url の後ろにあるやつはGETで送信されて、heddunはformに囲われているからPOSTで送信されてる。 -->
            <!-- <div class="center">...ニックネームを消して、ユーザー名を表示させる。
                ニックネーム<br>
                <input type="text" name="nickname">...ここのデータ送信が消える訳だから、submit.phpを修正する。
            </div> -->
            <div class="center">
                内容<br>
                <textarea name="content" class="yoko"></textarea>
            </div>
            <input type="hidden" value="<?php echo $thread_id ?>" name="thread_id"><!-- index.phpから送られてきたidをvalueに代入してる-->
            <!-- textなどの内容はいつもvalueで入っている。 -->
            <div class="center">
                <input type="submit" value="送信">
            </div>
        </form>
    <?php endforeach; ?>
</body>

</html>