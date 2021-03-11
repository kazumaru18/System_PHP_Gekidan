<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>マイページ</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php require 'header.php'; ?>

<?php
    echo 'いらっしゃいませ';
?>

<form action="logout.php" method="post">
    <input type="submit" value="ログアウト">
</form>

<?php require 'footer.php'; ?>

</body>

</html>