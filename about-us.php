<?php
  session_start();
  include('includes/config.php');

  if(!isset($_SESSION['mail']))
  {
    header('location:index.php');
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
    <style type="text/css">
      *{
        scroll-behavior: smooth;
      }
    </style>
  </head>
  <body>
    <!-- Navigation -->
    <?php include('includes/header.php');?>
    <!-- Page Content -->
    <div class="container">
      <?php
      $pagetype='aboutus';
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
        <li class="breadcrumb-item active">About</li>
        <li class="breadcrumb-item active"><?php $time = date_default_timezone_set('Asia/Kolkata');$currentTime = date( 'l, M d, Y - h:i A', time () );echo $currentTime; ?> </li>

      </ol>
      <!-- Intro Content -->
      <div>
        <section class="container">
        <div class="border shadow rounded p-3 mb-4">
          <h3 class="p-2 bg-info text-justify">“The pen had been mightier than the sword but then the tongue took over.”</h3>
          <p class="p-2 bg-info text-justify" style="letter-spacing: 1px; font-weight: bold; font-size: 15px;">“Debating is an ability of making a point without abusing an opponent." Everyone has inside of him a piece of good news. The good news is that you don't know how great you can be! How much you can love! What you can accomplish! And what your potential is!</p>
          <p class="p-2 bg-light text-justify" style="letter-spacing: 1px; font-weight: bold; font-size: 15px;">News Portal is an initiative by Odisha  Govt. to connect netizens to the latest information about Odisha and beyond. The site is also a gateway to the state and offers a wide spectrum of subjects such as History, Demography, Art and Culture, Tourist places, Festivals, Eminent sons of soil and so on.</p>
          <p class="p-2 bg-light text-justify" style="letter-spacing: 1px; font-weight: bold; font-size: 15px;">Under the dynamic leadership of Mr. Arya Kumar Chandan, Odisha Television is making rapid strides as a highly successful media venture in the state and beyond.</p>
          <p class="p-2 bg-light text-justify" style="letter-spacing: 1px; font-weight: bold; font-size: 15px;">News Portal is the pioneering media venture that boasts of redefining newschannel viewing in Odisha.  News Portal, its flagship brand, is known for its free, fair and unbiased news reporting. The channel is respected for its integrity and commitment to set and practice enviable standards of journalism.</p>
        </div>
        <div class="row border rounded p-3 mb-4">
          <div class="col-lg-6 col-md-6 col-12">
            <figure class="shadow bg-white rounded">
              <img src="images/mylogo1.png" class="img-fluid bg-light" style="height: 320px;">
            </figure>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <h1>Who are we ?</h1>
            <hr class="bg-dark">
            <h5> Republic is not one man.</h5>
            <h5> Republic is the united might of the people.</h5>
            <h5> Republic will not bow down.</h5>
            <h5> Republic is too loud to be silenced.</h5>
            <h5> You are the Republic.</h5>
            <hr class="bg-light">
            <h5> "Government of the people, by the people, for the people" - abraham lincoln </h5>
          </div>
        </div>
      </section>
      </div>
      <div class="row">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    // $('').scrollspy({ target: '#navbar-example2' })
    </script>
  </body>
</html>


