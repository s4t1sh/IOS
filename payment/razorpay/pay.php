<?php
require('config.php');
require('../config/config.inc.php');
require('razorpay-php/Razorpay.php');
session_start();

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
// print_r($_SESSION['team_players']);
if($_POST['change_address'] != ""){
    $_SESSION['delivery_address'] = $_POST['change_address'];
}
else{
    $_SESSION['delivery_address'] = $_SESSION['address'];
}
$_SESSION['state'] = $_POST['state'];
$_SESSION['product_color'] = $_POST['product_color'];
$_SESSION['delivery_pincode'] = $_POST['pincode'];
$product_rs = displayByID('product','product_id',$_SESSION['product_id']);
$total = 0;
if(isset($_SESSION['custom_price'])){
    $price = $_SESSION['custom_price'];
}
else{
    $price = $_SESSION['product_price'];
}

$_SESSION['original_price'] = $product_rs[0]['product_selling_price'];
$_SESSION['product_name'] = $product_rs[0]['product_name'];
$sgst =  ($price * $product_rs[0]['product_sgst']) / 100;
$cgst = ($price * $product_rs[0]['product_cgst']) / 100 ;
$igst = 0;
$_SESSION['igst'] = $igst;
if($_SESSION['state'] != 'Karnataka'){
    $igst +=   ($price * $product_rs[0]['product_igst']) / 100;
    $_SESSION['igst'] = $product_rs[0]['product_igst'];
}
$total = $price + $sgst + $cgst + $igst;
$_SESSION['sgst'] = $product_rs[0]['product_sgst'];
$_SESSION['cgst'] = $product_rs[0]['product_cgst'];
if(isset($_SESSION['kitchen_price'])){
    $_SESSION['price'] = $_SESSION['kitchen_price'];
}
elseif(isset($_SESSION['wardrobe_price'])){
    $_SESSION['price'] = $_SESSION['wardrobe_price'];
}
else{
    $_SESSION['price'] = $total;
}

                                        
$orderData = [
    'receipt'         => $_SESSION['product_id'],
    'amount'          => $_SESSION['price'] * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => 10,
    "name"              => 'abdul',
    "description"       => 'watch',
    "image"             => "http://beamingindia.com/metalnglass/images/logo.jpg",
    "prefill"           => [
    "name"              => 'abdul',
    "email"             => 'watch',
    "contact"           => "9999999999",
    ],
    "notes"             => [
    "merchant_order_id" => 'u6767',
    ],
    "theme"             => [
    "color"             => "#000000"
    ],
    "order_id"          =>'78787',
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");
?>
<button id="autoClickBtn" onclick="window.history.back()">Go back</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// document.getElementClassName()
$('.razorpay-payment-button').attr('id','btn');
$('.razorpay-payment-button').attr('value','Please Wait..')
window.onload=function(){
      document.getElementById("btn").click();
    };
    // $('.razorpay-payment-button').hide();
</script>