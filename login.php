<?php session_start(); ?>
<?php
	//customerセッション変数を破棄
	unset($_SESSION['customer']);
	//MySQLデータベースに接続する
	require 'db_connect.php';
	//SQL文を作る（プレースホルダを使った式）
	$sql = "select * from user where login = :login and password = :password";
	//プリペアードステートメントを作る
	$stm = $pdo->prepare($sql);
	//プリペアードステートメントに値をバインドする
	$stm->bindValue(':login',$_POST['login'],PDO::PARAM_STR);
	$stm->bindValue(':password',$_POST['password'],PDO::PARAM_STR);
	//SQL文を実行する
	$stm->execute();
	//結果の取得（連想配列で受け取る）
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);
	//customerセッションの設定
	foreach ($result as $row) {
		$_SESSION['customer'] = [
			'id' => $row['id'], 'name' => $row['name'],
			'address' => $row['address'], 'login' => $row['login'],
			'password' => $row['password']
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
<?php //ログイン後は表示されないように処理
if (!(isset($_SESSION['user']))) {
    //customerセッション変数を破棄
	unset($_SESSION['user']);
	//MySQLデータベースに接続する
	 // データベースユーザ
    $user = 'shop';
    $password = 'shoppass';
    // 利用するデータベース
    $dbName = 'shop';
    // MySQLサーバ
    $host = 'localhost';
    // MySQLのDSN文字列
    $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
    //MySQLデータベースに接続する
    try {
      $pdo = new PDO($dsn, $user, $password);
      // プリペアドステートメントのエミュレーションを無効にする
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      // 例外がスローされる設定にする
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
      echo '<span class="error">エラーがありました。</span><br>';
      echo $e->getMessage();
      exit();
    }
	//SQL文を作る（プレースホルダを使った式）
	$sql = "select * from user where login = :login and password = :password";
	//プリペアードステートメントを作る
	$stm = $pdo->prepare($sql);
	//プリペアードステートメントに値をバインドする
	$stm->bindValue(':login',$_POST['login'],PDO::PARAM_STR);
	$stm->bindValue(':password',$_POST['password'],PDO::PARAM_STR);
	//SQL文を実行する
	$stm->execute();
	//結果の取得（連想配列で受け取る）
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);
	//customerセッションの設定
	foreach ($result as $row) {
		$_SESSION['customer'] = [
			'id' => $row['id'], 'name' => $row['name'],
			'address' => $row['address'], 'login' => $row['login'],
			'password' => $row['password']
		];
	}
?>
    <form action="mypage.php" method="post">
        ログイン名<input type="text" name="user_email"><br>
        パスワード<input type="password" name="user_password"><br>
        <input type="submit" value="ログイン">
    </form>
<?php
}
?>
    <form action="mypage.php" method="post">
        ログイン名<input type="text" name=""><br>
        パスワード<input type="password" name="password"><br>
        <input type="submit" value="ログイン">
    </form>
</body>

</html>