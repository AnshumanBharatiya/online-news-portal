<?php
session_start();
error_reporting(0);
$emsg="";
$msg="";
$pmsg="";
include('includes/config.php');
if(isset($_REQUEST['submit']))
{
// $userids=mysqli_real_escape_string($con,$_REQUEST['userid']);
$usernames=mysqli_real_escape_string($con,$_REQUEST['username']);
$emails=mysqli_real_escape_string($con,$_REQUEST['email']);
$mobiles=mysqli_real_escape_string($con,$_REQUEST['mobile']);
$passwords=mysqli_real_escape_string($con,$_REQUEST['password']);
$cpasswords=mysqli_real_escape_string($con,$_REQUEST['cpassword']);
$locations=mysqli_real_escape_string($con,$_REQUEST['location']);
$pwd = password_hash($passwords, PASSWORD_BCRYPT);//BCRYPT
$cpwd = password_hash($cpasswords, PASSWORD_BCRYPT);
$token = bin2hex(random_bytes(15));
$confirmcode = rand();

$email_search="select * from tbluser where email='$emails'";
$sresult=mysqli_query($con,$email_search);
$email_count = mysqli_num_rows($sresult);

date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'Y-m-d h:i:s A', time () );
// echo $currentTime;
if($email_count > 0)
{
$emsg="This email is already exists";
}
else
{
if($passwords === $cpasswords)
{
	$insert_query="insert into tbluser (uid,uname,email,phno,password,location,creationdate,token,status) values ('$confirmcode','$usernames','$emails','$mobiles','$pwd','$locations','$currentTime','$token','inactive')";
	// $pmsg="Registration Failed, Does not inserted data";
	$iresult=mysqli_query($con,$insert_query);
	if($iresult)
	{	
		$subject = "Email Activation";
		$body = "Hi, $usernames, Click here to activate your account.
		http://localhost:8181/asd/newsportal/newsportal/activate.php?token=$token&code=$confirmcode";
		$headers = "From: bharatiyaa6@gmail.com";
		if (mail($emails, $subject, $body, $headers))
		{
			$_SESSION['msg'] = "Check Your Mail To Activate Your Account $emails ";
			header('location:index.php');
		} 
		else
		{
			$_SESSION['msg'] = "Mail is not send to this Account $emails,Register With Enter a Valid mail";

		}
}
else
{
?>
<script>
	alert("Registration Failed");
</script>
<?php
}
}
else
{
$pmsg="Password are not Matching.";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>News Portal | Registration Page</title>
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
		<!-- ogtag -->
		<meta property="og:title" content=" News Portal "/>
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="website" />
		<meta property="og:description" content="" />
		<meta property="og:site_name" content="site_name" />
		<meta property="og:url" content="https://" />
		<meta property="og:image" content="https://">
		<!-- twitter card -->
		<meta name='twitter:card' content='summary_large_image' />
		<meta name='twitter:site' content='@' />
		<meta name='twitter:creator' content='@'/>
		<meta name='twitter:domain' content='https://' />
		<meta name='twitter:title' content=' News Portal' />
		<meta name="twitter:description" content="">
		<meta name="twitter:image" content="https://">
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
		.divider-text{
			position: relative;
			text-align: center;
			margin-top: 15px;
			margin-bottom: 15px;
		}
		.divider-text span{
			padding: 10px;
			font-size: 14px;
			position: relative;
			z-index: 2;
		}
		.divider-text:after{
			content: "";
			position: absolute;
			width: 100%;
			border-bottom: 1px solid #ddd;
			top: 55%;
			left: 0;
			z-index: 1;
		}
		.btn-facebook{
			background-color:#405D90 ! important;
			color: #fff ! important;
			
		}
		.btn-gmail{
			background-color: #ea4335 ! important;
			color: #fff ! important;
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
			box-shadow: 0 0 7px rgba(0, 0, 0,1);
		}
		.footer{
			box-shadow: 0 0 7px rgba(0, 0, 0, 1);
		}
		</style>
	</head>
	<body>
		<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background:lightgray;)">
			<div class="container">
				<a class="navbar-brand" href="" style="outline: none;">
					<img src="images/mylogo1.png" alt="" loading="lazy" class="logo">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="index.php"> Login</a>
						</li>
						<li class="nav-item active">
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
				<h4 class="card-title mt-3 text-center text-capitalize">create account</h4>
				<p class="text-center text-capitalize">get started with your free account</p>
				<p>
					<!-- <a href="#" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>&nbsp;&nbsp;&nbsp;&nbsp; Login via 
					Gmail</a> -->
					<?php
					include('config.php');
					$login_button = '';
					if(isset($_GET["code"]))
					{
					$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
					if(!isset($token['error']))
					{
					
					$google_client->setAccessToken($token['access_token']);
					
					$_SESSION['access_token'] = $token['access_token'];
					$google_service = new Google_Service_Oauth2($google_client);
					
					$data = $google_service->userinfo->get();
					
					if(!empty($data['given_name']))
					{
					$_SESSION['user_first_name'] = $data['given_name'];
					}
					if(!empty($data['family_name']))
					{
					$_SESSION['user_last_name'] = $data['family_name'];
					}
					if(!empty($data['email']))
					{
					$_SESSION['user_email_address'] = $data['email'];
					}
					if(!empty($data['gender']))
					{
					$_SESSION['user_gender'] = $data['gender'];
					}
					if(!empty($data['picture']))
					{
					$_SESSION['user_image'] = $data['picture'];
					}
					}
					}
					
					if(!isset($_SESSION['access_token']))
					{
					$login_button = '<a href="'.$google_client->createAuthUrl().'"  class="btn btn-block btn-gmail"><i class="fa fa-google"></i>&nbsp;&nbsp; Login With Google</a>';
					}
						// else
						// {
								// 	$login_button = '<a href="'.$google_client->createAuthUrl().'"  class="btn btn-block btn-gmail"><i class="fa fa-google"></i>&nbsp;&nbsp; Login With Google</a>';
						// }
					
					if($login_button == '')
					{
					// echo '<div class="card-header">Are You want to continue from this account</div><div class="card-body">';
					// echo '<img src="'.$_SESSION["user_image"].'" class="card-body img-thumbnail" width="300" height="200" />';
					// echo '<br> <p class="text-capitalize"><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</p>';
					// echo '<p><b>Email :</b> '.$_SESSION['user_email_address'].'</p>';
				// echo '<h5><a href="logout.php">Logout</h5></div>';
				$_SESSION['mail']=$_SESSION['user_email_address'];
				header('location:home.php');
				}
				else
				{
				echo '<div align="center">'.$login_button . '</div>';
				}
				?>
				</p>
				<p class="divider-text">
					<span class="bg-light"> OR </span>
					<h4 class="text-center">SignUp Here</h4>
				</p>
				<div>
					<?php if($emsg){ ?>
	                    <div class="alert alert-danger text-center font-weight-bold" role="alert">
	                    Oops...<?php echo htmlentities($emsg);?>
	                    </div>
                    <?php } ?>                                
                    <?php if($pmsg){ ?>
                    	<div class="alert alert-warning text-center font-weight-bold" role="alert">
                    	Oops..<?php echo htmlentities($pmsg);?></div>
                    <?php } ?>
                    <?php if($msg){ ?>
                    	<div class="alert alert-danger text-center font-weight-bold" role="alert">
                    	Oops..<?php echo htmlentities($msg);?></div>
                    <?php } ?>
                    <?php if($_SESSION['tokenmsg']){ ?>
                    	<div class="alert alert-danger text-center font-weight-bold" role="alert">
                    	<?php echo htmlentities($_SESSION['tokenmsg']); $_SESSION['tokenmsg']=null; ?></div>
                    <?php } ?>
				</div>
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="Enter Your Name" autocomplete="off" required>
					</div>
					
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-envelope"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="Enter Your Valid Email Address" autocomplete="off" required>
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-phone"></i></span>
						</div>
						<input type="text" name="mobile" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile Number" autocomplete="off" required>
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
						</div>
						<input type="password" name="password" class="form-control" id="pass" placeholder="Create Password" required>
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-lock"></i> </span>
						</div>
						<input type="password" name="cpassword" class="form-control" id="cpass" placeholder="Confirm Password" required>
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-location-arrow"></i> </span>
						</div>
						<textarea name="location" rows="3" class="form-control " placeholder="Enter your location" style="resize: none;"></textarea>
					</div>
					
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary btn-block" >Create Account</button>
					</div>
					<p class="text-center">Have an account? <a href="index.php" style="text-decoration: none;"><strong> Log In</strong></a></P>
				</form>
			</article>
		</div>
		<div class="text-center p-5 footer" style="background:lightgray">
			<h5 class="text-dark mt-3">© 2020 - News Portal.. All Rights Reserved.</h5>
		</div>
		
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
	</body>
</html>