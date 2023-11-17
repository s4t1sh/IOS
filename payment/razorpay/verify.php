<?php

require('config.php');
require('razorpay-php/Razorpay.php');
include('../db.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

// $conn = mysqli_connect("localhost", "root", "", "ios");
include('db.php');

$api = new Api($keyId, $keySecret);
$success = false;
if ( ! empty( $_POST['razorpay_payment_id'] ) ) {

 try
    {
        $attributes = array(
            'razorpay_order_id' => $_POST['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
        $success = true;
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }

}

if ($success === true)
{
    $html = "Payment success/ Signature Verified";
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}
if ($success === true)
{
    
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";

            $name =  $_POST["name"];
            $mob =  $_POST["mob"];
            $price =  $_POST["price"];
            $status = 'Success';

            $sql = "INSERT INTO payments (name,  mob, price, status) VALUES ('$name', '$mob', '$price', '$status')";         
            $conn->query($sql);
             
     

        echo 'Success';
}
else
{

  
    $name =  $_POST["name"];
    $mob =  $_POST["mob"];
    $price =  $_POST["price"];
    $status = 'Failiure';

    $sql = "INSERT INTO payments (name, mob, price, status) VALUES ('$name', '$mob', '$price', '$status')";         
    $conn->query($sql);
    echo 'Failed';
}

// echo $html;
