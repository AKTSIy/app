<?php
//ユーザーが自分の情報を見るページ
require_once('assets/assets/dbconnect.php');
$user_id = $_GET['user_id']; 

$stmt = $dbh->prepare("SELECT * FROM user_registration WHERE id = $user_id");
$stmt->execute();
$results = $stmt->fetchAll();

$stmt1 = $dbh->prepare("SELECT * FROM bookmark WHERE user_id = $user_id");
$stmt1->execute();
$results1 = $stmt1->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/style.css'>
    <title>ユーザー情報</title>
</head>
<body class="brown">
    <header class="kogecha">
        <form class="left padding" action="index.php">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
            <button type="submit" class="btn btn-outline-light">スレッド一覧ページに戻る</button>
        </form>
    </header>

    <table border="1" class="center2">
        <tr>
            <td>ユーザー名</td>
            <td>ユーザーid</td>
            <td>パスワード</td>
        </tr>
        <tr>
        <?php foreach ($results as $result) : ?>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['id']; ?></td>
            <td><?php echo $result['password']; ?></td>
        <?php endforeach; ?>
            
        </tr>
    </table>
    <div>
        <p class="center margin-top">ブックマーク一覧</p>

        <?php foreach ($results1 as $result1) : ?>
            <div class="center padding">
                <a href="create.php?id=<?php echo $result1['thread_id']; ?>&user_id=<?php echo $user_id; ?> "><?php echo $result1['name']; ?></a>
            </div>
        <?php endforeach; ?>
    </div>    

</body>
</html>