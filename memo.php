<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモ管理システム(PHP)</title>
</head>
<body>
<main>
<h2>メモ管理システム(PHP)</h2>
<?php
try {
    $db = new PDO('mysql:dbname=mydb; host=127.0.0.1; port=8889; charset=utf8', 'root', 'root');
} catch(PDOException $e) {
    echo 'DB接続エラー： ' . $e -> getMessage();
}

$memos = $db->prepare('SELECT * FROM memos WHERE id=?');
$memos->execute(array($_REQUEST['id']));
$memo = $memos->fetch();
?>
<article>
    <pre><?php print($memo['memo']); ?></pre>

    <a href="index.php">戻る</a>
</article>
</main>
</body>
</html>