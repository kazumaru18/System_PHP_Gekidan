<?php 
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>大原四季</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/musical.css">
    <script src="js/code.js"></script>
</head>

<body>
    <div id="wrapper">
            <?php 
             require_once('header.php');
            ?>
        <div id="navi">
            
        </div><!-- /navi -->
        <div id="content">
            <div id="menu">
                
                </divid=><!-- /menu -->
                <div id="main">
                    <div id="new-img">
                        <ul class="img-list">
                            <li><img src="images/example/lion.jpg" class="img-1"></li>
                            <li><img src="images/example/aliaddin.jpg" class="img-2"></li>
                        </ul>
                        <ul class="img-list">
                            <li><img src="images/example/cats.jpg" class="img-3"></li>
                            <li><img src="images/example/オペラ座.jpeg" class="img-4"></li>
                        </ul>
                    </div>
                </div><!-- /main -->
        </div><!-- /content -->
            <?php 
             require_once('footer.php');
            ?>
    </div><!-- /wrapper -->
</body>

</html>