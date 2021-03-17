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
<br>
<a href="reservation_check.php"><button>現在予約済みの公演を確認する</button></a>
<br>
<a href="logout.php"><button>ログアウト</button></a>

<?php require 'footer.php'; ?>

</body>

</html>