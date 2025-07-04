<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>staff</title>
</head>
<body>

    <?php
    
    try {
        $pro_code = $_POST['code'];
        $pro_name = $_POST['name'];
        $pro_price = $_POST['price'];
        $pro_gazou_name_old = $_POST['gazou_name_old'];
        $pro_gazou_name = $_POST['gazou_name'];

        $pro_code = htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');
        $pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
        $pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');
        
        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'UPDATE mst_product SET name=?, price=?,gazou=? WHERE code=?';
        $sth = $dbh->prepare($sql);
        $data[] = $pro_name;
        $data[] = $pro_price;
        $data[] = $pro_gazou_name;
        $data[] = $pro_code;
        $sth->execute($data);

        $dbh = null;

        if ($pro_gazou_name_old != $pro_gazou_name) {
            if ($pro_gazou_name_old != '') {
                unlink('./gazou/' . $pro_gazou_name_old);
            }
        }

        print '修正しました。<br />';
    
    }   catch (PDOException $e) {
        print 'エラーが発生しました。';
        exit();
    }
    ?>
    <a href="pro_list.php">戻る</a>
</body>
</html>