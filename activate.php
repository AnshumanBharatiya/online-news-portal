<?php
	session_start();
	include('includes/config.php');
	if(!isset($_GET['token']))
	{
		header('location:user_registration.php');
	}
	else
	{
		$tokens=$_GET['token'];
		$getcode=$_GET['code'];
		$tokensql = mysqli_query($con,"select * from tbluser where uid='$getcode'");
		$row=mysqli_fetch_array($tokensql);
		if($tokens != $row['token'])
		{
			$_SESSION['tokenmsg'] = "This Link has been Expired!!! ";
			header('location:user_registration.php');
		}
		else
		{
			$newtoken = bin2hex(random_bytes(15));
			$update_query="update tbluser set status = 'active', token = '$newtoken' where uid='$getcode' ";
			$uresult=mysqli_query($con,$update_query);
			if($uresult)
			{
				if(isset($_SESSION['msg']))
				{
					$_SESSION['msg'] = "Account Updated Successfully";
					// header('location:index.php');
					header('Refresh:5;URL=index.php');
				}
			}
			else
			{
				$_SESSION['msg'] = "Account not Updated";
				header('Refresh:5;URL=user_registration.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Activating your email.....</title>
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
	</head>
<body>
</body>
</html>