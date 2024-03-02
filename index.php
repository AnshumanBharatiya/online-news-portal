<?php
session_start();
error_reporting(0);
ob_start();
// $_SESSION['msg']="";
$error=null;
include('includes/config.php');
if(isset($_REQUEST['submit']))
{
	$e_mail=$_REQUEST['email'];
	$passwords=$_REQUEST['password'];
	$email_search="select * from tbluser where email='$e_mail' and status = 'active'";
	$sresult=mysqli_query($con,$email_search);
	$email_count=mysqli_num_rows($sresult);
	if($email_count)
	{
		$row =mysqli_fetch_assoc($sresult);
		$fetch_pass=$row['password'];
		$_SESSION['mail'] = $row['email'];
		$_SESSION['loc'] = $row['location'];
		$decode_pass=password_verify($passwords, $fetch_pass);
		if($decode_pass)
		{
			if(isset($_POST['rememberme']))
			{
				setcookie('email_cookie',$e_mail,time()+3600);
				setcookie('password_cookie',$passwords,time()+3600);
				header('Refresh:1;URL=home.php');
			}
			else
			{
				// $msg="wait 5 second";
				header('Refresh:1;URL=home.php');
			}
			// echo "Login Successful";
			// header('location:home1.php');
			// php tag end
// <script>
			// 	 location.replace("home1.php");
			// 	 alert("Login Successful");
// </script>
// php tag start
}
else
{
$error =  "Password Incorrect";
}
}
else
{
$error =  "Incorrect email, Check your Email";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>News Portal | Login Page</title>
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
						<li class="nav-item active">
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
		<div class=" bg-light">
			<article class="card-body mx-auto" style="max-width:400px;">
				<h4 class="card-title mt-2 text-center text-capitalize">create account</h4>
				<p class="text-center text-capitalize">get started with your free account</p>
				<p>
					<!-- <a href="#" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>&nbsp;&nbsp; Login via Gmail</a> -->
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
				<h4 class="text-center">Login Here</h4>
			</p>
			<div>
				<?php
				if(isset($_SESSION['msg']))
				{
					echo "<div class='alert alert-warning text-center font-weight-bold' role='alert'>". $_SESSION['msg'] ."</div>";
					$_SESSION['msg']=null;
				}
				else
				{
					
					echo "<div class='alert alert-warning text-center font-weight-bold' role='alert'>". $_SESSION['msg'] = "You are logged out, Please Login again." ."</div>";
						$_SESSION['msg']=null;
				}
				?>
				<?php if($error){ ?>
				<div class="alert alert-danger text-center" role="alert">
					Oops... <?php echo htmlentities($error); ?>
				</div>
				<?php } ?>
				<form  method="post">
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-envelope"></i></span>
						</div>
						<input type="text" name="email" class="form-control" placeholder="Enter Your a Valid Email"
						value="<?php if(isset($_COOKIE['email_cookie'])){echo $_COOKIE['email_cookie'];} ?>" required>
					</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
						</div>
						<input type="password" name="password" class="form-control" id="pass" placeholder="Enter Password"
						value="<?php if(isset($_COOKIE['password_cookie'])){echo $_COOKIE['password_cookie'];}?>" required>
					</div>
					<div class="form-group form-check">
						<label class="mt-2"><input type="checkbox" name="rememberme" class="form-check-input" id="rememberme" value="Remember Me">Remember Me</label>
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary btn-block" >Login Now</button>
					</div><hr>
					<p class="text-center">Click Here?<a href="forgotpwd.php" style="text-decoration: none;"><strong> Forgot Password</strong></a></P>
					<p class="text-center mb-4">Not Have an account? <a href="user_registration.php" style="text-decoration: none;"><strong> Register Here</strong></a></P>
				</form>
			</div>
		</article>
	</div>
	<div class="text-center p-5 footer" style="background:lightgray">
		<h5 class="text-dark mt-3">© 2020 - News Portal.. All Rights Reserved.</h5>
	</div>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>