<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/musical.css">
    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <?php 
             require_once('header.php');
            ?>
        </div><!-- /header -->
        <div id="navi">
            　
        </div><!-- /navi -->
        <div id="content">
            <div id="menu">
                　
            </div><!-- /menu -->
            <div id="main">
    <?php
		//MySQLデータベースに接続する
		require 'db_connect.php';
		//検索の判断
		
			//SQL文を作る（プレースホルダを使った式）
			$sql = "select * from musical GROUP BY musical_name";
			//プリペアードステートメントを作る
			$stm = $pdo->prepare($sql);
			//プリペアードステートメントに値をバインドする
			$stm->bindValue('', '%' . $_POST[''] . '%', PDO::PARAM_STR);
			//SQL文を実行する
			$stm->execute();
			//結果の取得（連想配列で受け取る    ）
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
            var_dump($result);

    ?>
            </div><!-- /main -->
        </div><!-- /content -->
        <div id="footer">
            <?php 
             require_once('footer.php');
            ?>
        </div><!-- /footer -->
    </div><!-- /wrapper -->
</body>

</html>