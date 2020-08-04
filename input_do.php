<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メモ管理システム(PHP)</title>
</head>
<body>
    <h2>メモ管理システム(PHP)</h2>
    <pre>
        <?php
        try {
            $db = new PDO('mysql:dbname=mydb; host=127.0.0.1; port=8889; charset=utf8', 'root', 'root');

            $db -> exec('INSERT INTO memos SET memo="' . $_POST['memo'] . '", created_at=NOW()');
        } catch(PDOException $e) {
            echo 'DB接続エラー: ' . $e -> getMessage();
        }
        $statement = $db -> prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
        echo 'メモが登録されました';
        ?>
    </pre>
</body>
</html>