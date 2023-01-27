<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $rollmobilenum=$_POST['rollmobilenum'];
    $mobnum=$_POST['mobnum'];
    $password=md5($_POST['password']);
    $sql ="SELECT RollNumber,MobileNumber,Password,ID,Cid FROM tbluser WHERE (RollNumber=:rollmobilenum || MobileNumber=:rollmobilenum) and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':rollmobilenum',$rollmobilenum,PDO::PARAM_STR);
    $query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['ocasuid']=$result->ID;
$_SESSION['ocasucid']=$result->Cid;
}
$_SESSION['login']=$_POST['rollmobilenum'];

echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>E-Trust User : Login</title>
	</head>   
 
	

<body class="bg-primary">

   </div>
                        <div class="login-form">
                            
							 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
		
}

    </style>
	
</head>
	
	<section class="vh-100" style="background-color: lightgrey;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
			
              <img src="logo.png"  position="center" width="700" height="150" 
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

    <body>   
		
					  <div class="wrapper">
						<div class="container">
						 <div class="row ">
               
					<div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
						<span class="h6 fw-bold mb-0">JABATAN PENDIDIKAN NEGERI JOHOR</span></div>
                    
				

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">User Login</h5>
                        <div class="login-form">
                            
                            <form method="post">
                                <div class="form-group">
                                    <label>Roll Number or Mobile Number</label>
                                    <input type="text" class="form-control" placeholder="Roll Number or Mobile Number" required="true" name="rollmobilenum">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                                </div>
                                <div class="checkbox">
                                    
                                    <label class="pull-right">
										<a href="forgot-password.php">Forgotten Password?</a>
									</label>

                                </div>
                                <button type="submit" name="login" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>

                                <label class="pull-right">
                                    <p>Create an account ? <a href="signup.php"> Sign up</a></p>
                                </div>
                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>