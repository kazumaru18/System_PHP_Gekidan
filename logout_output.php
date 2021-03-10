<?php session_start(); ?>

<?php   //userのセッションの破棄
unset($_SESSION['user']);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ログアウト画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

<?php require 'header.php'; ?>

<?php
	echo 'ログアウトしました。';
?>

<?php require 'footer.php'; ?>

</body>

</html>