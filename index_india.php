<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocasuid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>E-Trust User : Dashboard</title>
  
    <!-- Styles -->
    <link href="../assets/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="../assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="../assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="../assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="../assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/lib/unix.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <?php include_once('includes/sidebar.php');?>
   
    <?php include_once('includes/header.php');?>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Payment</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
	
							
	<div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
					<h5 class="text-black">Payment User</h5>
				</div>
			</div>
			<div class="row justify-content-center mt-10">
				<div class="col-md-12">
					<div class="card border-0">
						<div class="card-header bg-white">
							<h4 class="card-title">
								Payment Checkout
							</h4><br>
						</div>
						                     
				  
	
						<div class="card-body">
							<form action="pay1.php" method="post">
								<label for="">Name:</label>
								<div class="form-group">
									<input type="text" name="name" id="name" class="form-control" placeholder="Enter the name..."  required="true">
																																	 
								</div>
					
								<label for="">Email:</label>
								<div class="form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="Enter the email..." required="true">
										
									
																																	 
								</div>
								<label for="">Phone No:</label>
								<div class="form-group">
									<input type="text" name="phone" id="phone" class="form-control" placeholder="Enter the phone..." required='true' maxlength='11' >
								</div>
								<label for="">Paid: (RM)</label>
								<div class="form-group">
									<input type="text" name="amt" id="amt" class="form-control" placeholder="Enter the Amount..." required>
								</div>
								
								<label for="">Date:</label>
								<div class="form-group">
									<input type="date" name="created_at" id="created_at" class="form-control" placeholder="Enter the Date..." required>
								</div>
								
								<label for="">Remark:</label>
								<div class="form-group">
									<input type="text" name="transaction_remark" id="transaction_remark" class="form-control" placeholder="Enter the Remark..." required>
								</div>
								<div class="form-group">
													   
									<button type="submit" name="payment" class="btn btn-dark btn-block font-weight-bold" onclick="validate()">Proccess</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
						</div>
		
    <!-- jquery vendor -->
    <script src="../assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="../assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="../assets/js/lib/menubar/sidebar.js"></script>
    <script src="../assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/datatables-init.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <!-- scripit init-->
	</body>
</html><?php }  ?>