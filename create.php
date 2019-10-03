<!-- このページでスレッドに内容を表示したい -->

<?php
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
//だから、ユーザーidをどうやってここまで持ってくるか考える。

// $stmt2 = $dbh->prepare("SELECT name FROM user_registration WHERE id = $user_id"); //user_idを送信してこないとシンタックスエラーになる
// $stmt2->execute();
// $results2 = $stmt2->fetchAll();

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

// スレッド名を表示させたい。


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
    <!-- #endregion -->
    <?php foreach ($results1 as $result1) : ?>
        <h1 class="center"><?php echo $result1['name']; ?></h1>
        <!--スレッド名の表示 -->
    <?php endforeach; ?>
    <?php //var_dump($user_id); die;?><!-- １が表示できてる -->
    <form action="index.php?user_id=<?php echo $user_id; ?>">
        <button type="submit" class="btn btn-outline-danger">スレッド一覧ページへ</button>
    </form>
    <!-- ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーここのforeachが２つになってるから交互に表示されないーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->
    <!-- <?php// foreach ($results2 as $result2) : ?>
        <p class="center"><?php// echo 'ユーザー名' . $result2['name']; ?></p>
        //ユーザー名の表示をしたい
        <?php// endforeach; ?> -->

    <?php foreach ($results as $result) : ?>

        <p class="center"><?php echo 'ユーザー名：' . $result['name'] . '　' . $result['datetime']; ?></p>
        <!--日付の表示 -->
        <p class="center"><?php echo '内容' . '<br>' . $result['content']; ?></p>
        <!--内容と内容の表示 -->
        <!-- スレッドを表示している中に書き込むことで、そのすれidを受け取ることができる -->
    <?php endforeach; ?>
    <!-- ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->
    <?php foreach ($results1 as $result1) : ?>
        <form method="POST" action="submit.php?id=<?php echo $result1['id']; ?>&user_id=<?php echo $user_id; ?>">
            <!-- urlでスレッドidを送っている、hiddenとかぶってる？ -->
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