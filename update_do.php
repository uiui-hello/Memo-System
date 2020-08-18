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
        $statment = $db->prepare('UPDATE memos SET memo=? WHERE id=?');
        $statment->execute(array($_POST['memo'], $_POST['id']));
        ?>
        <pre><p>メモの内容を変更しました</p></pre>
        <p><a href="index.php">戻る</a></p>
    </main>
</body>
</html>