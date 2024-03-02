<?php
  session_start();
  if(!isset($_SESSION['mail']))
  {
    header('location:index.php');
  }
?>
<?php
include('includes/config.php');
if(isset($_POST['submit']))
{
  $uname = strip_tags(mysqli_real_escape_string($con,$_POST['name']));
  $uemail = strip_tags(mysqli_real_escape_string($con,$_POST['email']));
  $uphoneno = strip_tags(mysqli_real_escape_string($con,$_POST['phoneno']));
  $usubject = strip_tags(mysqli_real_escape_string($con,$_POST['subject']));
  $umessage = strip_tags(mysqli_real_escape_string($con,$_POST['message']));

  date_default_timezone_set('Asia/Kolkata');// change according timezone
  $currentTime = date( 'Y-m-d h:i:s A', time () );

  $sql = mysqli_query($con,"insert into  feedbak (name,email, phno, subject, message, feedbackdate) VALUES ('$uname', '$uemail', '$uphoneno', '$usubject', '$umessage', '$currentTime') ");
  if(mysqli_affected_rows($con)>0)
  {  
   ?>
<script>
alert("Thank you for getting in touch!\nWe appreciate you contacting us. One of our colleagues will get back in touch with you soon!\n Have a great day! :)"); 
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
    <title>News Portal | Contact us</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/mylogo.png" type="image/png">
  </head>
  <body>
    <!-- Navigation -->
    <?php include('includes/header.php');?>
    <!-- Page Content -->
    <div class="container">
      <?php
      $pagetype='contactus';
      $query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
      while($row=mysqli_fetch_array($query))
      {
      ?>
      <h1 class="mt-5 mb-3"><?php echo htmlentities($row['PageTitle'])?>
      
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
        <li class="breadcrumb-item active"><?php $time = date_default_timezone_set('Asia/Kolkata');$currentTime = date( 'l, M d, Y - h:i A', time () );echo $currentTime; ?> </li>
      </ol>
      <!-- Intro Content -->
      <div class="row mb-5 border shadow bg-light rounded p-3">
        <div class="col-lg-12">
          <div id="accordion">
            
            <p class="p-4 text-justify badge-dark  font-weight-bold rounded">Hello Everyone! Have a great day :) We are here to help you. If you want to know something or you have any suggestion then please mail us. We'd love to hear from you! Your valuable feedback, means a lot !! Thank You.</p>
            <div class="card ">
              <div class="card-header bg-info" id="heading">                
                <button class="btn btn-block btn-info collapsed font-weight-bold" data-toggle="collapse" data-target="#contactform" aria-expanded="false" aria-controls="contactform">Feel Free To Contact Us<br>/click here/
                </button>
                </h5>
              </div>
              <div id="contactform" class="collapse bg-light" aria-labelledby="heading" data-parent="#accordion">
                <article class="card-body mx-auto" style="max-width: 500px;">
                  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"><!--  -->
                    <div class="form-group">
                      <label class="font-weight-bold">Name:</label>
                      <input type="text" class="form-control"  name="name"  placeholder="Name....." required>
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bold">Email:</label>
                      <input type="email" name="email"  class="form-control" placeholder="Enter a Valid Email......." required>
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bold">Phone:</label>
                      <input type="text" name="phoneno" class="form-control" placeholder="Valid Phone Number..." required>
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bold">Subject:</label>
                      <input type="text" name="subject" class="form-control" placeholder="Subject/Message...." required>
                    </div>
                    <div class="form-group">
                      <label class="font-weight-bold">Your Message:</label>
                      <textarea name="message"  rows="5" class="form-control" style="resize: none"  placeholder="Your Message or any feedback" required></textarea>
                    </div>
                    <div class="form-group">
                      <div class="text-center">
                        <input type="submit" name="submit" class="btn btn-info btn-block font-weight-bold"   value="Send" data-toggle="modal" data-target="#exampleModal">
                      </div>
                    </div>
                  </form>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row border shadow bg-light rounded p-3 mb-5">
        <div class="col-lg-12">
         <p><?php echo $row['Description'];?></p> 
        </div>
      </div>
      <!-- /.row -->
      <?php } ?>

    </div>
    <!-- /.container -->
    <!-- Footer -->
    <?php include('includes/footer.php');?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>