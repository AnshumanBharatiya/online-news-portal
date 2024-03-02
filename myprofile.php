<?php
  session_start();
  include('includes/config.php');
  error_reporting(0);

  $loc=$_SESSION['loc'];
  if(!isset($_SESSION['mail']))
  {
    header('location:index.php');
  }
  //display data
  $email=$_SESSION['mail'];
  $sql = mysqli_query($con,"select * from tbluser where email='$email' ");
  $row = mysqli_fetch_array($sql);
//change new password
if(isset($_POST['passwordbtn']))
{
	//Current/old Password hashing
	$pwd=$_POST['opass'];
	// $options = ['cost' => 12, 'salt' => "newsportal15"];
	$hashedpass=password_hash($pwd, PASSWORD_BCRYPT);
	$email=$_SESSION['mail'];
	// new password hashing
	$newpassword=$_POST['nepass'];
	$newhashedpass=password_hash($newpassword, PASSWORD_BCRYPT);

	date_default_timezone_set('Asia/Kolkata');// change according timezone
	$currentTime = date( 'Y-m-d h:i:s A', time () );

	$sql=mysqli_query($con,"select password from  tbluser where email ='$email'");
	$num=mysqli_fetch_array($sql);
	if($num>0)
	{	
		$dbpassword=$num['password'];
		if (password_verify($pwd, $dbpassword))
		{
			$con=mysqli_query($con,"update tbluser set password='$newhashedpass', update_date='$currentTime' where email='$email'");
	?>
		
		<script>
			alert('Password Changed Successfully !!');
		</script>

	<?php

		}
	}
	else
	{
	?>
	<script>
		alert('Old Password not match !!');
	</script>
	<?php
		
	}
}
if(isset($_POST['edit']))
{
	$email=$_SESSION['mail'];
	$newname = strip_tags(mysqli_real_escape_string($con,$_POST['newuname']));
	// $newmail = strip_tags(mysqli_real_escape_string($con,$_POST['newemail']));
	$newphno = strip_tags(mysqli_real_escape_string($con,$_POST['newphoneno']));
	$newloc = strip_tags(mysqli_real_escape_string($con,$_POST['newlocation']));

	date_default_timezone_set('Asia/Kolkata');// change according timezone
	$currentTime = date( 'Y-m-d h:i:s A', time () );
	$sql = mysqli_query($con,"update tbluser set uname='$newname', phno='$newphno',location='$newloc',update_date='$currentTime' where email='$email' ");
	if(mysqli_affected_rows($con)>0)
	{
		  $_SESSION['loc'] = $newloc;
	?>
	<script>
		alert("You have Successfully Updated your Profile");
	</script>
	<?php
		// header('location:myprofile.php');
	}
	else
	{
	?>
	<script>
		alert("You have failed to Update your Profile");
	</script>
	<?php
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>News Portal | About us</title>
		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<!-- Custom styles for this template -->
		<link href="css/modern-business.css" rel="stylesheet">
		<link rel="shortcut icon" href="images/mylogo.png" type="image/png">
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	</head>
	<body>
		<!-- Navigation -->
		<?php include('includes/header.php');?>
		<!-- Page Content -->
		<div class="container">
			<h5 class="mt-5 mb-3">Sign in as (<?php echo htmlentities($_SESSION['mail']); ?>)</h5>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="home.php">Home</a>
				</li>
				<li class="breadcrumb-item active">My Profile</li>
				<li class="breadcrumb-item active"><?php $time = date_default_timezone_set('Asia/Kolkata');$currentTime = date( 'l, M d, Y - h:i A', time () );echo $currentTime; ?> </li>
			</ol>
			<!-- Intro Content -->
			<div class="row mb-5">
				<div class="col-lg-12">
					<div id="accordion">
						<div class="card shadow bg-light rounded mb-3">
							<div class="card-header bg-info " id="headingOne">
								
								<button class="btn btn-link text-light font-weight-bold" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">My Profile	</button>
								</h5>
							</div>
							<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									<article class="card-body mx-auto" style="max-width: 500px;">									
											<div class="form-group">
												<label>User Name :</label>
												<input type="text" class="form-control"  value="<?php echo htmlentities($row["uname"]); ?>" disabled>
											</div>
											<div class="form-group">
												<label>Your Email-Id :</label>
												<input type="email" value="<?php echo htmlentities($_SESSION['mail']); ?>" class="form-control" disabled>
											</div>
											<div class="form-group">
												<label>Your Phone No :</label>
												<input type="text" value="<?php echo htmlentities($row["phno"]); ?>" class="form-control" disabled>
											</div>
											<div class="form-group">
												<label>Location : </label>
												<input type="text" name="newlocation" value="<?php echo htmlentities($row["location"]); ?>" class="form-control" style="height: 100px;resize: none;" disabled>
											</div>
									</article>								
								</div>
							</div>
						</div>
						<div class="card shadow bg-light rounded mb-3">
							<div class="card-header bg-info" id="headingTwo">
								
								<button class="btn btn-link  text-light collapsed font-weight-bold" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Edit Your Profile
								</button>
								</h5>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="card-body">									
									<article class="card-body mx-auto" style="max-width: 500px;">
										<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
											<div class="form-group">
												<label>User Name :</label>
												<!-- <input type="hidden" value="<?php //echo $SESSION['userid'];?>" name="userid"> -->
												<input type="text" class="form-control"  name="newuname" value="<?php echo htmlentities($row["uname"]); ?>" required>
											</div>
											<div class="form-group">
												<label>Your Email-Id : </label> 
												<input type="email" name="newemail" value="<?php echo htmlentities($_SESSION['mail']); ?>" class="form-control" required disabled>
											</div>
											<div class="form-group">
												<label>Your Phone No :</label>
												<input type="text" name="newphoneno" value="<?php echo htmlentities($row["phno"]); ?>" class="form-control" required>
											</div>
											<div class="form-group">
												<label>Location : </label>
												<!-- <textarea name="address" rows="2"  class="form-control" style="resize: none" required> -->
												<input type="text" name="newlocation" value="<?php echo htmlentities($row["location"]); ?>" class="form-control" style="height: 100px;resize: none;"  required>	<!-- <?php  //echo htmlentities($_SESSION['loc']); ?> -->
												<!-- </textarea> -->
											</div>
											<div class="form-group">
												<div class="text-center">
													<input type="submit" name="edit" class="btn btn-info btn-block"  value="Edit Profile">
												</div>
											</div>
										</form>										
									</article>
								</div>
							</div>
						</div>
						<div class="card shadow bg-light rounded mb-3">
							<div class="card-header bg-info" id="headingThree">
								
								<button class="btn btn-link text-light collapsed font-weight-bold" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Change Your Password
								</button>
								</h5>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="card-body">
									<article class="card-body mx-auto" style="max-width: 500px;">
										<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
											<div class="form-group">
												<label>Old Password :</label>
												<input type="password" class="form-control" name="opass" required>
											</div>
											<div class="form-group">
												<label>New Password :</label>
												<input type="password" name="nepass" id="npass" class="form-control" required>
											</div>
											<div class="form-group">
												<label>Confirm Password :</label>
												<input type="password" name="cpass" id="cpass" class="form-control" required>
											</div>
											<div class="form-group">
												<div class="text-center">
													<input type="submit" name="passwordbtn" class="btn btn-info btn-block"  value="Change Password">
												</div>
											</div>
										</form>										
									</article>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	<!-- /.container -->
	<!-- Footer -->
	<?php include('includes/footer.php');?>
	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
			window.onload = function ()
			{
				document.getElementById("npass").onchange = validatePassword;
				document.getElementById("cpass").onchange = validatePassword;
			}
			function validatePassword()
			{
				var pass2 = document.getElementById("cpass").value;
				var pass1 = document.getElementById("npass").value;
				if (pass1 != pass2)
					document.getElementById("cpass").setCustomValidity("Passwords Don't Match");
				else
					document.getElementById("cpass").setCustomValidity('');
				//empty string means no validation error
			}
			
		</script>
</body>
</html>