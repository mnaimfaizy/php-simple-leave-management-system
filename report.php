<?php 
	session_start();
	
	if($_SESSION['key'] != 'yes') {
		header("Location: login.php");
	}

	include("connection.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Amania Group | Reports</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
		<!-- DataTables -->
        <link rel="stylesheet" type="text/css" href="css/datatables/dataTables.bootstrap.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
         <script type="text/javascript">
	function conf(id) {
		var value = window.confirm("Are You Sure, You Want to DELETE This Record?");
		if(value == true) {
			
			window.location = "delete.php?id="+id;
		} else {
			alert("Please Selecte Correct Record");
		}
	}
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
                      <small>Reporting Page</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Reports</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <div class="row">
                
                 <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Search Employees Information</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Emp ID</th>
                                                <th>Emp Name</th>
                                                <th>Position</th>
                                                <th>Remarks</th>
                                                <th>Days</th>
                                                <th>Date - From </th>
                                                <th>Date - To </th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
			<?php
                $query = mysqli_query($con,"SELECT * FROM `leave_record` ORDER BY `Leave_Form_ID` DESC ");
                while($rows = mysqli_fetch_assoc($query)) {
		?>
                <tr>
                    <td><?php echo $rows["Emp_ID"]; ?></td>
                    <td><?php echo $rows["Emp_Name"]; ?></td>
                    <td><?php echo $rows["Position"]; ?></td>
                    <td><?php echo $rows["Remarks"]; ?></td>
                    <td><?php echo $rows["Days_of_Vacation"]; ?></td>
                    <td><?php echo $rows["Date_From"]; ?></td>
                    <td><?php echo $rows["Date_To"]; ?></td>
                    
                    <td><a href="update.php?id=<?php echo $rows["Leave_Form_ID"]; ?>" class="btn btn-primary">UPDATE </a> - 
                    <button id="<?php echo $rows["Leave_Form_ID"]; ?>" onClick="conf(this.id)" class="btn btn-danger">DELET</button></td>
                         <?php } ?></tr>
    
                    </tfoot>
                </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                 </div>        
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
		<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/app.js" type="text/javascript"></script>
        <!-- DataTables -->
        <script src="js/jquery.dataTables.js"></script>
		<script src="js/dataTables.bootstrap.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>