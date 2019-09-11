<?php

//データ保存
// 初めてページを表示したときの変数未定義エラーを消す。

if($_POST['nickname'] == NULL ) {//これはだめなの？エラーが出る。$_POSTを宣言した時点でundefindが出てしまう。
    $nickname = '';
} else {
    $nickname = $_POST['nickname'];
}
if($_POST['content'] == NULL ) {
    $content = '';
} else {
    $content = $_POST['content'];
}

$stmt = $dbh->prepare('INSERT INTO apuri (nickname, content) VALUES (?, ?)');
$stmt->execute([$nickname, $content]);