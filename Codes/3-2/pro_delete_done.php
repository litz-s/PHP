<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>pro</title>
</head>
<body>

    <?php
    
    try {
        $pro_code = $_POST['code'];

        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'DELETE FROM mst_product WHERE code=?';
        $sth = $dbh->prepare($sql);
        $data[] = $pro_code;
        $sth->execute($data);

        $dbh = null;

    } catch (PDOException $e) {
        print 'エラーが発生しました。';
        exit();
    }
    ?>
    削除しました。<br />
    <br />
    <a href="pro_list.php">戻る</a><br />
</body>
</html>