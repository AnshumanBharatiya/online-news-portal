<?php
session_start();
include('includes/config.php');
$passmsg=null;
error_reporting(0);
if(empty($_REQUEST['token']))
{
	$_SESSION['newmsg']="Register With New Mail or Enter Mail again";
	header('location:forgotpwd.php');
}
else
{
	$tokens=$_REQUEST['token'];
	$getcode=$_REQUEST['code'];
	$tokensql = mysqli_query($con,"select * from tbluser where uid='$getcode' ");
	$row=mysqli_fetch_array($tokensql);
	if($tokens != $row['token'])
	{
		$_SESSION['tokenmsg'] = "This Link has been Expired!!! ";
		header('location:user_registration.php');
	}
	else
	{
		if(isset($_REQUEST['submit']))
		{
			$newpassword = mysqli_real_escape_string($con,$_REQUEST['password']);
			$pwd = password_hash($newpassword, PASSWORD_BCRYPT);//BCRYPT

			$newtoken = bin2hex(random_bytes(15));
			$getcode=$_REQUEST['code'];

			date_default_timezone_set('Asia/Kolkata'); // change according timezone
  			$currentTime = date( 'Y-m-d h:i:s A', time () );

			$update_query="update tbluser set password='$pwd', token='$newtoken' , update_date='$currentTime' where uid='$getcode' ";
			$uresult=mysqli_query($con,$update_query);

			if($uresult)
			{
				$_SESSION['msg'] = "Your Password has been Updated.";
				header('location:index.php');
			}
			else
			{
				$passmsg = "Your Password not updated";
				header('location:recover_password.php');
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>News Portal|Password recover</title>
		<!-- mata part -->
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="News Portal" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1' />
		<!-- <meta http-equiv="refresh" content="300; url=https://"> -->
		<link href='https://' rel='canonical' />
		<link href='https://' rel="home" />
		<!-- favicon -->
		<link rel="shortcut icon" href="images/mylogo.png" type="image/png">
		<!-- font style -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
		
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			font-family: 'muli',sans-serif;
			box-sizing: border-box;
		}
		.logo{
				width: 210px;
				height: 70px;
				object-fit: cover
		}
		.nav-link{
			font-size: 22px;
			font-weight: 600;
		}
		nav{
			box-shadow: 0 0 7px rgba(0, 0, 0, 1);
		}
		.footer{
			box-shadow: 0 0 7px rgba(0, 0, 0, 1);
			height: 170px;
			
		}
		</style>
	</head>
	<body>
		<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background:lightgray">
			<div class="container">
				<a class="navbar-brand" href="" style="outline: none;">
					<img src="images/mylogo1.png" alt="" loading="lazy" class="logo">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto mb-2 mb-lg-0">
						<li class="nav-item active">
							<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"> Help</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="bg-light">
			<article class="card-body mx-auto" style="max-width: 400px;">
				<h4 class="card-title mt-3 text-center text-capitalize">enter new pasword</h4>
				<p class="text-center text-capitalize">fill both the field correctly</p>
				<p class=" text-danger text-center p-2">
					<?php
						if(isset($_SESSION['passmsg']))
						{
							echo $_SESSION['passmsg'];
						}
						else
						{
							echo $_SESSION['passmsg'] = "";
						}
					?>
				</p>
				<form action="" method="post">	
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-lock"></i></span>
					</div>
					<input type="password" name="password" class="form-control" id="pass" placeholder="New Password" required>
				</div>	
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-lock"></i> </span>
					</div>
					<input type="password" name="cpassword" class="form-control" id="cpass" placeholder="Confirm Password" required>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary btn-block" >Change Password</button>				
				</div>
				<p class="text-center mt-4">If you want to login? <a href="index.php" style="text-decoration: none;"><strong> Click Here</strong></a></P>	
			</form>
			</article>
		</div>
		<script type="text/javascript">
			window.onload = function ()
			{
				document.getElementById("pass").onchange = validatePassword;
				document.getElementById("cpass").onchange = validatePassword;
			}
			function validatePassword()
			{
				var pass2 = document.getElementById("cpass").value;
				var pass1 = document.getElementById("pass").value;
				if (pass1 != pass2)
					document.getElementById("cpass").setCustomValidity("Passwords Don't Match");
				else
					document.getElementById("cpass").setCustomValidity('');
				//empty string means no validation error
			}
		</script>
		<div class="text-center mt-4 p-5 footer" style="background:lightgray">
			<h5 class="text-dark mt-3">© 2020 - News Portal.. All Rights Reserved.</h5>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>

