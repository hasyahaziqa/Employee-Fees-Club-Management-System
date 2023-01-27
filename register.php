


<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocasuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))

  {
  
		$sql="insert into student(sname,ic,emailid,joindate,contact,sector_code,grade,department)
			  Values(:sname,:ic,:emailid,:joindate,:contact,:sector_code,:grade,:department)";

$query = $dbh->prepare($sql);
$query->bindParam(':sname',$sname,PDO::PARAM_STR);
$query->bindParam(':ic',$ic,PDO::PARAM_STR);
$query->bindParam(':emailid',$emailid,PDO::PARAM_STR);
$query->bindParam(':joindate',$joindate,PDO::PARAM_INT);
$query->bindParam(':contact',$contact,PDO::PARAM_INT);
$query->bindParam(':sector_code',$sector_code,PDO::PARAM_INT);
$query->bindParam(':grade',$grade,PDO::PARAM_INT);
$query->bindParam(':department',$department,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('You have successfully registered with us');</script>";
echo "<script>window.location.href ='register.php'</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
}
}
 else
{

echo "";
}
}
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
                                    <li class="active">Register User</li>
                                </ol>
                            </div>
                        </div>
                    </div>
					 </div>
	
	<head>
		<meta charset="UTF-8">
		<title>Register User</title>
		
		
		<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.css">
		<style>
			label{
				font-weight: bold;
			}
		</style>
	</head>
							
	<div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
					<h5 class="text-black">Add Employee Details</h5>
				</div>
			</div>
			<div class="row justify-content-center mt-10">
				<div class="col-md-12">
					<div class="card border-0">
						<div class="card-header bg-white">
							<h4 class="card-title">
								Personal Information
							</h4><br>
						</div>
						                     
	
<body >
    
	<div class="form-group">
								
	
                        <div class="login-form">
                        
                            <form method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="" name="sname" required="true" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" name="contact" class="form-control" required="true" maxlength="10" pattern="[0-9]+">
                                </div>
								
								<div class="form-group">
								<label>Identification Card </label>
								
									<input type="text" class="form-control" name="ic"/>
								</div>
						
						<div class="form-group">
								<label>Sector Code </label>
								
									<input type="text" class="form-control" value="" name="sector_code">
								</div>
							
						
							<div class="form-group">
								<label>Department Level </label>
								
									<input type="text" class="form-control" name="department" required="true">
								</div>
								
								
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" value="" name="email" required="true">
                                </div>
                               
                                <div class="form-group">
                                    <label>Club</label>
                                    <select type="text" value="" name="cid" required="true" class="form-control">
                                        <option value="">Select Club</option>
                                        <?php
                                          
$sql="SELECT * from grade";

$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{            


   ?>
                                       <option value="<?php  echo $row->id;?>"><?php  echo htmlentities($row->grade);?></option><?php $cnt=$cnt+1;}} ?>
                                    </select>
                                </div>
                                <div class="form-group">
								<label>DOJ </label>
								
									<input type="date" class="form-control" placeholder="Date of Joining" id="joindate" name="joindate" value="<?php echo  ($joindate!='')?date("Y-m-d", strtotime($joindate)):'';?>" style="background-color: #fff;"  />
							
							</div>
						
			
								
									  <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="submit">Submit</button>
								 
								   
								   
								</div>
							</div>
                         
                           
                           
                         
                           
                         </div>
							</form>
							
                        </div>
                            </div>
            
			
                </div>
                               
                               
                               
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
		

		$( document ).ready( function () {			
			
		$( "#joindate" ).datepicker({
dateFormat:"yy-mm-dd",
changeMonth: true,
changeYear: true,
yearRange: "1970:<?php echo date('Y');?>"
});	
		
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
		
</script>
</body>

</html>