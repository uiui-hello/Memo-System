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
        <pre>
        <?php
        $statement = $db->prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
        $statement->execute(array($_POST['memo']));
        echo 'メモが登録されました';
        ?>
    </pre>
    </main>
</body>
</html>