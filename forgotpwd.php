<?php
session_start();
include('includes/config.php');
error_reporting(0);
$error=null;
if(isset($_REQUEST['submit']))
{
	$emails=strip_tags(mysqli_real_escape_string($con,$_REQUEST['email']));
	$email_search="select * from tbluser where email='$emails'";
	$sresult=mysqli_query($con,$email_search);
	$email_count = mysqli_num_rows($sresult);
	if($email_count>0)
	{
		$row=mysqli_fetch_array($sresult);
		$usernames = $row['uname'];
		$token = $row['token'];
		$confirmcode = $row['uid'];

		$subject = "Recovery Password";
		$body = "Hi, $usernames Click here to reset your password.
		http://localhost:8181/asd/newsportal/newsportal/recover_password.php?token=$token&code=$confirmcode";
		$headers = "From: bharatiyaa6@gmail.com";
		if (mail($emails, $subject, $body, $headers))
		{
	  		$_SESSION['msg'] = "Check Your Mail To Reset Your Password $emails ";
			header('location:index.php');
		} 
		else
		{
	    	$_SESSION['msg'] = "Mail is not send to this Account $emails ";
		}	
	}
	else
	{
		$error= "Email not Found, Register Again";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forgot Password</title>
		<!-- mata part -->
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="News Portal" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1' />
		<!-- <meta http-equiv="refresh" content="300; url=http://"> -->
		<link href='https://' rel='canonical' />
		<link href='https://' rel="home"/>
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
		nav li{
			text-align: center;
		}
		nav{
			box-shadow: 0 0 7px rgba(0, 0, 0, 1);
		}
		.footer{
			box-shadow: 0 0 7px rgba(0, 0, 0, 1);
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
						<li class="nav-item ">
							<a class="nav-link" href="index.php"> Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="user_registration.php">New Registration</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"> Help</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="bg-light">
			<article class="card-body mx-auto" style="max-width: 400px;">
			<h4 class="card-title mt-5 text-center text-capitalize">recover your account</h4>
			<p class="text-center text-capitalize">Please Enter a Valid Email </p>
			<!-- <p  class="alert alert-success text-center" role="alert"> </p> -->
			<p> 
				<?php if(isset($error)){ ?>
						<div class='alert alert-danger text-center'><?php echo htmlentities($error); $error=null;?></div>
				<?php } ?>
				<?php if($_SESSION['newmsg']){ ?>
				<div class="alert alert-danger text-center"><?php echo $_SESSION['newmsg']; $_SESSION['newmsg']=null; ?></div>
			<?php }?>
			</p>
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-envelope"></i></span>
					</div>
					<input type="email" name="email" class="form-control" placeholder="Enter a Valid Email" required>
				</div>	
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary btn-block">Send Mail</button>				
				</div><hr>

				<p class="text-center ">Have an account? <a href="index.php" style="text-decoration: none;"><strong> Login</strong></a></P>
				<p class="text-center mb-5">Not Have an account? <a href="user_registration.php" style="text-decoration: none;"><strong> SignUp Here</strong></a></P>
			</form>
		</article>
		</div>
		<div class="text-center mt-4 p-5 footer" style="background:lightgray">
			<h5 class="text-dark mt-3">© 2020 - News Portal.. All Rights Reserved.</h5>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
    	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>