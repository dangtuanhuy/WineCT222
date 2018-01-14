<?php 
session_start();
define(ROOT_PATH, dirname(dirname(__DIR__)));
include(ROOT_PATH."/library/connect.php");
?>
<?php if (!$_SESSION['admin']):?>
<!DOCTYPE HTML>
<html>
<head>
	<title>AppWine Adminstration Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="AppWine Adminstration Login" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<base href="/AppWine/">
	<link rel="icon" href="public/images/icons/appwine.jpg">
	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap/bootstrap.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="public/css/Admin/style.css">
	<link rel="stylesheet" type="text/css" href="public/css/Admin/morris.css">

	<!-- Graph CSS -->
	<link rel="stylesheet" type="text/css" href="public/css/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="public/js/jquery-ui/jquery-ui.css">

	<!-- jQuery -->
	<script src="public/js/jquery/jquery.min.js"></script>
	<!-- //jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<link rel="stylesheet" type="text/css" href="public/css/Admin/icon-font.min.css">
	<!-- //lined-icons -->
	<style>
	h3 {
		text-align: center;
		color: white;
	}
	</style>
</head> 
<body>


	<div class="main-wthree">
		<div class="container">			
			<div class="sin-w3-agile">
				<h2>Sign In</h2>	
			    <div class="form-errors">
			        <h3>
			        	<?php
			        	if (isset($_POST['btnLogin'])) {
			        		$username = trim($_POST["txtSignIn"]);
			        		$password = trim($_POST["txtPassword"]);
			        		
			        		// else {
			        	    // $username = mysql_real_escape_string($username);
		        			$password = md5($password);
		        			$result = mysql_query("SELECT * FROM customer WHERE Username='$username' AND Password='$password'") or die (mysql_error());
		        			if (mysql_num_rows($result) == 0)
		        			{
		        				echo "Incorrect username or password.";
		        				// echo "<script language='javascript'>window.location='./admin/'</script>";
		        			}
		        			else
		        			{
		        				$row = mysql_fetch_array($result, MYSQL_ASSOC);
		        				$_SESSION["username"] = $username;
		        				$_SESSION["admin"] = $username;
		        				echo "<script language='javascript'>window.location='./admin/index.php'</script>";
		        			}
			        		// }
			        	}
			        	?>
			        </h3>
			    </div>
				<form action="" method="post" id="form1" name="form1">
					<div class="username">
						<span class="username">Username:</span>
						<input type="text" name="txtSignIn" id="txtSignIn" class="name" placeholder="">
						<div class="clearfix"></div>
					</div>
					<div class="password-agileits">
						<span class="username">Password:</span>
						<input type="password" name="txtPassword" id="txtPassword" class="password" placeholder="">
						<div class="clearfix"></div>
					</div>
					<div class="login-w3">
						<input type="submit" class="login" value="Sign In" name="btnLogin"
						id="btnLogin">
					</div>
					<div class="clearfix"></div>
				</form>
				
				<div class="footer">
					<p><i class="fa fa-copyright"></i> CT241 - Team 1 (2017-2018)<a href="https://elcit.ctu.edu.vn/"></a></p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php else: 
define(ROOT_PATH, dirname(dirname(__DIR__)));
include('Admin.php');
?>
<?php endif; ?>
