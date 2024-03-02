<!-- 732364379063-l4gu4n47mujpd0f700einpkcgeq74bkk.apps.googleusercontent.com -->
<!-- t75xUP5J0lFT-oDuBWtBaVcj -->
<?php
//gmail_login
//Include Configuration File
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
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>PHP Login using Google Account</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
		*{
		font-family: 'Muli', sans-serif;
		}
		.btn-gmail{
					background-color: #ea4335 ! important;
					color: #fff ! important;
				}
		</style>
		
	</head>
	<body>
	<div class="container mt-5 text-center">
		
		<div class="card card-header w-50 m-auto">
		<h4 class="mt-5">News Portal</h4>
		<h6>Login With Your Gmail Account</h6>
		<?php
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
				echo '<div class="mb-5">'.$login_button . '</div>';
			}
		?>
		</div>
	</div>
</body>
</html>
