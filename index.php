<?php session_start();
		
		if($_SESSION['key'] != 'yes') {
		header("Location: login.php");
	}	 
?>
<?php 
	include("connection.php");
	
	if(isset($_POST['formSubmit']) != Null) {
		
		$EmployeeID = $_POST['employeeID'];
		$EmployeeName = $_POST['employeeName'];
		$Position = $_POST['position'];
		$Location = $_POST['location'];
		$Remarks = $_POST['Remarks'];
		$DaysOfVocation = $_POST['vocations'];
		$From = $_POST['From'];
		$To = $_POST['To'];
		$Attachement = "";
		$Current_Date = date('d-m-Y');
		
		$query = "INSERT INTO `leave_records`.`leave_record` (`Leave_Form_ID`, `Emp_ID`, `Emp_Name`, `Position`, `Location`, `Remarks`, `Days_of_Vacation`, `Leave_Attachements`, `Date_From`, `Date_To`,`Current_Date`) VALUES (NULL, '$EmployeeID', '$EmployeeName', '$Position', '$Location', '$Remarks', '$DaysOfVocation', '$Attachement', '$From', '$To', '$Current_Date');";
		
		
		if(mysqli_query($con, $query)) {
			
			$msg = '';
			$msg .=	"<div class=\"alert alert-success alert-dismissable\">";
            $msg .=  "<i class=\"fa fa-check\"></i>";
            $msg .=  "<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>";
            $msg .= "<b>Record Has Been Inserted Successfully!</b>";
            $msg .= "</div>";
		} else {
			
			$msg = '';
			$msg .=	"<div class=\"alert alert-danger alert-dismissable\">";
            $msg .=  "<i class=\"fa fa-check\"></i>";
            $msg .=  "<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>";
            $msg .= "<b>Record Has Not Been Inserted, Please Try Again!</b>";
            $msg .= "</div>";
		}
		
			
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Amania Group | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- DatePicker Style -->
		<link rel="stylesheet" type="text/css" href="css/datepicker3.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
			label.error { color: red; }
		</style>
        <!-- jQuery 2.0.2 -->
		<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <!-- jQuery Form Validation code -->
        <script src="js/jquery.validate.min.js" type="text/javascript"></script>
  <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register-form").validate({
    
        // Specify the validation rules
        rules: {
            employeeID: "required",
            employeeName: "required",
            positition: "required",
            location: "required"
        },
        
        // Specify the validation error messages
        messages: {
            employeeID: "Please enter Employee ID",
            employeeName: "Please enter Employee Name",
            position: "Please enter Position of Employee",
            location: "Please enter Location"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
			<?php include("includes/header.php"); ?>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar5.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $_SESSION['username']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <?php include("includes/menu.php"); ?>
                           
                  </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Welcome Mr. <?php echo $_SESSION['username']; ?> To
                      <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="row">
                
                <?php echo @$msg; ?>
               
                <form id="register-form" action="index.php" method="post">
                <div class="col-md-6">
                <div class="box-header">
                <h3 class="box-title">Employee Information</h3>
                </div>
				<div class="box-body">
                    <div class="form-group">
                    <label for="employeeID">Employee ID</label>
                    <input name="employeeID" id="employeeID" class="form-control" type="text" placeholder="Enter Employee ID">
                    </div>
                    <div class="form-group">
                    <label for="employeeName">Employee Name</label>
                    <input name="employeeName" id="employeeName" class="form-control" type="text" placeholder="Enter Employee Name">
                    </div>
                    <div class="form-group">
                    <label for="position">Position</label>
                    <input name="position" id="position" class="form-control" type="text" placeholder="Enter Employee Position">
                    </div>
                    
                    <div class="form-group">
                    <label>Remarks</label>
                    <textarea name="Remarks" id="Remarks" class="form-control" placeholder="Enter ..." rows="3"></textarea>
                    </div>

                </div>
                </div>
                <div class="col-md-6">
                <div class="box-header">
                <h3 class="box-title">Leave Information</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                    <label for="location">Location</label>
                    <input name="location" id="location" class="form-control" type="text" placeholder="Enter Location">
                    </div>
                    
                    <div class="form-group">
                    <label>From:</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div>
                    <input name="From" id="From" class="form-control pull-right Date" type="text">
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label>To:</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div>
                    <input name="To" id="To" class="form-control pull-right Date" type="text">
                    </div>
                    </div>
           
           			<div class="form-group">
                    <label for="vocations">Days of Vocations</label>
                    <input  name="vocations" id="vocations" class="form-control" type="text" placeholder="Enter Amount of Days">
                    </div>
                             
                    <div class="form-group">
                    <label for="attachement">Leave Attachement</label>
                    <input name="attachement" id="attachement" type="file">
                    </div>
                </div>
                </div>
				<div class="col-md-6">
				<div class="box-footer">
                <input class="btn btn-primary" type="submit" name="formSubmit" id="submit" value="Submit" />
                </div>
                </div>
                
                 </form></div>        
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/app.js" type="text/javascript"></script>
        <!-- DatePicker -->
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="application/javascript">
			// When the Document is Ready
			$(document).ready(function(e) {
                $('.Date').datepicker({
					format: "dd-mm-yyyy"
				});
            });
		</script>

    </body>
</html>