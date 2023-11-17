<?php
    include('db.php');
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced search custom, agency, agent, business, clean, corporate, directory, google maps, homes, listing, membership packages, property, real estate, real estate agent, realestate agency, realtor">
<meta name="description" content="FindHouse - Real Estate HTML Template">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Title -->
<title>Integra Office Solutions</title>

</head>
<h1>Payment Processing....</h1>

<?php 
	require('razorpay/config.php');
	require('razorpay/razorpay-php/Razorpay.php');
	// session_start();

	// Create the Razorpay Order

	use Razorpay\Api\Api;


    $api = new Api($keyId, $keySecret);
    
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $mob = $_POST['mob'];
        $price = $_POST['price'];
        // $email = $_POST['email'];

        

        // $sql = "INSERT INTO payments(name,email,mob,price) VALUES ($name,$email,$mob,$price)";
        // mysqli_query($conn, $sql);
        

        $_SESSION["name"] = $name;
        $_SESSION["price"] = $price;
        $_SESSION["mob"] = $mob;
        // $_SESSION["mail"] = $email;
    
        $order  = [
            'receipt'         => $name,
            'amount'          => $price * 100, // amount in the smallest currency unit
            'currency'        => 'INR',// <a href="/docs/payment-gateway/payments/international-payments/#supported-currencies" target="_blank">See the list of supported currencies</a>.)
            'payment_capture' =>  1
          ];
     $razorpayOrder = $api->order->create($order);
    
    $razorpayOrderId = $razorpayOrder['id'];
    $_SESSION['razorpayOrderId'] = $razorpayOrderId;
    
    // echo $razorpayOrderId;
    }
?>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "<?=$keyId?>", // Enter the Key ID generated from the Dashboard
        "amount": "<?=$price  * 100  ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "<?=$name ?>",
        "description": "Test Transaction",
        "image": "images/logo.png",
        "order_id": "<?=$_SESSION['razorpayOrderId']?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function(response) {
            $.ajax({
                url: 'razorpay/verify.php',
                type: 'POST',
                data: {
                    'razorpay_order_id': response.razorpay_order_id,
                    'razorpay_payment_id': response.razorpay_payment_id,
                    'razorpay_signature': response.razorpay_signature,
                    'name': '<?=$name ?>',
                    'mob': '<?=$mob ?>',
                    'price': '<?=$price ?>',
                },
                success: function(data) {
                    console.log(data);
                    if(data == 'Success'){
                        
                        alert('payment done successfully');
                        // console.log(data);
                        window.location.href="https://iosmodulars.com/";
                    }
                    else{
                        // window.location.href="index.html";
                        console.log(data);
                    }
                }
            })
        },
        "prefill": {
            "name": "<?=$name?>",
            "contact": "<?=$mob?>"
        },
        "theme": {
            "color": "#F37254"
        }
    };
    var rzp1 = new Razorpay(options);
// document.getElementById('btn').onclick = function(e) {
    
  
    
// }
</script>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="js/ace-responsive-menu.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/snackbar.min.js"></script>
<script type="text/javascript" src="js/simplebar.js"></script>
<script type="text/javascript" src="js/parallax.js"></script>
<script type="text/javascript" src="js/scrollto.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="js/jquery.counterup.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/progressbar.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/timepicker.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="js/script.js"></script>

<script>
      $(window).load(function(e) {
        rzp1.open();
        e.preventDefault();
    })
</script>

