<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>確認</title>
</head>
<body>
    <?php
        $name = $_POST['name'];
        $coment=$_POST['coment'];

        $name=htmlspecialchars($name);
        $coment=htmlspecialchars($coment);

        if ($name == '') {
            print('ニックネームが入力されていません');
        } else {
            print '投稿者名：';
            print $name;
            print '様';   
            print '<br>';
        }

        if ($coment == '' ) {
            print 'コメントが入力されていません';
        } else {
            print '書き込み内容：';
            print $coment;  
            print '<br>';
        }

        if ($name=='' || $coment=='') {
            print '<form method="post" action="toukou_db.php">';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '<form>';    
        } else {
            print '<form method="post" action="toukou_db.php">';
            print '<input type="hidden" name="name" value="'.$name.'">';
            print '<input type="hidden" name="coment" value="'.$coment.'">';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '<input type="submit" value="OK">';
            print '<form>';    
        }
    ?>
</body>
</html>