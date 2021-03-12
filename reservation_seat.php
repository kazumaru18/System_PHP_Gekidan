<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/seat.css">
    <link rel="stylesheet" href="css/style.css">
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
                <input type="hidden" id="seigen_su" name="seigen_su" value="1">
                <div class="sub-section indent01 separate">
                    <h1 class="normal-header">座席指定</h1>
                    <div class="box02 pad20 clearfix">

                        <div class="box left w512 pad10">
                            <div id="seat-select-screen">スクリーン</div>
                            <table summary="座席指定" id="seat-select-table" class="seat-table">
                                <tr class="bg_checkbox">
                                    <th abbr="A列">A列</th>
                                    <td>
                                        A列<br />01番
                                        <input type="checkbox" class="seatNumInput" name="seatNum_10015106557_A_1"
                                            value="A列 1番" /><label></label>
                                    </td>
                                    <td>
                                        A列<br />02番
                                        <input type="checkbox" class="seatNumInput" name="seatNum_10015106558_A_2"
                                            value="A列 2番" /><label></label>
                                    </td>
                                    <td>
                                        A列<br />03番
                                        <input type="checkbox" class="seatNumInput" name="seatNum_10015106559_A_3"
                                            value="A列 3番" /><label></label>
                                    </td>
                                    <td>
                                        A列<br />04番
                                        <input type="checkbox" class="seatNumInput" name="seatNum_10015106560_A_4"
                                            value="A列 4番" /><label></label>
                                    </td>
                                    <td>
                                        A列<br />05番
                                        <input type="checkbox" class="seatNumInput" name="seatNum_10015106561_A_5"
                                            value="A列 5番" /><label></label>
                                    </td>
                                    <td>
                                        A列<br />06番
                                        <input type="checkbox" class="seatNumInput" name="seatNum_10015106562_A_6"
                                            value="A列 6番" /><label></label>
                                    </td>
                                    <td>
                                        A列<br />07番
                                        <input type="checkbox" class="seatNumInput" name="seatNum_10015106563_A_7"
                                            value="A列 7番" /><label></label>
                                    </td>
                                    <td>
                                        A列<br />08番
                                        <input type="checkbox" class="seatNumInput" name="seatNum_10015106564_A_8"
                                            value="A列 8番" /><label></label>
                                    </td>
                                    <td>
                                        A列<br />09番
                                        <input type="checkbox" class="seatNumInput" name="seatNum_10015106565_A_9"
                                            value="A列 9番" /><label></label>
                                    </td>
                                    <td>
                                        A列<br />10番
                                        <input type="checkbox" class="seatNumInput" name="seatNum_10015106566_A_10"
                                            value="A列 10番" /><label></label>
                                    </td>
                                    <td>
                                        A列<br />11番
                                        <input type="checkbox" class="seatNumInput" name="seatNum_10015106567_A_11"
                                            value="A列 11番" /><label></label>
                                    </td>
                                    <td>
                                        A列<br />12番
                                        <input type="checkbox" class="seatNumInput" name="seatNum_10015106568_A_12"
                                            value="A列 12番" /><label></label>
                                    </td>

                                   
                            </table>
                            <div id="seat-select-door" class="right">出入口</div>
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