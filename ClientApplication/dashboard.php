<?php
//check if user has login;
require_once 'inc/Connection.php';

session_start();
if((isset($_COOKIE['adminuser']) && isset($_COOKIE['password']))||(isset($_SESSION['adminuser'])&&isset($_SESSION['password'])))
{
$id="";
  $status="";
  if(isset($_COOKIE['userid']))
  {
    $id=$_COOKIE['userid'];
    
  }
  else{
    $id=$_SESSION['userid'];
  
    
  }
  $result=mysqli_query($con," SELECT * FROM client_personal_acc WHERE id=".$id);
  $userprofile=mysqli_fetch_assoc($result);
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>homepage</title>
		<link rel="stylesheet" href="links/iconfonts/mdi/css/materialdesignicons.min.css">
		<link rel="stylesheet" href="links/css/vendor.bundle.base.css">
		<link rel="stylesheet" href="links/css/vendor.bundle.addons.css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">
  
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/font-awesome.css">
		<link rel="shortcut icon" href="infinitiv.ico"> 
		<meta name="viewport" content="user-scalable=no, width=device-width" /> 
		<link href="css/camera.css" rel="stylesheet">
</head>

<body>
  <div class="container-scroller">
  
 <!-- start of the nav bar -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="dashboard.php">
         icheckApp
        </a>
        <a class="navbar-brand brand-logo-mini" href="dashboard.php">
          <img src="images/auth/login_16.jpg" style="width:75px;height:60px; alt="logo" />
        </a>
      </div>
  
      <div class="navbar-menu-wrapper d-flex align-items-center">
	  <ul class="navbar-nav navbar-nav-right">
		
      
		  
		  
		  
          <li class="nav-item dropdown">
		  
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">i</span>
            </a>
			
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have  new notifications
                </p>
               
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                   <div class="preview-thumbnail">
                  <img src="<?= $userprofile["profile_pic"] ?>" alt="image" class="profile-pic">
                </div>
                  </div>
                </div>
                <div class="preview-item-content">
				
                  <h6 class="preview-subject font-weight-medium text-dark"><?php echo $userprofile['notification'];?> </h6>
                  <p class="font-weight-light small-text">
                   <?php echo date("r");?>
                  </p>
				
                </div>
              </a>
              
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="fa fa-spin fa-gear"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Account Last Activity</h6>
                  <p class="font-weight-light small-text">
                    <?php echo $userprofile['entry_date'];?> 
                  </p>
                </div>
              </a>
            </div>
			
          </li>
		  
		  
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, <?php echo $userprofile['username'];?> !</span>
              <img src="<?= $userprofile["profile_pic"] ?>" class="img-xs rounded-circle"  alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a href="logout.php" class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
		 <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
	</div>
 </nav>
	  <!-- end of the nav bar -->

    <!-- start of left side nav bar  -->
    <div class="container-fluid page-body-wrapper">
	
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                   <img src="<?= $userprofile["profile_pic"] ?>" width="150px" height="100%" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"> <?php echo $userprofile['email_address'];?></p>
                  <div>
                    <small class="designation text-muted"><?php echo $userprofile['Phone_number'];?></small>
                    <span class="status-indicator online"></span><br><br>
					<span class="badge badge-success badge-pill float-left">Account <?php echo $userprofile['Account_status'];?> <i class="fa fa-tablet"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
		  
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="menu-icon mdi mdi-television"></i><b style="color:white">...</b>
              <span class="menu-title">Homepage</span>
            </a>
          </li>
		  
          <li class="nav-item">
		  
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
             <i class="fa fa-spin fa-gear"></i><b style="color:white">...</b>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
			
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="Complete_Registration.php"> <i class="fa fa-spin fa-spinner"></i><b style="color:white">...</b>Complete registration</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="user_profile.php"> <i class="fa fa-user-circle-o"></i><b style="color:white">...</b>Profile Details</a>
                </li>
				  
              </ul>
            </div>
          </li>
		  
		    
	   <li class="nav-item">
            <a class="nav-link" href="report_Incident.php">
                <i class="fa fa-envelope"></i>
              <span class="menu-title"><b style="color:white">...</b>Report</span>
            </a>
          </li>
		  
		    <li class="nav-item">
            <a class="nav-link" href="myreport_case.php">
                <i class="fa fa-archive"></i>
              <span class="menu-title"><b style="color:white">...</b>Check History Reportings</span>
            </a>
          </li>
     
	   
	     <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <i class="fa fa-sign-out"></i>
              <span class="menu-title"><b style="color:white">...</b>Sign-out</span>
            </a>
          </li>
      
        </ul>
      </nav>
	   

		<?php include('dbcon.php'); ?>
	   
      <div class="main-panel">
        <div class="content-wrapper">
		 <div class="row">
		
		 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
					  <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
					<?php 

									$Report_Count = mysql_query("SELECT COUNT(*) AS Reg_Boda_Acc FROM `operators_personal_acc` ")or die(mysql_error());
									$row_All = mysql_fetch_array($Report_Count);
									$total_operators=$row_All['Reg_Boda_Acc'];
									?>
                    <div class="float-right">
                      <p class="mb-0 text-right">Registered Boda Operators</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $total_operators;?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> % increase growth
                  </p>
				  <div class="progress">
								<div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $total_operators."%";?>" 
                        aria-valuemin="0" aria-valuemax="100"></div>
							</div>
                </div>
              </div>
            </div>
		
		
		
		 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-success icon-lg"></i>
                    </div>
									<?php 

									$Report_Count_clients = mysql_query("SELECT COUNT(*) AS Phone_number FROM `client_personal_acc` ")or die(mysql_error());
									$row_All = mysql_fetch_array($Report_Count_clients);
									$total_users=$row_All['Phone_number'];
									?>
                    <div class="float-right">
                      <p class="mb-0 text-right">Registered Boda Users</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $total_users;?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> % increase growth
                  </p>
				   <div class="progress">
								<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $total_users."%";?>" 
                        aria-valuemin="0" aria-valuemax="100"></div>
							</div>
                </div>
              </div>
            </div>
		
		 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-file text-danger icon-lg"></i>
                    </div>
					
					<?php 

									$Report_Count_clients = mysql_query("SELECT COUNT(*) AS AOBNumber FROM `crimereporting` ")or die(mysql_error());
									$row_All = mysql_fetch_array($Report_Count_clients);
									$total_reports=$row_All['AOBNumber'];
									?>
					
					
					
                    <div class="float-right">
                      <p class="mb-0 text-right">Reported Incidences</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $total_reports;?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> % increase growth
                  </p>
				  <div class="progress">
								<div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?php echo $total_reports."%";?>"
                        aria-valuemin="0" aria-valuemax="100"></div>
							</div>
				   
                </div>
              </div>
            </div>
		
		
		
		 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-primary icon-lg"></i>
                    </div>
					
						<?php 

									$Report_Count_clients = mysql_query("SELECT COUNT(*) AS Client_mobilenumber FROM `save_ride` ")or die(mysql_error());
									$row_All = mysql_fetch_array($Report_Count_clients);
									$total_savedrides=$row_All['Client_mobilenumber'];
									?>
					
					
                    <div class="float-right">
                      <p class="mb-0 text-right">IcheckApp Usage Rate</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $total_savedrides;?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> % increase growth
                  </p>
				   <div class="progress">
								<div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?php echo $total_savedridess."%";?>"
                        aria-valuemin="0" aria-valuemax="100"></div>
							</div>
				  
                </div>
              </div>
            </div>
		
		  </div>
		  
		  
						<div class="row">
						<div class="col-lg-8 grid-margin stretch-card">
						<!--weather card-->
						<div class="container" align="center">
						<div class="row row-offcanvas row-offcanvas-center">
						<div class="col-xs-12 col-sm-11">


						<!-- Slider -->
						<section id="b-slider">
						<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
						<div  data-src="images/BODPIC.jpg">
						<div class="camera_caption fadeFromBottom">
						 We offer best quality to our Clients<em>Its a right to be safe</em>
						</div>
						</div>
						<div  data-src="images/images (14).jpeg">
						<div class="c amera_caption fadeFromBottom">
						Always stay safe <em>Know your boda opearators</em>
						</div>
						</div>
						<div data-src="images/images (13).jpeg">
						<div class="camera_caption fadeFromBottom">
						Safety first <em>You have a right to report any claims</em>
						</div>
						</div>
						<div data-src="images/images (15).jpeg">
						<div class="camera_caption fadeFromBottom">
						 Enquiries<em>give us a feedback</em>
						</div>
						</div>
						<div data-src="images/12.jpg">
						<div class="camera_caption fadeFromBottom">
						safety<em>its always good to have a safe community</em>
						</div>
						</div>
						</div><!-- #camera_wrap_1 -->
						</section>

						</div>

						</div><!--/row-->
						<!-- Modal -->
						</div>

						</div>
						
				
                          <div class="profile-image">
							<img src="images/auth/login_1.jpg" width="180px" height="250px" alt="profile image">
						</div>
                    
						 <div class="profile-image">
							<img src="images/auth/icheck5.jpg" width="180px" height="250px" alt="profile image">
						</div>
						</div>

        </div>
		  <!-- footer -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">copyright © 2018 IcheckApp
              <a href="icheck.com" target="_blank">IcheckApp</a>. All rights reserved.</span>
			  </div>
        </footer>
		</div>
     <!--end of footer -->
  </div>
	
	 <!-- end of left side nav bar  -->
  </div>
   <!-- end of body content  -->
   
     <!-- Placed at the end of the document so the pages load faster -->
    <script src="jQuery/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="bootstrap-3.3.6/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.6/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
   
  <script src="links/js/vendor.bundle.base.js"></script>
  <script src="links/js/vendor.bundle.addons.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  
    <script src="jss/jquery.js"></script>
    
    <script src="jss/bootstrap-transition.js"></script>
    <script src="jss/bootstrap-modal.js"></script>
    <script src="jss/bootstrap-dropdown.js"></script>
    <script src="jss/bootstrap-collapse.js"></script>
	  <script src='jss/jquery.mobile.customized.min.js'></script>
    <script src='jss/jquery.easing.1.3.js'></script> 
    <script src='jss/camera.min.js'></script>
	
    <script>
    jQuery(function(){
      
      jQuery('#camera_wrap_1').camera({
        thumbnails: true
      });

     
    });
  </script>
	
	
  
  
</body>
</html>
<?php
}
else{
     header("Location:index.php");       
	
}
?>