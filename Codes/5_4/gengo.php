<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>asobi</title>
</head>
<body>
    <?php

    require_once ('../common/common.php');
    
    $seireki = $_POST['seireki'];

    $wareki = gengo($seireki);
    print $wareki;

    ?>
</body>
</html>