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
		<title>user_profile</title>
		<link rel="stylesheet" href="links/iconfonts/mdi/css/materialdesignicons.min.css">
		<link rel="stylesheet" href="links/css/vendor.bundle.base.css">
		<link rel="stylesheet" href="links/css/vendor.bundle.addons.css">
		<link href="bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">
		
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/font-awesome.css">
		<link rel="shortcut icon" href="infinitiv.ico"> 
		<meta name="viewport" content="user-scalable=no, width=device-width" /> 
		
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
				
                  <h6 class="preview-subject font-weight-medium text-dark"> <?php echo $userprofile['notification'];?> </h6>
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
	  <form  action="#" autocomplete="on" Method="POST" >
	  
	    <div class="content-wrapper">
		
								<script>
									function myFunction() {
									    location.reload();
									}
								</script>
		
		<div class="container-fluid">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p> Profile Information </p>
			<a class="btn btn-light ml-auto "  onclick="myFunction()">Refresh</a>
    </span>
            </div>
	      </div>
		
		<hr>
		<div class="row">
		
		 <div class="col-md-6 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-9">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Profile</h4>
                     
                    
                        <div class="form-group">
                          <div class="profile-image">
							<img src="<?= $userprofile["profile_pic"] ?>" width="150px" height="150px" alt="profile image">
						</div>
                        </div>
                   
                    </div>
                  </div>
                </div>
				
                <div class="col-12 stretch-card">
                  <div class="card">
                    <div class="card-body">
                       <div class="form-group row">
						<div class="col-sm-4">
                            <input type="email" class="form-control" id="FirstName" value="<?php echo $userprofile['First_name'];?>" placeholder="FirstName" disabled>
                          </div>
						   <div class="col-sm-4">
                            <input type="text" class="form-control" id="LastName" value="<?php echo $userprofile['Last_name'];?>" placeholder="LastName" disabled>
                          </div>
						   <div class="col-sm-4">
                            <input type="email" class="form-control" id="Surname" value="<?php echo $userprofile['surname'];?>" placeholder="Surname" disabled>
                          </div>
						 
                        </div>
                        <div class="form-group row">  
						<div class="col-sm-6">
                            <input type="text" class="form-control" id="Phone Number" value="<?php echo $userprofile['Phone_number'];?>" placeholder="Phone Number" disabled>
                          </div>
						   <div class="col-sm-6">
                            <input type="text" class="form-control" id="Username" value="<?php echo $userprofile['username'];?>" placeholder="Username" disabled>
                          </div>
                        </div>
                         
						<div class="form-group row">   
						<div style="background-color:white" class="col-sm-8">
                            <input type="text" class="form-control" value="<?php echo $userprofile['email_address'];?>" id="email" placeholder="Email Address" disabled> 
                          </div>
                        </div>
						   
					  
                    </div>
                  </div>
                </div>
              </div>
            </div>
		
		 <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <p class="card-description">
                    <b>Other information</b>
                  </p>
                 
                    <div class="form-group">
                      <label for="exampleInputName1">National ID</label>
                      <input type="text" class="form-control" id="nationalid" value="<?php echo $userprofile['National_id'];?>"  placeholder="Name" disabled>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputPassword4">County</label>
                      <input type="text" class="form-control" id="County" value="<?php echo $userprofile['County'];?>" placeholder="County" disabled>
                    </div>
                  
				   <div class="form-group">
                      <label for="exampleInputPassword4">Home Address</label>
                      <input type="text" class="form-control" id="HomeAddress" value="<?php echo $userprofile['Hometown'];?>" placeholder="Home Address" disabled>
                    </div>
				  
				    <div class="form-group">
                      <label for="exampleInputPassword4">DOB</label>
                      <input type="text" class="form-control" id="dob" value="<?php echo $userprofile['date_of_birth'];?>" placeholder="date of birth" disabled>
                    </div>
				  
				   <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="text" class="form-control" id="Password" value="<?php echo $userprofile['password'];?>" placeholder="Password" disabled>
                    </div>
				  
				  <div class="form-group">
                      <label for="exampleInputPassword4">Account Status</label>
                      <input type="text" class="form-control" id="Acc_status" value="<?php echo $userprofile['Account_status'];?>" placeholder="Account Status" disabled>
                    </div>
				  
					 
		        </div>
              </div>
            </div>	
		</div>
	</div>
			</form>
		
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
   
   
  <script src="links/js/vendor.bundle.base.js"></script>
  <script src="links/js/vendor.bundle.addons.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  

 
</body>
</html>
<?php
}
else{
     header("Location:index.php");       
	
}
?>