<?php
	session_start();
	
	include("connection.php");
	
	
	if(isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$selectQuery = "SELECT * FROM login WHERE Username='$username' AND Password='$password' AND Status='Active'";
		
		$query = mysqli_query($con, $selectQuery);

		if(mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query, MYSQL_ASSOC);
			$_SESSION['username'] = $username;
			$_SESSION['key'] = 'yes';
			
			header("Location: index.php");	
		} else {
			$msg = "Username OR Password is not Valid";	
		}
	}
?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Amania Groupn</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form action="login.php" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="User Name"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block" name="submit">Sign me in</button>  
                    
                    <p><a href="#">I forgot my password</a></p>
                </div>
                <div class="callout callout-danger">
                <h4><?php echo @$msg; ?></h4>
                </div>
            </form>
        </div>

        <!-- jQuery 2.0.2 -->
        <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>