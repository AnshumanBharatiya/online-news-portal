<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{
header('location:index.php');
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/mylogo.png" type="image/png">
        <!-- App title -->
        <title>Newsportal | Register User</title>
        <link rel="shortcut icon" href="assets/images/mylogo.png" type="image/png">
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../plugins/morris/morris.css">
        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        
        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <?php include('includes/topheader.php');?>
            <!-- Left Sidebar Start -->
            <?php include('includes/leftsidebar.php');?>
            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">View Feedback</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="">Admin</a>
                                        </li>
                                        <li>
                                            <a href="">User</a>
                                        </li>
                                        <li class="active">
                                            Feedback
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped table-colored table-hover table-bordered table-responsive-sm table-centered table-inverse m-0 text-justify p-">
                                            <thead>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Names</th>
                                                    <th>Emails</th>
                                                    <th>Contacts</th>
                                                    <th>Subject</th>
                                                    <th>Messages/Query</th>
                                                    <th>Feedback Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query=mysqli_query($con,"select * from feedbak");
                                                $rowcount=mysqli_num_rows($query);
                                                if($rowcount==0)
                                                {
                                                ?>
                                                <tr>
                                                    <td colspan="4" align="center"><h3 style="color:red">No record found</h3></td>
                                                    <tr>
                                                        <?php
                                                        } else {
                                                        $cnt=1;
                                                        while($row=mysqli_fetch_array($query))
                                                        {
                                                        ?>
                                                        <tr>
                                                            <td><b><?php echo htmlentities($cnt);?></b></td>
                                                            <td><?php echo htmlentities($row['name'])?></td>
                                                            <td><a href="mailto:<?php echo htmlentities($row['email']);?>?subject=News Portal&body=Thank%20you%20for%20letting%20us%20know%20know%20about%20this.%20Your%20feedback%20helps%20us%20get%20better.%20We%20are%20looking%20into%20this%20issue%20and%20hope%20to%20resolve%20it%20promptly%20and%20accurately.%0D%0AWe%20will%20%20always%20help%20you.:)"><?php echo htmlentities($row['email'])?></a></td>
                                                            <td><?php echo htmlentities($row['phno'])?></td>
                                                            <td><?php echo htmlentities($row['subject'])?></td>
                                                            <td><?php echo htmlentities($row['message'])?></td>
                                                            <td><?php echo htmlentities($row['feedbackdate'])?></td>
                                                        </tr>
                                                        <?php $cnt++;} }?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div> <!-- container -->
                                </div> <!-- content -->
                                <?php include('includes/footer.php');?>
                            </div>
                            <!-- End Right content here -->
                        </div>
                        <!-- END wrapper -->
                        <script>
                        var resizefunc = [];
                        </script>
                        <!-- jQuery  -->
                        <script src="assets/js/jquery.min.js"></script>
                        <script src="assets/js/bootstrap.min.js"></script>
                        <script src="assets/js/detect.js"></script>
                        <script src="assets/js/fastclick.js"></script>
                        <script src="assets/js/jquery.blockUI.js"></script>
                        <script src="assets/js/waves.js"></script>
                        <script src="assets/js/jquery.slimscroll.js"></script>
                        <script src="assets/js/jquery.scrollTo.min.js"></script>
                        <script src="../plugins/switchery/switchery.min.js"></script>
                        <!-- CounterUp  -->
                        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
                        <script src="../plugins/counterup/jquery.counterup.min.js"></script>
                        <!--Morris Chart-->
                        <script src="../plugins/morris/morris.min.js"></script>
                        <script src="../plugins/raphael/raphael-min.js"></script>
                        <!-- Load page level scripts-->
                        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
                        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
                        <script src="../plugins/jvectormap/gdp-data.js"></script>
                        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
                        <!-- Dashboard Init js -->
                        <script src="assets/pages/jquery.blog-dashboard.js"></script>
                        <!-- App js -->
                        <script src="assets/js/jquery.core.js"></script>
                        <script src="assets/js/jquery.app.js"></script>
                    </body>
                </html>
                <?php } ?>