<?php require('dbconnect.php'); ?>
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
        $memos = $db->prepare('SELECT * FROM memos WHERE id=?');
        $memos->execute(array($_REQUEST['id']));
        $memo = $memos->fetch();
        ?>
        <article>
            <pre><?php print($memo['memo']); ?></pre>
            <a href="update.php?id=<?php print($memo['id']); ?>">編集する</a>
            |
            <a href="delite.php?id=<?php print($memo['id']); ?>">削除する</a>
            |
            <a href="index.php">戻る</a>
        </article>
    </main>
</body>
</html>