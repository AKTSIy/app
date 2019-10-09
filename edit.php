<?php
//ユーザーが自分のコメントを編集するためのページ
require_once('assets/assets/dbconnect.php');
$user_id = $_GET['user_id']; 
$text = $_GET['text'];
$id = $_GET['id'];
$thread_id = $_GET['thread_id'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/assets/style.css'>
    <title>編集</title>
</head>
<body class="brown">
    <div class="padding">変更後、下記のボタンをクリックいてください</div>
    <form action="submit/submit_edit.php">
        <input type="text" name="text" class="padding margin yoko" value="<?php echo $text; ?>">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
        <input type="hidden" name="id" value="<?php echo $id; ?>" >
        <input type="hidden" name="thread_id" value="<?php echo $thread_id; ?>" >
        <button type="submit" class="btn btn-outline-info margin">変更を確定する</button>
    </form>
</body>
</html>