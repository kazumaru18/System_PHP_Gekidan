<?php
  $start_date    = 18;  //何日からのレコードか（日）
  $end_date      = 31;  //何日までのレコードか（日）
  $date_interval = 1 ;  //何日おきに生成するか（日）

  $start_hour    = 10;  //何時からのレコードか（時）
  $end_hour      = 16;  //何時までのレコードか（時）
  $hour_interval = 6 ;  //何時間ごとに作るか（時）
//対象のテーブルはプリペアードステートメント内で直接指定すること



  for ($d = $start_date; $d <= $end_date ; $d += $date_interval) { 
    if ($d < 10) {
      $d = 0 . $d;
    }
    $date = '2021-03-' . (string)$d;
    for ($h = $start_hour; $h <= $end_hour; $h += $hour_interval) { 
      $time = $h . ':00';
      $types = ['ライオンキング', 'CATS', 'アラジン', 'オペラ座の怪人'];
      foreach ($types as $type ) {
        // echo $date.' '.$time.$type . '<br>';
        for ($i=1; $i <= 4; $i++) { 
          require 'db_connect.php';
          //SQL文を作る（プレースホルダを使った式）
          $sql = "INSERT INTO `musical` (`musical_id`, `date`, `time`, `musical_name`, `musical_seat`, `musical_price` , `vacant`) VALUES (NULL, :date, :time, :type, :seat_num, '2000', '1');";
          //プリペアードステートメントを作る
          $stm = $pdo->prepare($sql);
          $stm->bindValue(':date'      , $date        , PDO::PARAM_STR);
          $stm->bindValue(':time'      , $time        , PDO::PARAM_STR);
          $stm->bindValue(':type'      , $type        , PDO::PARAM_STR);
          $stm->bindValue(':seat_num'      , $i        , PDO::PARAM_STR);
          //SQL文を実行する
          $stm->execute();
          
        }
      }
    }
  }
?>