<?php
	session_start();
	session_unset();
	session_destroy();
	setcookie('email_cookie','',time()-120);
	setcookie('password_cookie','',time()-120);
	include('config.php');
$google_client->revokeToken();
	header('Refresh:1;URL=index.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Logout redirecting...</title>
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
	</head>
<body>
</body>
</html>