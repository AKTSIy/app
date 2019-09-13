    <!-- 2．表示される欄 -->

    <?php
    require_once('assets/assets/dbconnect.php');
    //SQLを実行,データの一覧表示
    $stmt = $dbh->prepare('SELECT * FROM thread_contents');
    $stmt->execute();
    $results = $stmt->fetchAll();

    $stmt1 = $dbh->prepare('SELECT * FROM threads');
    $stmt1->execute();
    $results1 = $stmt1->fetchAll();

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
        <h2 class="center">まんぴー掲示板</h2>
        <!-- <div> -->
        <form action="new_thread.php">
            <input type="submit" value="新しいスレッドを建てる">
        </form>
        <!-- </div> -->
        <!-- </div> -->
        <h1 class="center">スレッド一覧</h1>
        <!-- 1．入力する欄 -->
        <!-- <form method="POST" action="submit.php">.........メインページに内容入力はいらない。
            <div class="center">
                ニックネーム<br>
                <input type="text" name="nickname">
            </div>
            <div class="center">
                内容<br>
                <textarea name="content" class="yoko"></textarea>
            </div>
            <input type="hidden" name="thread_id" value="<?php //echo $result['id']  ?>">
            スレッドの内容を送るために送信ボタンを押したとき、submitにvalueの値を送る。valueの値がスレidじゃないと意味が無い
            <div class="center">
                <input type="submit" value="送信">
            </div>
        </form> -->
        <!-- <?php //foreach ($results as $result) : ?>.....................メインページにコンテンツ内容は表示しない。
            <p class="center"><?php// echo 'ニックネーム' . '<br>' . $result['nickname']; ?></p>
            <p class="center"><?php// echo '内容' . '<br>' . $result['content']; ?></p>
        <?php //endforeach; ?> -->
        <!-- 3．フッター -->
        <!-- スレッドの一覧を表示させる -->
        <?php foreach ($results1 as $result1) : ?>
            <!-- <p class="center"></p> -->
            <div class="center">
                <a href="create.php?id=<?php echo $result1['id'] ?>"><?php echo $result1['name']; ?></a>
                <!-- ?id はてなの後ろにはゲットで送りたいもの -->
                <!-- create.phpにスレのidを送る -->
            </div>
        <?php endforeach; ?>
        <!-- urlの後ろの？はGETで初めて確定する -->
    </body>

    </html>
    <!-- スレッドidが送信されてない -->