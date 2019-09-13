<?php


//DBに接続

$host = "localhost";//このへんはただ変数を指定してるだけ。この変数に必要な情報を入れて下で使う。localhostは自分のパソコンを指している。
$dbname = "first_app";//first_appはデータベースの名前
$charset = "utf8mb4";//utf8mb4は文字コード。utf8が進化したやつ。
$password = "";//passwordはユーザーが決めるからいらない
$user = "root";//rootは最高権限。全ての権限を持つユーザーと認識する
$options = [//オプションはデータベースの細かい設定を書いている。PDOはクラス？
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //SQLでエラーが表示された場合、画面にエラーが出力される
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //DBから取得したデータを連想配列の形式で取得する
    PDO::ATTR_EMULATE_PREPARES   => false, //SQLインジェクション対策
];

$host = getenv(HOST_NAME);
$dbname = getenv(DB_NAME);
$password = getenv(PASSWORD);
$user = getenv(USER_NAME);

//DBへの接続設定
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";//ここやばくね？$dsnは Data Source Nameでデータソースの名前。
//$dsnにみぎの””内をすべて代入する。””内に全く余白がないのは一体感を出すため。
// mysql文はデータベースを操作するためにある。構文は、
// 頭にデータベースの種類を合わせて：コロンで区切る。各項目は項目名＝値　で；セミコロンで区切る。
// つまり、この文は、mysqlという種類？（ここ意味わからん）hostは自分のパソコン、データベースの名前はfirst_app、文字コードはutf8mb4を使う事を指定している
// この文は変える必要が無い。


try {
    //DBへ接続
    $dbh = new PDO($dsn, $user, $password, $options);//new はインスタンス化の時に使うnew クラス名(新しい変数);...PDOはDBへの接続ができるような中身になっている。
    // $dsnや$userで変数とすることで、クラス自体は一定であることができる。
} catch (\PDOException $e) {//$e(インスタンスも定義している)$eの名前は自分で決められる。
    var_dump($e->getMessage());//var_dumpでエラー内容を表示。
    exit;
}

