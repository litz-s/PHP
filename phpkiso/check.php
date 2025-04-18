<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <title>PHP基礎</title>
</head>

<body>
    <?php
        $nickname = $_POST['nickname'];
        $email=$_POST['email'];
        $goiken=$_POST['goiken'];

        $nickname=htmlspecialchars($nickname);
        $email=htmlspecialchars($email);
        $goiken=htmlspecialchars($goiken);

        if ($nickname == '') {
            print('ニックネームが入力されていません');
        } else {
            print 'ようこそ';
            print $nickname;
            print '様';   
            print '<br>';
        }

        if ($email == '' ) {
            print 'メールアドレスが登録されていません';
        } else {
            print 'メールアドレス : ';
            print $email;  
            print '<br>';
        }

        if ($goiken == '') {
            print 'ご意見が入力されていません';
        } else {
            print 'ご意見 : ';
            print $goiken;
            print '<br>';
        }

        if ($nickname=='' || $email=='' || $goiken=='') {
            print '<form method="post" action="thanks.php">';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '<form>';    
        } else {
            print '<form method="post" action="thanks.php">';
            print '<input type="hidden" name="nickname" value="'.$nickname.'">';
            print '<input type="hidden" name="email" value="'.$email.'">';
            print '<input type="hidden" name="goiken" value="'.$goiken.'">';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '<input type="submit" value="OK">';
            print '<form>';    
        }
    ?>
    <!-- <form>
        <input type="button" onclick="history.back()" value="戻る">
    </form> -->
</body>

</html>
