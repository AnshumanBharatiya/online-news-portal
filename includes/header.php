<style type="text/css">
  /* @import url('https://fonts.googleapis.com/css2?family=Lemonada:wght@500&display=swap'); */
  *{
    /* font-family: 'Lemonada', cursive; */
  }
nav{
box-shadow: 0 0 7px rgba(0, 0, 0, 1);
background: lightgray;
font-weight: bold;
font-size: 18px;
color: #000;
}
nav li{
      text-align: center;
}
</style><br>
<nav class="navbar fixed-top navbar-expand-lg navbar-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="home.php"><img src="images/mylogo1.png" height="70"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-dark" href="about-us.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="home.php">News Feed</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="corona_status.php">Coronavirus</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="myprofile.php">My Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="contact-us.php">Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>