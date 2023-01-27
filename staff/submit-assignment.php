<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ocastid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{

$asid=$_GET['assinid'];
$uid=$_GET['uid'];
$marks= $_POST['marks'];
$remarks= $_POST['remarks'];
$sql= "update tbluploadass set Marks=:marks, Remarks=:remarks where AssId=:asid && UserID=:uid ";
$query=$dbh->prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':asid',$asid,PDO::PARAM_STR);
$query->bindParam(':marks',$marks,PDO::PARAM_STR);
$query->bindParam(':remarks',$remarks,PDO::PARAM_STR);
 $query->execute();

  echo '<script>alert("Remark has been updated")</script>';
 echo "<script>window.location.href ='managetask.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
    <title>E-Trust : Update Task </title>

    <link href="../assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
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
                                <h1>Update Task</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li class="active">Update Task Information</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="card alert">
                        <div class="card-body">
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                <?php
                                    $assinid=$_GET['assinid'];
                                    $uid=$_GET['uid'];
$sql="SELECT grade.id,grade.grade,grade.detail,tblassigment.AssignmentNumber,tblassigment.AssignmenttTitle,tblassigment.SubmissionDate,tblassigment.AssigmentMarks,tblassigment.AssignmentDescription,tblassigment.CreationDate,tblassigment.AssignmentFile,tblteacher.ID,tblteacher.FirstName,tblteacher.LastName,tbluploadass.UserID,tbluploadass.AssId,tbluploadass.AssDes,tbluploadass.AnswerFile,tbluploadass.SubmitDate,tbluploadass.Marks,tbluploadass.Remarks,tbluploadass.UpdationDate, tbluser.ID as uid, tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tbluser.Cid,tbluser.RollNumber from tblassigment join grade on grade.id=tblassigment.Cid join tblteacher on tblteacher.ID=tblassigment.Tid join tbluploadass on tblassigment.ID=tbluploadass.AssId join tbluser on tbluploadass.UserID=tbluser.ID where tblassigment.ID=:assinid && tbluploadass.UserID=:uid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':assinid', $assinid, PDO::PARAM_STR);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
 
                            <div class="card-header m-b-20">

                                <h4 style="color: blue">Task Number: <?php  echo htmlentities($row->AssignmentNumber);?></h4>
                                <div class="card-header-right-icon">
                                    <ul>
                                        <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                                        <li class="card-option drop-menu"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                                <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                                <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                                <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                                            </ul>
                                        </li>
                                        <li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">

                             <table class="table table-bordered table-hover data-tables">
                              <tr> <td colspan="4" style="text-align: center;color: blue">Submitted By <?php  echo htmlentities($row->FullName);?>  (Roll Number:  <?php  echo htmlentities($row->RollNumber);?>)</td></tr>
                                <tr>
  <th width="200"><strong>Club</strong></th>
  <td><?php  echo htmlentities($row->grade);?>(<?php  echo htmlentities($row->detail);?>)</td>
  
  </tr>
  <tr>
 
  <th><strong>Task Title</strong></th>
  <td><?php  echo htmlentities($row->AssignmenttTitle);?></td>
  </tr>
  <tr>
  <th width="200"><strong>Task Description</strong></th>
  <td><?php  echo htmlentities($row->AssignmentDescription);?></td>
  <th><strong>Last Date of Submission</strong></th>
  <td><?php  echo $ldate=($row->SubmissionDate);?></td>
  </tr>
  <tr>
  <th width="200"><strong>View Task Paper</strong></th>
  <td colspan="3" style="text-align: center;"><a href="assignmentfile/<?php echo $row->AssignmentFile;?>"  width="100" height="100" target="_blank"> <strong style="color: red">View Task </strong></a></td>
  
  </tr>
                             </table>
                            
                            </div>
                            
                            <br>

                            <table class="table table-bordered table-hover data-tables">
        <tr ><td colspan="6" style="text-align: center;color: blue"><strong>Submitted Task Details</strong></td></tr>
  <tr>
    <th><strong>Task Description </strong></th>
    <td colspan="6" style="text-align: center;"><?php echo $row->AssDes?></td>
    
</tr>
<tr>
    <th><strong>View Submitted Task </strong></th>
    <td colspan="3" style="text-align: center;"><a href="../user/assignanswer/<?php echo $row->AnswerFile;?>" width="100" height="100" target="_blank"> <strong style="color: blue">View Task</strong></a></td>
    <th><strong>Submitted Date </strong></th>
    <td><?php echo $row->SubmitDate?></td>
</tr>
</table><br>
<?php 

if($row->Marks==""){
?> 
                <div class="row">          
<table class="table table-bordered table-hover data-tables">
<form method="post" name="submit" enctype="multipart/form-data">
    <tr>
    <th><strong>Remarks</strong></th>
    <td>
    <textarea  name="remarks" placeholder="Staff Remarks" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>
<tr>
    <th><strong>Comment Details </strong></th>
    <td>
    <input type='text' name="marks" placeholder="Comment" rows="12" cols="14"class="form-control wd-450" required="true"></td>
  </tr>
  
    <tr align="center">
    <td colspan="3"><button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
  </tr>
<?php }  else { 
?>
    <br>
    
<table class="table table-bordered table-hover data-tables">
<tr>
    <th><strong>Remark </strong></th>
    <?php if($row->Marks==""){ ?>
      <td colspan="2"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
    <td colspan="6" style="text-align: center;"><?php echo $row->Marks?></td> <?php } ?>
    <th><strong>Comment / Details </strong></th>
     <?php if($row->Marks==""){ ?>
      <td colspan="2"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
    <td colspan="6" style="text-align: center;"><?php echo $row->Remarks?></td> <?php } ?>

</tr>
<?php } ?>
</table>

   <?php $cnt=$cnt+1;}} ?>

  </form>
  </table>
        </div>          </div>
                    </div>
                   
                     <?php include_once('includes/footer.php');?>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery vendor -->
    <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="../assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="../assets/js/lib/menubar/sidebar.js"></script>
    <script src="../assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="../assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->


    <script src="../assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="../assets/js/lib/calendar-2/pignose.init.js"></script>
    <!-- scripit init-->

    <script src="../assets/js/scripts.js"></script>
</body>

</html><?php }  ?>