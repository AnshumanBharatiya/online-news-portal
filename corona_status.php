<?php
  session_start();
  include('includes/config.php');

  if(!isset($_SESSION['mail']))
  {
    header('location:index.php');
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>News Portal | Corona_Status</title>
		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<!-- Custom styles for this template -->
		<link href="css/modern-business.css" rel="stylesheet">
		<link rel="shortcut icon" href="images/mylogo.png" type="image/png">
		<style type="text/css">
			.h5{
				display: none;
			}
			.carousel-inner img{
				position: relative;
				width: 100%;
				height: 100%;
				background-size: 100% 100%;
			}
			@media (max-width: 990px){
				.h5{
					display: block;
				}
			}
			.gallery1{
			display: flex;
			justify-content: center;
			align-self: center;
			min-height: 100vh;
			background: #222;
		}
		.container1{
			position: relative;
			max-width: 100%;
			display: grid;
			grid-template-columns: repeat(auto-fill,minmax(300px, 1fr));
			grid-template-rows: minmax(100px, auto);
			margin: 40px;
			grid-auto-flow: dense;
			grid-gap: 5px;
		}
		.container1 .box1{
			background: #333;
			padding: 20px;
			display: grid;
			font-size: 20px;
			place-items: center;
			text-align: center;
			color: #fff;
			transition: 0.5s;
		}
		.container1 .box1:hover{
			background: #e91e63;
		}
		.container1 .box1 img{
			position: relative;
			max-width: 100px;
			margin-bottom: 10px;
		}
		.container1 .box1:nth-child(1) {
			grid-column: span 2;
			grid-row: span 1;
		}
		.container1 .box1:nth-child(2) {
			grid-column: span 1;
			grid-row: span 2;
		}
		.container1 .box1:nth-child(4) {
			grid-column: span 1;
			grid-row: span 2;
		}
		.container1 .box1:nth-child(5) {
			grid-column: span 3;
			grid-row: span 1;
		}
		@media (max-width: 900px ) {
						.container1{
			grid-template-columns: repeat(auto-fill,minmax(50%, 1fr));
						grid-template-rows: minmax(auto, auto);
			}
		}
		@media (max-width: 900px){
			.container1 .box1{
				grid-column: unset!important;
				grid-row: unset!important;
			}
		}
		</style>>
	</head>
	<body onload="fetch()">
		<!-- Navigation -->
		<?php include('includes/header.php');?>
		<!-- Page Content -->
		<div class="container">
			<?php
			$pagetype='coronavirus';
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
				<li class="breadcrumb-item active">Corona Status / News Feed</li>
				<li class="breadcrumb-item active"><?php $time = date_default_timezone_set('Asia/Kolkata');$currentTime = date( 'l, M d, Y - h:i A', time () );echo $currentTime; ?> </li>
			</ol>
			<!-- Intro Content -->
			<div class="row  mt-4">
				<div class="col-lg-3 col-md-3 col-sm-3 mt-2 col-12">
					<div class="list-group" id="list-tab" role="tablist">
						<a class="list-group-item list-group-item-action active" id="list-india-list" data-toggle="list" href="#list-india" role="tab" aria-controls="home">COVID-19 INDIA</a>
						<a class="list-group-item list-group-item-action" id="list-indchart-list" data-toggle="list" href="#list-indchart" role="tab" aria-controls="profile">COVID-19 INDIA-CHART</a>
						<a class="list-group-item list-group-item-action" id="list-world-list" data-toggle="list" href="#list-world" role="tab" aria-controls="messages">COVID-19 WORLD</a>
					</div>
					<h5 class="text-dark mt-4 mb-2 p-1 text-justify">HELPLINE NUMBERS:</h5>
					<div class="p-1" style="height: 300px; overflow-y: scroll;">
						<table class="table table-sm table-hover table-bordered table-striped table-responsive-sm text-center ">
							<thead class="table-danger">
								<tr>
									<th>STATE/UT</th>
									<th>HELPLINE NO.</th>
								</tr>
							</thead>
							<tbody class="table-light" >
								<tr>
									<td>Andhra Pradesh</td>
									<td>0866-2410978</td>
								</tr>
								<tr>
									<td>Andaman and Nicobar Islands</td>
									<td>03192-232102</td>
								</tr>
								<tr>
									<td>Arunachal Pradesh</td>
									<td>9436055743</td>
								</tr>
								<tr>
									<td>Assam</td>
									<td>6913347770</td>
								</tr>
								<tr>
									<td>Bihar</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Chandigarh</td>
									<td>9779558282</td>
								</tr>
								<tr>
									<td>Chhattisgarh</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Dadra and Nagar Haveli and Daman & Diu</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Delhi</td>
									<td>011-22307145</td>
								</tr>
								<tr>
									<td>Goa</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Gujarat</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Haryana</td>
									<td>8558893911</td>
								</tr>
								<tr>
									<td>Himachal Pradesh</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Jammu & Kashmir</td>
									<td>01912520982, 0194-2440283</td>
								</tr>
								<tr>
									<td>Jharkhand</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Karnataka</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Kerala</td>
									<td>0471-2552056</td>
								</tr>
								<tr>
									<td>Ladakh</td>
									<td>01982256462</td>
								</tr>
								<tr>
									<td>Lakshadweep</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Madhya Pradesh</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Maharashtra</td>
									<td>020-26127394</td>
								</tr>
								<tr>
									<td>Manipur</td>
									<td>3852411668</td>
								</tr>
								<tr>
									<td>Meghalaya</td>
									<td>108</td>
								</tr>
								<tr>
									<td>Mizoram</td>
									<td>102</td>
								</tr>
								<tr>
									<td>Nagaland</td>
									<td>7005539653</td>
								</tr>
								<tr>
									<td>Odisha</td>
									<td>9439994859</td>
								</tr>
								<tr>
									<td>Puducherry</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Punjab</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Rajasthan</td>
									<td>0141-2225624</td>
								</tr>
								<tr>
									<td>Sikkim</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Tamil Nadu</td>
									<td>044-29510500</td>
								</tr>
								<tr>
									<td>Telangana</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Tripura</td>
									<td>0381-2315879</td>
								</tr>
								<tr>
									<td>Uttarakhand</td>
									<td>104</td>
								</tr>
								<tr>
									<td>Uttar Pradesh</td>
									<td>18001805145</td>
								</tr>
								<tr>
									<td>West Bengal</td>
									<td>1800313444222, 03323412600</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-12 mt-3 p-1">
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active text-start"  id="list-india" role="tabpanel" aria-labelledby="list-india-list" style="height: 100vh; overflow-y: scroll;">
							<div class="container-fluid p-5 bg-light text-center">
								<h5 class="text-uppercase"> Covid-19 India Tracker</h5>
							</div>
							<div class="container">
								<div class="row text-center p-3">
									<div class=" p-2  text-warning table-warning col-lg-3 col-md-6 col-6">
										<h6>Confirmed</h6>
										<p class="font-weight-bolder " id="confirmed"></p>
									</div>
									<div class="p-2  text-primary table-primary col-lg-3 col-md-6 col-6">
										<h6>Active</h6>
										<p class="font-weight-bolder " id="active"></p>
									</div>
									<div class=" p-2  text-success table-success col-lg-3 col-md-6 col-6">
										<h6>Recovered</h6>
										<p class="font-weight-bolder " id="recovered"></p>
									</div>
									<div class="p-2  text-danger table-danger col-lg-3 col-md-6 col-6">
										<h6>Deceased</h6>
										<p class="font-weight-bolder " id="deceased"></p>
									</div>
								</div>
							</div>
							<section class="container mt-2">
								<div>
									<table class="table table-sm table-hover table-bordered table-striped table-responsive-sm text-justify">
										<thead>
											<tr>
												<th class="table-secondary">Last Update</th>
												<th class="table-info">State/UT Name</th>
												<th class="table-warning">Total Confirmed</th>
												<th class="table-primary">Total Active</th>
												<th class="table-success">Total Recovered</th>
												<th class="table-danger">Total Deceased</th>
											</tr>
										</thead>
										<?php
										// error_reporting(0);
											$data = file_get_contents("https://api.covid19india.org/data.json");
											$coronalive = json_decode($data,true);
											$stateCount = count($coronalive['statewise']);
											$i=1;
											while($i < $stateCount){
										?>
										<tbody>
											<tr>
												<td class="table-secondary"><?php echo $coronalive['statewise'][$i]['lastupdatedtime']; ?></td>
												<td class="table-info"><?php echo $coronalive['statewise'][$i]['state']; ?></td>
												<td class="table-warning"><?php echo $coronalive['statewise'][$i]['confirmed']; ?></td>
												<td class="table-primary"><?php echo $coronalive['statewise'][$i]['active']; ?></td>
												<td class="table-success"><?php echo $coronalive['statewise'][$i]['recovered'];?></td>
												<td class="table-danger"><?php echo $coronalive['statewise'][$i]['deaths']; ?></td>
											</tr>
										</tbody>
										<?php
											$i++;
										}
										?>
									</table>
								</div>
							</section>
						</div>
						<div class="tab-pane fade" id="list-indchart" role="tabpanel" aria-labelledby="list-indchart-list" style="height: 100vh; overflow-y: scroll;">
							<div class="container-fluid p-5 bg-light text-center">
								<h5 class="text-uppercase"> Covid-19 India Tracker</h5>
								
							</div>
							<div class="container">
								<div class="row text-center p-3">
									<div class=" p-2  text-warning table-warning col-lg-3 col-md-6 col-6">
										<h6>Confirmed</h6>
										<p class="font-weight-bolder " id="confirmed1"></p>
									</div>
									<div class="p-2  text-primary table-primary col-lg-3 col-md-6 col-6">
										<h6>Active</h6>
										<p class="font-weight-bolder " id="active1"></p>
									</div>
									<div class=" p-2  text-success table-success col-lg-3 col-md-6 col-6">
										<h6>Recovered</h6>
										<p class="font-weight-bolder " id="recovered1"></p>
									</div>
									<div class="p-2  text-danger table-danger col-lg-3 col-md-6 col-6">
										<h6>Deceased</h6>
										<p class="font-weight-bolder " id="deceased1"></p>
									</div>
								</div>
								
								<h5 class="h5">To see the Graph Rotate Your Phone</h5>
								<canvas id="myChart" class=" embed-responsive-item"></canvas>
								
							</div>
						</div>
						<div class="tab-pane fade" id="list-world" role="tabpanel" aria-labelledby="list-world-list" style="height: 100vh; overflow-y: scroll;">
							<div class="container-fluid p-5 bg-light text-center">
								<h5 class="text-uppercase"> Covid-19 live updates of the world</h5>
								
							</div>
							<div class="container">
								<div class="row text-center p-3">
									<div class=" p-2  text-warning table-warning col-lg-4 col-md-4 col-4 ">
										<h6>Confirmed</h6>
										<p class="font-weight-bolder " id="confirmed2"></p>
									</div>
									<div class=" p-2  text-success table-success col-lg-4 col-md-4 col-4">
										<h6>Recovered</h6>
										<p class="font-weight-bolder " id="recovered2"></p>
									</div>
									<div class="p-2  text-danger table-danger col-lg-4 col-md-4 col-4 ">
										<h6>Deceased</h6>
										<p class="font-weight-bolder " id="deceased2"></p>
									</div>
								</div>
								
							</div>
							<section>
								<div class="container mt-4">
									<table class="table table-sm table-striped table-bordered  table-responsive-sm text-justify" id="corona_tbl">
										<thead class="table-dark  text-dark">
											<tr>
												<th class="table-primary">Country Name</th>
												<th class="table-warning">Total Confirmed</th>
												<th class="table-success">Total Recovered</th>
												<th class="table-danger">Total Deceased</th>
												<th class="table-warning">New Confirmed</th>
												<th class="table-success">New Recovered</th>
												<th class="table-danger">New Deceased</th>
											</tr>
										</thead>
									</table>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<p><?php echo $row['Description'];?></p>
				</div>
			</div>
			<!-- /.row -->
			<?php } ?>
		</div>
		<div class="container mb3-2">
			<div id="myslideshow" class="carousel slide carousel-fade" data-ride="carousel">
				<ul class="carousel-indicators">
					<li data-target="#myslideshow" data-slide-to="0" class="active"></li>
					<li data-target="#myslideshow" data-slide-to="1"></li>
					<li data-target="#myslideshow" data-slide-to="2"></li>
					<li data-target="#myslideshow" data-slide-to="3"></li>
					<li data-target="#myslideshow" data-slide-to="4"></li>
					<li data-target="#myslideshow" data-slide-to="5"></li>
					<li data-target="#myslideshow" data-slide-to="6"></li>
					<li data-target="#myslideshow" data-slide-to="7"></li>
					<li data-target="#myslideshow" data-slide-to="8"></li>
				</ul>
				<div class="carousel-inner border shadow-sm mb-4">
					<div class="carousel-item active">
						<img src="images/img1.jpg" alt="">
						<div class="carousel-caption ">
							<h3 class="text-danger font-weight-bold text-uppercase">Stay Home Stay Safe</h3>
						</div>
					</div>
					<div class="carousel-item">
						<img src="images/img2.jpg" alt="">
						<div class="carousel-caption ">
							<h3 class="text-light font-weight-bold text-uppercase">wear mask and gloves</h3>
						</div>
					</div>
					<div class="carousel-item">
						<img src="images/img3.jpg" alt="">
						<div class="carousel-caption ">
							<h3 class="text-light font-weight-bold">Clean your hands often.</h3>
						</div>
					</div>
					<div class="carousel-item">
						<img src="images/img3.1.jpg" alt="">
						<div class="carousel-caption ">
							<h3 class="text-danger font-weight-bold"> Use soap and water, or an alcohol-based hand rub.</h3>
						</div>
					</div>
					<div class="carousel-item">
						<img src="images/img4.jpg" alt="">
						<div class="carousel-caption ">
							<!-- <h3 class="text-danger font-weight-bold">Third slide label</h3>							 -->
						</div>
					</div>
					<div class="carousel-item">
						<img src="images/img4.1.jpg" alt="">
						<div class="carousel-caption ">
							<h4 class="text-dark font-weight-bold">Maintain a safe distance from anyone who is coughing or sneezing.</h4>
						</div>
					</div>
					<div class="carousel-item">
						<img src="images/img5.jpg" alt="">
						<div class="carousel-caption ">
							<!-- <h3 class="text-danger font-weight-bold">Third slide label</h3>							 -->
						</div>
					</div>
					<div class="carousel-item">
						<img src="images/img5.1.jpg" alt="">
						<div class="carousel-caption ">
							<!-- <h3 class="text-danger font-weight-bold">Third slide label</h3>							 -->
						</div>
					</div>
					
				</div>
				<a href="#myslideshow" class="carousel-control-prev" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
					<span class="sr-only">previous</span>
				</a>
				<a href="#myslideshow" class="carousel-control-next" role="button" data-slide="next">
					<span class="carousel-control-next-icon"></span>
					<span class="sr-only">next</span>
				</a>
			</div>
		</div>
		<div class="container">
			<div class="gallery1">
				<div class="container1">
					<div class="box1">
						<div class="content">
							<img src="images/stayhome.png" width="60" height="60">
							<p>Stay Home Stay Safe. There is no place that can be deemed safe during the current crisis. </p>
						</div>
					</div>
					<div class="box1">
						<div class="content">
							<img src="images/washhand.png" width="60" height="60">
							<p>Clean your hands often. Use soap and water, or an alcohol-based hand rub. </p>
						</div>
					</div>
					<div class="box1">
						<div class="content">
							<img src="images/distance.png" width="60" height="60">
							<p>Maintain a safe distance from anyone who is coughing or sneezing.</p>
						</div>
					</div>
					<div class="box1">
						<div class="content">
							<img src="images/wearmask.png" width="60" height="60">
							<p>Wear a mask when physical distancing is not possiblea and Don’t touch your eyes, nose or mouth.</p>
						</div>
					</div>
					<div class="box1">
						<div class="content">
							<img src="images/doctor.png" width="60" height="60">
							<p>Stay home if you feel unwell(any symptoms of corona) then Consult with Doctors.</p>
						</div>
					</div>
					<div class="box1">
						<div class="content">
							<img src="images/cooking.png" width="60" height="60">
							<p>Eat only well-cooked, good and healthy food.</p>
						</div>
					</div>
					<div class="box1">
						<div class="content">
							<img src="images/flight.png" width="60" height="60">
							<p>Stay Home Stay Safe and Do not travel.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer -->
		<?php include('includes/footer.php');?>
		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
		<script type="text/javascript" src="js/corona.js"></script>
	</body>
</html>