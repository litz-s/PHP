<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <title>追加要素</title>
</head>

<body>
    <?php
    // 追加.1
    $dsn = 'mysql:dbname=phpkiso;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 追加.2
    $sql = 'INSERT INTO anketo (nickname,email,goiken)
              VALUES ("' . $nickname . '","' . $email . '","' . $goiken . '")';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    ?>
</body>

</html>