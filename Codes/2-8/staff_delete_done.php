<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>staff</title>
</head>
<body>

    <?php
    
    try {
        $staff_code = $_POST['code'];

        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'DELETE FROM mst_staff WHERE code=?';
        $sth = $dbh->prepare($sql);
        $data[] = $staff_code;
        $sth->execute($data);

        $dbh = null;

    } catch (PDOException $e) {
        print 'エラーが発生しました。';
        exit();
    }
    ?>
    削除しました。<br />
    <br />
    <a href="staff_list.php">戻る</a><br />
</body>
</html>