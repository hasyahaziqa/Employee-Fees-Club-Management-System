
<?php
session_start();
error_reporting(0);
include('includes/dbconnect.php');
if (strlen($_SESSION['ocasuid']==0)) {
  header('location:logout.php');
  } else{
  ?>

<?php $page='grade';
include("dbconnect.php");

if(isset($_POST['save']))
{	 
	
	$sname = $_POST['sname'];
	$ic = $_POST['ic'];
	$emailid='';
	$joindate = '';
	$contact='';
	$fees='';
	$about = '';
	$sector_code='';
	$grade='';
	$department='';
	$year_fees='';
	$year_club='';
	$year_membership='';
	$membership='';

	
	$sname = mysqli_real_escape_string($link,$_POST['sname']);
	$ic = mysqli_real_escape_string($link,$_POST['ic']);
	$emailid = mysqli_real_escape_string($link,$_POST['emailid']);
	$joindate = mysqli_real_escape_string($link,$_POST['joindate']);
	$contact = mysqli_real_escape_string($link,$_POST['contact']);
	$about = mysqli_real_escape_string($link,$_POST['about']);
	$sector_code = mysqli_real_escape_string($link,$_POST['sector_code']);
	$grade = mysqli_real_escape_string($link,$_POST['grade']);
	$department = mysqli_real_escape_string($link,$_POST['department']);
	$year_fees = mysqli_real_escape_string($link,$_POST['year_fees']);
    $year_club = mysqli_real_escape_string($link,$_POST['year_club']);
	$membership = mysqli_real_escape_string($link,$_POST['membership']);
    $year_membership = mysqli_real_escape_string($link,$_POST['year_membership']);
	$fees = mysqli_real_escape_string($link,$_POST['fees']);

	
	 $sql = "INSERT INTO student(sname,ic,emailid,joindate,contact,about,sector_code,grade,department,year_fees,year_club,membership,year_membership,fees)
	 VALUES ('$sname','$ic','$emailid','$joindate','$contact','$about','$sector_code','$grade','$department','$year_fees','$year_club','$membership', '$year_membership','$fees')";
	$sid = $link->insert_id;
 
	
	 if (mysqli_query($link, $sql)) {
		echo "<div class='alert alert-success'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Employee record has been added! </div>";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($link);
	 }
	 mysqli_close($link);
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
	
<?php include_once('includes/sidebar.php');?>
<?php include_once('includes/headee.php');?>
	 
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
    
<!DOCTYPE html>
<html>
  <body>
	<form method="post" action="employeeinfo.php">
		
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
							
						</div>
						<form action="employeeinfo.php" method="post" id="signupForm1" class="form-horizontal">
                        <div class="panel-body">
						<fieldset class="scheduler-border" >
						 <legend  class="scheduler-border">Personal Information:</legend>
						<div class="form-group">
								<label class="col-sm-2 control-label" for="Old">Full Name </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="sname" name="sname" />
								</div>
							
							
							</div><br>
						<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">Identification Card </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="ic" name="ic" maxlength="12" />
								</div>
							</div><br>
							
							
							<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">Contact </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="bar" name="contact" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);">
								</div>
							</div><br>
                           
							
							<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">Sector Code </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="sector_code" name="sector_code" maxlength="20" />
								</div>
							</div><br>
							
							<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">Department Level </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="department" name="department" maxlength="50" />
								</div>
							</div><br>
							
							<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">DOJ </label>
								<div class="col-sm-10">
									<input type="date" class="form-control" placeholder="Date of Joining" id="joindate" name="joindate"  style="background-color: #fff;"  />
								</div>
							</div><br>
						
							
						
							<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">Club </label>
								<div class="col-sm-10">
								

									
								    <input type="hidden" name="grade" value="1">
									<select  class="form-control" id="grade" name="grade"  >
										<option value="">Select club</option>
										
										<?php
									$sql = "select * from grade where delete_status='0' order by grade.grade asc";
									$q = $link->query($sql);
									
									while($r = $q->fetch_assoc())
									{
									echo '<option value="'.$r['id'].'"  '.(($grade==$r['id'])?'selected="selected"':'').'>'.$r['grade'].'</option>';
									}
									?>	
										</select> 		
								</div>
						</div><br>
							
                            
                            
							<h4 class="card-title">
								Fees Information
							</h4><hr><br>
							<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">Year Fees </label>
								<div class="col-sm-10">
									<input type="text" onblur="findTotal()" class="amount form-control" id="year_fees" name="year_fees" maxlength="50" />
								</div>
							</div><br>
							
						<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">Year Club </label>
								<div class="col-sm-10">
									<input type="text" onblur="findTotal()" class="amount form-control" id="year_club" name="year_club" maxlength="50" />
								</div>
							</div><br>
					
							<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">Total fees </label>
								<div class="col-sm-10">
									<input type="text" class="fees form-control" id="totalordercost" name="fees" readonly/>
								</div>
						</div><br>
							
							<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">Year Membership </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="year_membership" name="year_membership" value="<?php echo date('Y "/" m "/" d');?>" style="background-color: #fff;" readonly />
								</div>
							</div><br>
							
					
							<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">Membership? </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="membership" name="membership" />
								</div>
						</div><br>
						
						<h4 class="card-title">
								Optional Information
							</h4><hr><br>
						<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">About Employee </label>
								<div class="col-sm-10">
	                        <textarea class="form-control" id="about" name="about"></textarea >
								</div>
							</div><br><br>
							
							<div class="form-group"><br>
								<label class="col-sm-2 control-label" for="Old">Email Id </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="emailid" name="emailid"   />
								</div>
						    </div><br>
								
							
							<br><br>
							
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="save" value="submit">
							
						</form>
		<script>				
function findTotal(){
    var arr = document.getElementsByClassName('amount');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseFloat(arr[i].value))
            tot += parseFloat(arr[i].value);
    }
    document.getElementById('totalordercost').value = tot;
}</script>	
<script>
                          var zChar = new Array(' ', '(', ')', '-', '.');
