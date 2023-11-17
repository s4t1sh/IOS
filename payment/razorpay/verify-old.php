<?php
include "../config/config.inc.php";

require('config.php');

// session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}
if(isset($_SESSION['kitchen_detail'])){
    $kitchen_detail = $_SESSION['kitchen_detail'];
}else{
    $kitchen_detail = array('Nil'=>'Nil');
}
if(isset($_SESSION['wardrobe_detail'])){
    $wardrobe_detail = $_SESSION['wardrobe_detail'];
}else{
    $wardrobe_detail = array('Nil'=>'Nil');
}

if ($success === true)
{
    $current_time=date('d-m-Y h:m:s');
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
    // print_r($_SESSION['team_players']);
        // $sql = "INSERT INTO `product_delivery`(`delivery_product`, `delivery_name`, `delivery_color`, `delivery_address`, `delivery_order_by`, `delivery_order_on`, `delivery_price`,`delivery_pincode`) VALUES (:product,:name,:color,:address,:order_by,:order_on,:order_price,:pincode)";
        $sql = "INSERT INTO `product_delivery`(`delivery_product`, `delivery_name`, `delivery_color`, `delivery_address`, `delivery_order_by`, `delivery_order_on`, `delivery_price`, `delivery_pincode`,`delivery_kitchen`,`delivery_wardrobe`) VALUES (:product,:name,:color,:address,:order_by,:order_on,:order_price,:pincode,:delivery_kitchen,:delivery_wardrobe)";

        $stmt=$DB->prepare($sql);
        $stmt->bindValue(":product",$_SESSION['product_id']);
        $stmt->bindValue(":name",$_SESSION['name']);
        $stmt->bindValue(":color",$_SESSION['product_color']);
        $stmt->bindValue(":address",$_SESSION['delivery_address']);
        $stmt->bindValue(":order_by",$_SESSION['id']);
        $stmt->bindValue(":order_on",$current_time);
        $stmt->bindValue(":order_price",$_SESSION['price']);
        $stmt->bindValue(":pincode",$_SESSION['delivery_pincode']);
        $stmt->bindValue(":delivery_kitchen",json_encode($kitchen_detail));
        $stmt->bindValue(":delivery_wardrobe",json_encode($wardrobe_detail));
        $stmt->execute();
        // $irc=$stmt->rowCount();
        $product = displayByID('product','product_id',$_SESSION['product_id']);
        $productid = $_SESSION['product_id'];
        $product_stock = intval($product[0]['product_stock']) - 1;

        $productsql = "UPDATE `product` SET `product_stock` = :product_stock  WHERE `product_id` = :productid";
        $prodstmt=$DB->prepare($productsql);
        $prodstmt->bindValue(":productid",$_SESSION['product_id']);
        $prodstmt->bindValue(":product_stock",$product_stock);
        $prodstmt->execute();
    // echo '<script>alert("You Joined Tournament Successfully");window.location.href="'.MAIN_DIR.'"</script>';
        $isql = "INSERT INTO `payments`(`pay_name`, `pay_amount`, `pay_txnid`, `pay_email`, `pay_product`, `pay_status`, `pay_added_by`, `pay_created_on`) VALUES (:name,:amount,:txnid,:email,:product,:status,:addedby,:createdon)";
        $stmts=$DB->prepare($isql);
        $stmts->bindValue(":name",$_SESSION['name']);
        $stmts->bindValue(":amount",$_SESSION['price']);
        $stmts->bindValue(":txnid",$_POST['razorpay_payment_id']);
        $stmts->bindValue(":email",$_SESSION['email']);
        $stmts->bindValue(":product",$_SESSION['product_name']);
        $stmts->bindValue(":status",'Success');
        $stmts->bindValue(":addedby",intval($_SESSION['id']));
        $stmts->bindValue(":createdon",$current_time);
        $stmts->execute();
        $irc=$stmts->rowCount();
        echo '<script>alert("Your Product Booked Successfully. Check In Your Orders");window.location.href="your-orders"</script>';
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
    $isql = "INSERT INTO `payments`(`pay_name`, `pay_amount`, `pay_txnid`, `pay_email`, `pay_product`, `pay_status`, `pay_added_by`, `pay_created_on`) VALUES (:name,:amount,:txnid,:email,:product,:status,:addedby,:createdon)";
    $stmts=$DB->prepare($isql);
    $stmts->bindValue(":name",$_SESSION['name']);
    $stmts->bindValue(":amount",$_SESSION['product_price']);
    $stmts->bindValue(":txnid",$_POST['razorpay_payment_id']);
    $stmts->bindValue(":email",$_SESSION['email']);
    $stmts->bindValue(":product",$_SESSION['product_name']);
    $stmts->bindValue(":status",'Failure');
    $stmts->bindValue(":addedby",intval($_SESSION['id']));
    $stmts->bindValue(":createdon",$current_time);
    $stmts->execute();
    $irc=$stmts->rowCount();
    echo '<script>alert("Your Payment Failed");window.location.href="'.MAIN_DIR.'"</script>';
}

// echo $html;
