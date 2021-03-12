<?php session_start(); ?>

<?php
if (!isset($_SESSION['user'])) {
	$url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	header("Location:" . $url . "/login_input.php" );
	exit();
}
?>

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
    echo 'いらっしゃいませ', $_SESSION['user']['user_name'], 'さん。';
?>

<form action="reservation_details.php" method="post">
    <input type="submit" value="現在予約済みの公演を確認する">
</form>

<form action="logout.php" method="post">
    <input type="submit" value="ログアウト">
</form>

<?php require 'footer.php'; ?>

</body>

</html>