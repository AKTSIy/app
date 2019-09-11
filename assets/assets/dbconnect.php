<?php


//DBに接続

$host = "localhost";
$dbname = "first_app";
$charset = "utf8mb4";
$password = "";
$user = "root";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //SQLでエラーが表示された場合、画面にエラーが出力される
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //DBから取得したデータを連想配列の形式で取得する
    PDO::ATTR_EMULATE_PREPARES   => false, //SQLインジェクション対策
];

//DBへの接続設定
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";//ここやばくね？$dsnは Data Source Nameでデータソースの名前。
try {
    //DBへ接続
    $dbh = new PDO($dsn, $user, $password, $options);//new はインスタンス化の時に使うnew クラス名(新しい変数);
} catch (\PDOException $e) {//$e(インスタンスも定義している)$eの名前は自分で決められる。
    var_dump($e->getMessage());//var_dumpでエラー内容を表示。
    exit;
}

