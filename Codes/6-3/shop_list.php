<?php
session_start();
session_regenerate_id(true);
if (isset($_SESSION['member_login']) == false) {
    print 'ようこそゲスト様　';
    print '<a href="member_login.html">会員ログイン</a>';
    print '<br />';
} else {
    print 'ようこそ';
    print $_SESSION['member_name'];
    print '様';
    print '<a href="member_logout.php">ログアウト</a>';
    print '<br />';
}
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>staff</title>
</head>
<body>

    <?php

    try {

        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT code , name , price FROM mst_product WHERE 1';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $dbh = null;

        print '商品一覧<br /><br />';

        while(true) {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($rec == false) {
                break;
            }
            print '<a href="shop_product.php?procode=' . $rec['code'] . '">';
            print $rec['name']. '---';
            print $rec['price'] . '円';
            print '</a>';
            print '<br />';
        }
    } catch (PDOException $e) {
        print 'エラーが発生しました。';
        exit();
    }

    print '<br />';
    print '<a href="shop_cartlook.php">カートを見る</a><br />';

    ?>

</body>
</html>