<?php
require_once('assets/assets/dbconnect.php');
//データ保存
// 初めてページを表示したときの変数未定義エラーを消す。

$nickname = $_POST['nickname'];
$content = $_POST['content'];

$stmt = $dbh->prepare('INSERT INTO apuri (nickname, content) VALUES (?, ?)');
$stmt->execute([$nickname, $content]);

header('Location: index.php');