<?php
  session_start();
  include('includes/config.php');
  error_reporting(0);
  if(!isset($_SESSION['mail']))
  {
    header('location:index.php');
  }
  $loc=$_SESSION['loc'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>News Portal | Home Page</title>
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
    figure{
    overflow: hidden;
    position: relative;
    }
    figure img{
    transition: all .2s linear;
    /* transition-delay: 0; */
    transform: scale(1);
    opacity: 0.7;
    }
    figure:hover img{
    position: relative;
    transform: scale(1.1);
    opacity: 1;
    }
    .scrollTop{
    position: fixed;
    bottom: 800px;
    right: 40px;
    width: 40px;
    height: 40px;
    background:#ff5064 url('images/up1.png');
    border-radius: 50%;
    border: 1px;
    box-shadow: 0 0 5px 2px rgba(50, 50, 50,0.3);    
    background-size: 30px;
    background-position: center;
    background-repeat: no-repeat;
    z-index: 100000;
    visibility: hidden;
    opacity: 0;
    transition: 0.6s;
    }
    .scrollTop:hover,
    .scrollTop:active{
    box-shadow: 0 0 8px 4px rgba(50, 50, 50,0.4);
    transform: scale(1.1);
    }
    .scrollTop.active2{
    bottom: 30px;
    visibility: visible;
    opacity: 1;
    }
    </style>
  </head>
  <body>
    <!-- Navigation -->
    <?php include('includes/header.php');?>
    <!-- Page Content -->
    <div class="container mt-5">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="corona_status.php">CoronaVirus</a>
        </li>
        <li class="breadcrumb-item active"><?php $time = date_default_timezone_set('Asia/Kolkata');$currentTime = date( 'l, M d, Y - h:i A', time () );echo $currentTime; ?> </li>
      </ol>
    </div>
    <!-- <section class="container">
      <div class="p-3">
        <div class="row border shadow bg-light rounded p-1" >
          <div class="col-lg-4 col-md-5 col-sm-4  p-3 text-center">
            <img src="images/virus.png" alt="" class="img-fluid rounded-circle" width="70" height="70"><span class="text-danger font-weight-bold mx-2 "> COVID-19 IN INDIA<span class="text-success"> LIVE</span></span>
          </div>
          <div class="col-lg-8 col-md-7 col-sm-8">
            <div class="row text-center p-2">
              <div class=" p-2  table-warning col-lg-3 col-md-6 col-sm-12">
                <h6>Confirmed</h6>
                <p class="font-weight-bold" id="confirmed"></p>
              </div>
              <div class="p-2  table-primary col-lg-3 col-md-6 col-sm-12">
                <h6>Active</h6>
                <p class="font-weight-bold" id="active"></p>
              </div>
              <div class=" p-2  table-success col-lg-3 col-md-6 col-sm-12">
                <h6>Recovered</h6>
                <p class="font-weight-bold" id="recovered"></p>
              </div>
              <div class="p-2 table-danger col-lg-3 col-md-6 col-sm-12">
                <h6>Deceased</h6>
                <p class="font-weight-bold" id="deceased"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <div class="container">
      <div class="row" style="margin-top: 4%">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <!-- Blog Post -->
          <?php
          if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
          } else {
          $pageno = 1;
          }
          $no_of_records_per_page = 8;
          $offset = ($pageno-1) * $no_of_records_per_page;
          $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
          $result = mysqli_query($con,$total_pages_sql);
          $total_rows = mysqli_fetch_array($result)[0];
          $total_pages = ceil($total_rows / $no_of_records_per_page);
          $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
          while ($row=mysqli_fetch_array($query)) {
          ?>
          <div class="card mb-5 shadow bg-white rounded">
            <figure>
              <img class="card-img-top postimg" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
            </figure>
            <div class="card-body">
              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
              <p><b>Category : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a> </p>
              
              <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo htmlentities($row['postingdate']);?>
            </div>
          </div>
          <?php } ?>
          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
              <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
            </li>
            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
              <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
            </li>
            <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
          </ul>
        </div>
        <!-- Sidebar Widgets Column -->
        <?php include('includes/sidebar.php');?>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
    <!-- Footer -->
    <?php include('includes/footer.php');?>
    <div class="scrollTop" onclick="scrollyToTop()"></div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    var url = "https://api.covid19india.org/data.json";
    $.getJSON(url,function(data){
    // console.log(data);
    var total_confirmed, total_active, total_recovered, total_deaths;
    //  count all the covid cases
    total_confirmed = data.statewise[0].confirmed;
    total_active = data.statewise[0].active;
    total_recovered = data.statewise[0].recovered;
    total_deaths = data.statewise[0].deaths;
    $("#confirmed").append(total_confirmed);
    $("#active").append(total_active);
    $("#recovered").append(total_recovered);
    $("#deceased").append(total_deaths);
    })
    })
    window.addEventListener('scroll', function(){
    var scroll = document.querySelector('.scrollTop');
    scroll.classList.toggle("active2",window.scrollY>500)
    });
    function scrollyToTop(){
    window.scrollTo({
    top:0,
    behavior:'smooth'
    });
    }
    </script>
  </head>
</body>
</html>