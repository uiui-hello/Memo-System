<?php require('dbconnect.php'); ?>
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
<h2>メモ一覧</h2>
<?php
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
$page = $_REQUEST['page'];
} else {
    $page = 1;
}
$start = 5 * ($page - 1);
$memos = $db->prepare('SELECT * FROM memos ORDER BY id LIMIT ?,5');
$memos->bindParam(1, $_REQUEST['page'], PDO::PARAM_INT);
$memos->execute();
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

<?php if ($page >= 2): ?>
    <a href="index.php?page=<?php print($page-1); ?>"><?php print($page-1); ?>ページ目へ</a>
<?php endif; ?>
|
<?php
$counts = $db->query('SELECT COUNT(*) AS cnt FROM memos');
$count = $counts->fetch();
$max_page = ceil($count['cnt'] /5);
if($page < $max_page):
?>
    <a href="index.php?page=<?php print($page+1); ?>"><?php print($page+1); ?>ページ目へ</a>
<?php endif; ?>
</article>
</main>
</body>    
</html>