var maxphonelength = 14;
var phonevalue1;
var phonevalue2;
var cursorposition;

function ParseForNumber1(object) {
    phonevalue1 = ParseChar(object.value, zChar);
}

function ParseForNumber2(object) {
    phonevalue2 = ParseChar(object.value, zChar);
}

function backspacerUP(object, e) {
    if (e) {
        e = e
    } else {
        e = window.event
    }
    if (e.which) {
        var keycode = e.which
    } else {
        var keycode = e.keyCode
    }

    ParseForNumber1(object)

    if (keycode >= 48) {
        ValidatePhone(object)
    }
}

function backspacerDOWN(object, e) {
    if (e) {
        e = e
    } else {
        e = window.event
    }
    if (e.which) {
        var keycode = e.which
    } else {
        var keycode = e.keyCode
    }
    ParseForNumber2(object)
}

function GetCursorPosition() {

    var t1 = phonevalue1;
    var t2 = phonevalue2;
    var bool = false
    for (i = 0; i < t1.length; i++) {
        if (t1.substring(i, 1) != t2.substring(i, 1)) {
            if (!bool) {
                cursorposition = i
                bool = true
            }
        }
    }
}

function ValidatePhone(object) {

    var p = phonevalue1

    p = p.replace(/[^\d]*/gi, "")

    if (p.length < 3) {
        object.value = p
    } else if (p.length == 3) {
        pp = p;
        d4 = p.indexOf('(')
        d5 = p.indexOf(')')
        if (d4 == -1) {
            pp = "(" + pp;
        }
        if (d5 == -1) {
            pp = pp + ")";
        }
        object.value = pp;
    } else if (p.length > 3 && p.length < 7) {
        p = "(" + p;
        l30 = p.length;
        p30 = p.substring(0, 4);
        p30 = p30 + ")"

        p31 = p.substring(4, l30);
        pp = p30 + p31;

        object.value = pp;

    } else if (p.length >= 7) {
        p = "(" + p;
        l30 = p.length;
        p30 = p.substring(0, 4);
        p30 = p30 + ")"

        p31 = p.substring(4, l30);
        pp = p30 + p31;

        l40 = pp.length;
        p40 = pp.substring(0, 8);
        p40 = p40 + "-"

        p41 = pp.substring(8, l40);
        ppp = p40 + p41;

        object.value = ppp.substring(0, maxphonelength);
    }

    GetCursorPosition()

    if (cursorposition >= 0) {
        if (cursorposition == 0) {
            cursorposition = 2
        } else if (cursorposition <= 2) {
            cursorposition = cursorposition + 1
        } else if (cursorposition <= 5) {
            cursorposition = cursorposition + 2
        } else if (cursorposition == 6) {
            cursorposition = cursorposition + 2
        } else if (cursorposition == 7) {
            cursorposition = cursorposition + 4
            e1 = object.value.indexOf(')')
            e2 = object.value.indexOf('-')
            if (e1 > -1 && e2 > -1) {
                if (e2 - e1 == 4) {
                    cursorposition = cursorposition - 1
                }
            }
        } else if (cursorposition < 11) {
            cursorposition = cursorposition + 3
        } else if (cursorposition == 11) {
            cursorposition = cursorposition + 1
        } else if (cursorposition >= 12) {
            cursorposition = cursorposition
        }

        var txtRange = object.createTextRange();
        txtRange.moveStart("character", cursorposition);
        txtRange.moveEnd("character", cursorposition - object.value.length);
        txtRange.select();
    }

}

function ParseChar(sStr, sChar) {
    if (sChar.length == null) {
        zChar = new Array(sChar);
    } else zChar = sChar;

    for (i = 0; i < zChar.length; i++) {
        sNewStr = "";

        var iStart = 0;
        var iEnd = sStr.indexOf(sChar[i]);

        while (iEnd != -1) {
            sNewStr += sStr.substring(iStart, iEnd);
            iStart = iEnd + 1;
            iEnd = sStr.indexOf(sChar[i], iStart);
        }
        sNewStr += sStr.substring(sStr.lastIndexOf(sChar[i]) + 1, sStr.length);

        sStr = sNewStr;
    }

    return sNewStr;
}
var clipboard = new Clipboard('.btn');

clipboard.on('success', function(e) {
    console.log(e);
});

clipboard.on('error', function(e) {
    console.log(e);
});</script> 						
  </body>
</html><?php } ?>