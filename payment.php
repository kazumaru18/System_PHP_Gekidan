<head>
    <meta charset="utf-8">
    <title>大原四季</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <nav>
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                    <i class="fas fa-bars"></i>
                </label>
                <a href="" class="logo"><img src="images/logo/大原四季.001.png" class="ohara-logo" alt=""></a>
                <ul>
                    <li><a href="#"><img src="images/logo/bag.svg" class="ticket_logo" alt=""></a></li>
                    <li><a href="#"><img src="images/logo/person-check.svg" class="login" alt=""></a></li>
                </ul>
            </nav>
            
        </div><!-- /header -->
        <div id="main" class="main_revdone">
            <br>
            <h2>お支払方法確認</h2>
            <br>
            <table class="payment_table">
                <tr>
                    <th colspan="2">お支払方法</th>
                </tr>
                <tr>
                    <th><input type="radio" name="payment" class="payment_radio">現金決済</th><th>当日窓口にて支払</th>
                </tr>
                <tr>
                    <th><input type="radio" name="payment" class="payment_radio">クレジットカード決済</th>
                    <th>
                        
                        <div class="demo_cre">
                        <h3>クレジットカード決済お申し込み</h3>
                        <p class="p-10">お申し込みになる場合は、以下の項目をすべてご入力いただき「お申し込み内容確認」ボタンを押してください。</p>
                        <h3 class="dl_form_h3">クレジットカード決済申し込みフォーム</h3>
                        <dl class="dl_form">
                        <dt>電話番号</dt>
                        <dd><input type="text" id="tell"></dd>
                        <dt>メールアドレス</dt>
                        <dd><input type="text" id="email"></dd>
                        <dt>カード名義</dt>
                        <dd><input type="text" id="card_name">
                        <p class="clear-both mb-0 dt-no-sp">※カード上の名前と申込者名が一致しない場合、クレジットカード使用停止などの処分が課せられる場合があります。</p></dd>
                        <dt>カード番号</dt>
                        <dd><input type="text" name="card_number"></dd>
                        <dt>カード有効期限</dt>
                        <dd>
                        <select>
                        <option selected="selected"></option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        </select>
                        <label>月 /20</label>
                        <select>
                        <option selected="selected"></option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                        </select>
                        年
                        </dd>
                        <dt>セキュリティコード</dt>
                        <dd><input type="text" name="security_code"></dd>
                    </dd>
                        </dl>
                    </th>   
                </tr>
                <tr>
                    <th colspan="2"><a href="reservation_details.php"  class="payment_button">お申込内容確認</a></th>
                </tr>
            </table>
        </div><br>
        <footer>
        <div id="footer">
            <div class="logo">
                <a href="">
                    <img src="img/logo.svg" alt="">
                </a>
            </div>
            
            <p class="copyright">
                COPYRIGHT © O-hara class 1-11. All rights Reserved.
            </p>
        </div>
        </footer><!-- /footer -->
    </div><!-- /wrapper -->
</body>
</html>