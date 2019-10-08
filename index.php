    <!-- スレッド名の一覧が表示されるページ -->

    <?php
    require_once('assets/assets/dbconnect.php');
    // var_dump($_GET['user_id']);
    // die;//user_idが定義されてないから、$_GETの結果はNULLになっている。
    $user_id = $_GET['user_id']; //submit_login.phpで取ってきたuser_idを変数に固定//そもそもcreate.phpから届いていない。この文字列は正しい。
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
            <!-- <a href="new_thread.php?user_id=<?php// echo $user_id; ?> ">新しいスレッドを建てる</a> -->

            <form class="left padding" action="new_thread.php">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
                <button type="submit" class="btn btn-outline-info">新しいスレッドを建てる</button>
            </form>

            <form class="left padding" action="user_info.php">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
                <button type="submit" class="btn btn-outline-info">ユーザー情報</button>
            </form>
        </header>
        <h2 class="center">掲示板</h2>
        <h1 class="center">スレッド一覧</h1>

        <!-- スレッドの一覧を表示させる -->
        <?php foreach ($results1 as $result1) : ?>
            <div class="center padding">
                <a href="create.php?id=<?php echo $result1['id']; ?>&user_id=<?php echo $user_id; ?> "><?php echo $result1['name']; ?></a>
            </div>
        <?php endforeach; ?>

    </body>

    </html>