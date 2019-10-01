    <!-- スレッド名の一覧が表示されるページ -->

    <?php
    require_once('assets/assets/dbconnect.php');

    $user_id = $_GET['user_id']; //submit_login.phpで取ってきたuser_idを変数に固定
    $user_id = (int) $user_id; //整数化しておく

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
        <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/bootstrap.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/style.css'>
        <script src='main.js'></script>
    </head>

    <body class="brown">
        <header class="kogecha">
            <form class="left padding" action="new_thread.php">
                <!-- actionタグはsubmitさえあれば問題なし -->
                <!-- <input type="submit" value="新しいスレッドを建てる" > -->
                <button type="submit" class="btn btn-outline-info">新しいスレッドを建てる</button>
            </form>
        </header>
        <h2 class="center">掲示板</h2>
        <h1 class="center">スレッド一覧</h1>

        <!-- スレッドの一覧を表示させる -->
        <?php foreach ($results1 as $result1) : ?>
            <div class="center padding">
                <a href="create.php?id=<?php echo $result1['id']; ?>&user_id=<?php echo $user_id; ?> "><?php echo $result1['name']; ?></a>
                <!-- 上のURLのイメージとしては、create.php?id=スレッドのid＆?user_id=ユーザーのid として、スレッドidとユーザーのidの２つを
                        create.phpにおくりたい。-->
            </div>
        <?php endforeach; ?>
        <!-- urlの後ろの？はGETで初めて確定する -->
    </body>

    </html>
    <!-- スレッドidが送信されてない -->