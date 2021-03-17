<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>購入履歴画面</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php 
		require 'header.php';
		require 'db_connect.php';

		if (isset($_SESSION['user'])){
			$sql = "select * from reservation where user_id = :id";
			$stm = $pdo->prepare($sql);
			$stm->bindValue(':id',$_SESSION['user']['user_id'],PDO::PARAM_INT);
			$stm->execute();
			$result = $stm->fetchAll(PDO::FETCH_ASSOC); 

			foreach ($result as $row){
				$sql2 = "
				select product.id as product_id, name, price, count
				from purchase_detail, product
				where purchase_id = :purchase_id and product_id = product.id 
				";
				$stm2 = $pdo->prepare($sql2);
				$stm2->bindValue(':purchase_id',$row['id'],PDO::PARAM_INT);
				$stm2->execute();
				$result2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
	?>
		
				<table>
					<tr>
						<th>月日</th>
						<th>時間</th>
						<th>公演</th>
						<th>席</th>
						<th>価格</th>
					</tr>

	<?php
				$total = 0;
				foreach ($result2 as $row2){
					$subTotal = $row2['price'] * $row2['count'];
					$total += $subTotal;
	?>

					<tr>
						<td><?= $row2['product_id'] ?></td>
						<td><a href="detail.php?id=<?= $row2['product_id'] ?>"><?= $row2['name']?></a></td>
						<td><?= $row2['price'] ?></td>
						<td><?= $row2['count'] ?></td>
						<td><?= $subTotal ?></td>
					</tr>

	<?php
				}
	?>

						<td>合計</td>
						<td></td>
						<td></td>
						<td></td>
						<td><?= $total;?></td>

				</table>		
				<hr>

	<?php
			}
		}else{
			echo "購入履歴を表示するには、ログインしてください。";
		}
	?>
</body>
</html>