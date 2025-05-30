<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>staff</title>
</head>
<body>

    <?php
    try {
        $staff_code = $_GET['staffcode'];

        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT name FROM mst_staff WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_code;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $staff_name = $rec['name'];

        $dbh = null;
    } catch (PDOException $e) {
        print 'エラーが発生しました。';
        exit();
    }
    ?>

    <h1>スタッフ削除 <br /></h1>
    <br />
    スタッフコード<br />
    <?php print $staff_code; ?>
    <br />
    スタッフ名<br />
    <?php print $staff_name; ?>
    <br />
    このスタッフを削除してよろしいですか？<br />
    <br />
    <form method="post" action="staff_delete_done.php">
        <input type="hidden" name="code" value="<?php print $staff_code; ?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>