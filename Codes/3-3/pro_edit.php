<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>pro</title>
</head>
<body>

    <?php
    try {
        $pro_code = $_GET['procode'];

        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT name, price, gazou FROM mst_product WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $pro_code;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $pro_name = $rec['name'];
        $pro_price = $rec['price'];
        $pro_gazou_name_old = $rec['gazou'];

        $dbh = null;

        if ($pro_gazou_name_old == '') {
            $disp_gazou = '';
        } else {
            $disp_gazou = '<img src="./gazou/' . $pro_gazou_name_old . '">';
        }
    } catch (PDOException $e) {
        print 'エラーが発生しました。';
        exit();
    }
    ?>

    <h1>商品修正 <br /></h1>
    <br />
    商品コード<br />
    <?php print $pro_code; ?>
    <br />
    <br />
    <form method="post" action="pro_edit_check.php" enctype="multipart/form-data">
        <input type="hidden" name="code" value="<?php print $pro_code; ?>">
        <input type="hidden" name="gazou_name_old" value="<?php print $pro_gazou_name_old; ?>">
        商品名<br />
        <input type="text" name="name" style="width:200px" value="<?php print $pro_name; ?>"><br />
        価格<br />
        <input type="text" name="price" style="width:50px" value="<?php print $pro_price;?>">円<br />
        <br />
        <?php print $disp_gazou; ?>
        <br />
        画像を選んでください。<br />
        <input type="file" name="gazou" style="width:400px"><br />
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>