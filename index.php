<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>メモ管理システム(PHP)</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">メモ管理システム(PHP)</h1>    
</header>

<main>
<h2>掲示板</h2>
<?php
try {
    $db = new PDO('mysql:dbname=mydb; host=127.0.0.1; port=8889; charset=utf8', 'root', 'root');
} catch(PDOException $e) {
    echo 'DB接続エラー： ' . $e -> getMessage();
}
$memos = $db->query('SELECT * FROM memos ORDER BY id DESC');
?>
<article>
    <?php while ( $memo = $memos->fetch()): ?>
    <p>
        <a href="..(省略)..">
            <?php print(mb_substr($memo['memo'], 0, 50)); ?>
            <?php print((mb_strlen($memo['memo'])> 50 ? '...' : '')); ?>
        </a>
    </p>
        <time><?php print($memo['created_at']); ?></time>
        <hr>
    <?php endwhile; ?>
</article>
</main>
</body>    
</html>