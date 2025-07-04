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
    print '<a href="member_logout.php">ログアウト</a><br />';
    print '<br />';
}
?>
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <title>pro</title>
</head>

<body>

    <?php
    try {
        $cart = $_SESSION['cart'];
        $kazu = $_SESSION['kazu'];
        $max = count($cart);

        $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        foreach ($cart as $key => $val) {
            $sql = 'SELECT name, price, gazou FROM mst_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[0] = $val;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);

            $pro_name[] = $rec['name'];
            $pro_price[] = $rec['price'];

            if ($rec['gazou'] == '') {
                $pro_gazou[] = '';
            } else {
                $pro_gazou[] = '<img src="../product/gazou/' . $rec['gazou'] . '">';
            }
        }

        $dbh = null;

    } catch (PDOException $e) {
        print 'エラーが発生しました。';
        exit();
    }
    ?>

    カートの中身<br />
    <br />
    <form method="post" action = "kazu_change.php">
    <?php
    for ($i = 0; $i < $max; $i++) {
        ?>
        <?php print $pro_name[$i]; ?>
        <?php print $pro_gazou[$i]; ?>
        <?php print $pro_price[$i]; ?> 円
        <input type="text" name="kazu" <?php print $i; ?> value = "<?php print $kazu[$i]; ?>">
        <?php print $pro_price[$i] * $kazu[$i]; ?> 円
        <br />
    <?php
    }
    ?>
    <input type="hidden" name="max" value="<?php print $max; ?>">
    <input type="submit" value="数量変更"><br />
    <input type="button" onclick="history.back()" value="戻る">
    </form>
</body>

</html>