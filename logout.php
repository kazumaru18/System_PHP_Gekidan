<?php session_start(); ?>

<?php
    //customerセッション変数を破棄
	unset($_SESSION['user']);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ログアウト画面</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php require 'header.php'; ?>

<?php
if (!isset($_SESSION['user'])) {
	$url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	header("Location:" . $url . "/index.php" );
	exit();
} else {
	echo 'ログイン名またはパスワードが違います。';
}
?>

<?php require 'footer.php'; ?>

</body>

</html>