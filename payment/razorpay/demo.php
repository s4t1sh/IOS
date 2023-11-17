<?php
include "../config/config.inc.php";
$users = displayByid('users','user_id',$_SESSION['id']);
$address = '';
if(isset($_SESSION['delivery_address'])){
	$address = $_SESSION['delivery_address'];
}
else{
	$address = $users[0]['user_address'];
}
$title = $_SESSION['product_name'];
$pincode = $_SESSION['delivery_pincode'];
$current_time=date('d-m-Y h:m:s');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$_SESSION['product_name']?></title>
    <link rel="stylesheet" href="<?=MAIN_DIR?>custom_css/bootstrap.min.css">
</head>
<body>
    <div id="watermark" style="position:fixed;bottom:0px;left:0px;width:21.8cm;height:28cm;z-index:-1000;">
        <h4>METAL N GLASS</h4>
    </div>
    <div class="container">
        <div class="row text-center">
            <h1><img src="<?=MAIN_DIR?>images/logo.jpg" height="50px" width="200px" /> INVOICE</h1>
        </div>
        <div class="row">
            <div>
                <h3>Billing Address <span class="pull-right">Details</span></h3>
                <p><?=$address?><br><?=$pincode?> <span class="pull-right">Customer Name: <?=$users[0]['user_name']?></span></p>
                <p class="pull-right">Invoice Date: <?=$current_time?></p>
                <h3>Bill To</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Description</td>
                            <td>Unit</td>
							<?php
							if(isset($_SESSION['kitchen_detail']) || isset($_SESSION['wardrobe_detail'])){
								echo '<td>Shape</td>';
							}
							?>
                            <td>Unit Price</td>
                            <td>Sales Tax</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><?=$_SESSION['product_name']?></td>
                            <td>1</td>
							<?php
							if(isset($_SESSION['kitchen_detail'])){
								echo '<td>';
								echo $_SESSION['kitchen_detail']['shape'];
								echo '</td>';
							}
							if(isset($_SESSION['wardrobe_detail'])){
								echo '<td>';
								echo $_SESSION['wardrobe_detail']['shape'];
								echo '</td>';
							}
							?>
                            <td><?php
                            $original_price = $_SESSION['price'];
                            $total = 0;
                            $igsts = 0;
                            if($_SESSION['state'] == 'Karnataka'){
                                $igsts = $original_price - ($original_price * (100 / (100 + ($product[0]['product_igst']))));
                            }
                            $sgsts = $original_price - ($original_price * (100 / (100 + ($product[0]['product_sgst']))));
                            $cgsts = $original_price - ($original_price * (100 / (100 + ($product[0]['product_cgst']))));
                            $total = $igsts + $sgsts + $cgsts;
                            echo number_format($original_price - $total);
                            ?></td>
                            <td>
                                <?php
                                $igst = 0;
                                if($_SESSION['state'] == 'Karnataka'){
                                    $igst = $product[0]['product_igst'];
                                }
                                echo '('. $product[0]['product_sgst'] .'%) + ('.$product[0]['product_cgst'] . '%) + ('.$igst.' %)';
                                ?>
                            </td>
                            <td><?=number_format($_SESSION['price'])?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php
// Include autoloader 
require_once '../dompdf/autoload.inc.php'; 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
$dompdf = new Dompdf(array('enable_remote' => true));
$html = ob_get_clean();
// Load HTML content 
$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 

// Output the generated PDF to Browser 
$dompdf->stream(str_replace(' ','_',$title).'_invoice', array("Attachment" => 0));
?>