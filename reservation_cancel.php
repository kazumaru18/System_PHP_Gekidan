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
    <title>キャンセル</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php require 'header.php'; ?>



<?php require 'footer.php'; ?>

</body>

</html>