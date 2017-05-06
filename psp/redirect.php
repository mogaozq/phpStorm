<?php
require_once ("functions.php");
if (isset($_POST['status'], $_POST['transId'], $_POST['factorNumber'], $_POST['message'])) {
    $status = $_POST['status'];
    $transId = $_POST['transId'];
    $factorNumber = $_POST['factorNumber'];
    $message = $_POST['message'];
}
if (isset($status) && $status){
    $verification = verify("test",$transId);
    if($verification["status"]){
        if ($status) {
            $amount = $verification['amount'];
            echo "مبلغ $amount با موفقیت پرداخت شد.";
            echo "<br/>";
            echo "شماره تراکنش: $transId";
            echo "<br/>";
            echo "شماره فاکتور: $factorNumber";
            echo "<br/>";
            echo "محصول درخواستی شما ارسال شد.";
        }
    }
}
