<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>完了</title>
</head>
<body>
    <?php
    try {
        $dsn = 'mysql:dbname=phpkiso;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $coment=$_POST['coment'];

        $name=htmlspecialchars($name);
        $coment=htmlspecialchars($coment);

        print $name;
        print '様<br>';
        print 'コメありがとう！<br>';
        print 'コメント : ';
        print $coment;

        $sql='INSERT INTO keizi (name, coment)
                VALUES ("'.$name.'","'.$coment.'")';
        $stmt=$dbh->prepare($sql);
        $stmt->execute();

    } catch (PDOException $e) {
        print 'データベース接続エラー'. $e->getMessage();
    }
    
    $dbh=null;
    ?>
    <p><a href="mein.php">メインメニューに戻る</a></p>
</body>
</html>