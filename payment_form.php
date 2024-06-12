<script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.12.4.min.js"
    ></script>
    <!-- iamport.payment.js -->
    <script
      type="text/javascript"
      src="https://cdn.iamport.kr/js/iamport.payment-1.2.0.js"
    ></script>

    <?php
session_start();
$num = $_GET["num"];
$price = $_GET["price"];
$subject = urldecode($_GET["subject"]);

if (isset($_SESSION["userpoint"])) {
    $userpoint = $_SESSION["userpoint"];
} else {
    $userpoint = 0;
}
?>

<div id="main_content">
    <div class="receipt-title">결제 정보</div>
    <table class="receipt-table">
        <tr>
            <th>상품명</th>
            <td><?=htmlspecialchars($subject)?></td>
        </tr>
        <tr>
            <th>가격</th>
            <td><?=number_format($price)?> 원</td>
        </tr>
    </table>
    <div class="receipt-title">할인 적용</div>
    <table class="receipt-table">
        <tr>
            <th>보유 포인트</th>
            <td><?=number_format($userpoint)?> 점</td>
        </tr>
        <tr>
            <th>사용할 포인트</th>
            <td>
                <input type="number" id="points_to_use" value="0" max="<?=$userpoint?>" min="0" oninput="updateFinalPrice()">
            </td>
        </tr>
    </table>
    <div class="receipt-title">최종 결제 금액</div>
    <table class="receipt-table">
        <tr>
            <th>금액</th>
            <td id="final_price"><?=number_format($price)?> 원</td>
        </tr>
    </table>
    <div id="donate_btn">
        <button onclick="payment()">결제하기</button>
    </div>
</div>

<script>
    var IMP = window.IMP;
    IMP.init('imp14462318');
    var originalPrice = <?=$price?>;

    function updateFinalPrice() {
        var pointsToUse = document.getElementById('points_to_use').value;
        if (pointsToUse > <?=$userpoint?>) {
            pointsToUse = <?=$userpoint?>;
            document.getElementById('points_to_use').value = pointsToUse;
        }
        var finalPrice = originalPrice - pointsToUse;
        if (finalPrice < 0) finalPrice = 0;
        document.getElementById('final_price').innerText = finalPrice.toLocaleString() + " 원";
    }

    function payment() {
        var pointsToUse = document.getElementById('points_to_use').value;
        var finalPrice = originalPrice - pointsToUse;
        if (finalPrice < 0) finalPrice = 0;

        var today = new Date();   
        var hours = today.getHours(); 
        var minutes = today.getMinutes();  
        var seconds = today.getSeconds();  
        var milliseconds = today.getMilliseconds();
        var makeMerchantUid = hours + minutes + seconds + milliseconds;

        IMP.request_pay({
            pg : 'danal_tpay',
            pay_method : 'card',
            merchant_uid : 'merchant_' + makeMerchantUid,
            name : '<?=htmlspecialchars($subject)?>',
            amount : finalPrice,
            buyer_email : '',
            buyer_name : '',
            buyer_tel : '',
            buyer_addr : '',
            buyer_postcode : '',
        }, function(rsp) {
            if (rsp.success) {
                var msg = '결제가 완료되었습니다.';
                msg += ' 결제 금액 : ' + rsp.paid_amount;
                // Update user's points on the server side here if needed
            } else {
                var msg = '결제에 실패하였습니다.';
                msg += ' 에러내용 : ' + rsp.error_msg;
            }
            alert(msg);
        });
    }
</script>
