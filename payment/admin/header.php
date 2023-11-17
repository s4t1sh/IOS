<?php
    include "../db.php";
    session_start();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- Mirrored from grandetest.com/theme/findhouse-html/page-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Sep 2020 12:14:18 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced search custom, agency, agent, business, clean, corporate, directory, google maps, homes, listing, membership packages, property, real estate, real estate agent, realestate agency, realtor">
<meta name="description" content="FindHouse - Real Estate HTML Template">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/dashbord_navitaion.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="../css/responsive.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<!-- Title -->
<title>Interga Office Solutions</title>
<!-- Favicon -->
<!-- <link href="../images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="../images/favicon.ico" sizes="128x128" rel="shortcut icon" /> -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
    .sidebar-menu li a{
        font-size:18px !important;
    }
	.fooooter {
		position: fixed;
		left: 0;
		bottom: 0;
		width: 100%;
		/* background-color: red;
		color: white; */
		text-align: center;
	}
</style>
<body>
<div class="wrapper">
	<div class="preloader"></div>

	<!-- Main Header Nav -->
	<header class="header-nav menu_style_home_one style2 menu-fixed main-menu">
		<div class="container-fluid p0">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <!-- <img class="nav_logo_img img-fluid" src="../images/logo.png" alt="logo.png"> -->
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
					<li><a href="page-add-new-property.html"><?php echo $_SESSION['reg'];?></a></li>
		        </ul>
		    </nav>
		</div>
	</header>

	<!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
			<div class="header stylehome1">
				<div class="main_logo_home2 text-center">
		            <!-- <img class="nav_logo_img img-fluid mt20" src="../images/logo.png" alt="logo.png"> -->
		            <span class="mt20">Interga Office Solutions</span>
				</div>
				<ul class="menu_bar_home2">
	                <li class="list-inline-item list_s"><a href="../page-register.html"><span class="flaticon-user"></span></a></li>
					<li class="list-inline-item"><a href="#menu"><span></span></a></li>
				</ul>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			
		</nav>
	</div>

    <div class="dashboard_sidebar_menu dn-992">
	    <ul class="sidebar-menu">
	   		<li class="header"  style="background-color:#fff !important;">
                   <img src="../images/logo.png" alt="logo.png"> 
                   <!-- <span>Interga Office Solutions</span> -->
            </li><br><br><br>
	   		<!-- <li class="title"><span>Main</span></li> -->
	    	<li class="treeview"><a href="transactions.php"><i class="flaticon-layers"></i><span> Transactions</span></a></li>
	      
		    <li><a href="#" data-toggle="modal" data-target="#exampleModal" ><i class="flaticon-logout"></i> <span>Logout</span></a></li>
	    </ul>
    </div>
