<?php
// スレッドの内容を保存するためのファイル
require_once('assets/assets/dbconnect.php');
$thread_id2 = $_GET['id']; // ？以下でidを選択したから$_GETでスレッドの固有idがcreate.phpから送られてくる。それを代入。
$thread_id2 = (int)$thread_id2;//整数化完了
//var_dump($thread_id2);//idが未定義で、thread_id2の中身はnull。つまりidがcreate.phpから送られてきていない。
$user_id = $_GET['user_id'];
$user_id = (int)$user_id;

//データ保存
// 初めてページを表示したときの変数未定義エラーを消す。

// $nickname = $_POST['nickname'];...ニックネームを消して、ユーザー名を表示させる。
$content = $_POST['content'];
date_default_timezone_set('Asia/Tokyo');
$datetime = date('Y/m/d H:m:s');
// echo date_default_timezone_get();
// echo date('Y/m/d H:m:s');
$thread_id = $_POST['thread_id'];// create.phpでthread.phpがとれてない。
// var_dump($thread_id);

//ここでユーザーネームを代入して、thread_contentsに保存していきたい。
$stmt = $dbh->prepare("SELECT name FROM user_registration WHERE id = $user_id");
$stmt->execute();
$results = $stmt->fetchAll();
foreach ($results as $result){
    $name = $result['name'];
}
 


$stmt = $dbh->prepare('INSERT INTO thread_contents (content, datetime, thread_id, userid, name) VALUES (?, ?, ?, ?, ?)');
$stmt->execute([$content, $datetime, $thread_id, $user_id, $name]);//user_idをとってこなくてはいけない

// $stmt1 = $dbh->prepare('SELECT * FROM threads');
// $stmt1->execute();
// $results1 = $stmt1->fetchAll();
    // foreach($results1 as $result) {
//     header("Location: create.php?=$result[id] ");//スレッドidは取れたから、createで受け取るだけ。ほんとにとれたのかわからない
// }
header("Location: create.php?id=$thread_id2&user_id=$user_id");// create.phpにスレッド固有idを返したい。thread_id2に値がとれていない。
// スレッドの内容を表示するだけのファイルにしたほうがいい。
// なぜなら、headerに余計な値を交錯してしまうと混乱してしまうから。