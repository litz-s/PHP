<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>
    <h1>メインメニュー</h1>
    <p><a href="toukou.html">投稿</a> <a href="toukou_kensaku.html">けんさく</a></p>
    <br><br>
    <h2>投稿一覧</h2>

    <?php
    $dsn='mysql:dbname=phpkiso;host=localhost;charset=utf8';
    $user='root';
    $password= '';
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql='SELECT * FROM `keizi` WHERE 1';
        $stmt= $dbh->prepare($sql);
        $stmt->execute();

        while (1) {
            $rec= $stmt->fetch(PDO::FETCH_ASSOC);
            if ($rec==false) {
                break;
            }
            print $rec['code'];
            print '：';
            print $rec['name'];
            print '：';
            print $rec['coment'];
            print '<br><br>';
        }
        $dbh = null;

    } catch (PDOException $e) {
        print 'データベース接続エラー: ';
    }
    ?>
</body>
</html>