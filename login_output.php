<?php session_start(); ?>

<?php
    //customerセッション変数を破棄
	unset($_SESSION['user']);
	//MySQLデータベースに接続する
	require 'db_connect.php';
	//SQL文を作る（プレースホルダを使った式）
	$sql = "select * from user where user_email = :user_email and user_password = :user_password";
	//プリペアードステートメントを作る
	$stm = $pdo->prepare($sql);
	//プリペアードステートメントに値をバインドする
	$stm->bindValue(':user_email',$_POST['user_email'],PDO::PARAM_STR);
	$stm->bindValue(':user_password',$_POST['user_password'],PDO::PARAM_STR);
	//SQL文を実行する
	$stm->execute();
	//結果の取得（連想配列で受け取る）
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);
	//customerセッションの設定
	foreach ($result as $row) {
		$_SESSION['user'] = [
			'user_id' => $row['user_id'],
            'user_password' => $row['user_password'],
            'user_name' => $row['user_name'],
            'user_email' => $row['user_email']
		];
	}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ログイン画面</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
	if (isset($_SESSION['user'])) {
		echo 'いらっしゃいませ、', $_SESSION['user']['user_name'], 'さん。';
	} else {
		echo 'ログイン名またはパスワードが違います。';
	}
	?>
</body>

</html>