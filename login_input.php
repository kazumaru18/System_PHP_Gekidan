<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="login_output.php" method="post">
        メールアドレス<input type="text" name="user_email"><br>
        パスワード<input type="password" name="user_password"><br>
        <input type="submit" value="ログイン">
    </form>


</body>

</html>