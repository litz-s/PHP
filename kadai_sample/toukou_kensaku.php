<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>検索結果</title>
</head>
<body>
    <?php
    try {
        $code = $_POST['code'];
        $dsn='mysql:dbname=phpkiso;host=localhost;charset=utf8';
        $user='root';
        $password= '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql='SELECT * FROM `keizi` WHERE code=?';
        $stmt= $dbh->prepare($sql);
        $data[]=$code;
        $stmt->execute($data);
    
        while (1) {
            $rec= $stmt->fetch(PDO::FETCH_ASSOC);
            if ($rec==false) {
                break;
            }
            print $rec['code'].'：';
            print $rec['name'].'：';
            print $rec['coment'];
            print '<br>';
        }
    
        $dbh= null;

    } catch (PDOException $e) {
        print 'データベース接続エラー: ' . $e->getMessage();
    }
    ?>
    <p><a href="mein.php">メインメニューに戻る</a></p>
</body>
</html>