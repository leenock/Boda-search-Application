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
		
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>reportfiles</title>
		<link rel="stylesheet" href="links/iconfonts/mdi/css/materialdesignicons.min.css">
		<link rel="stylesheet" href="links/css/vendor.bundle.base.css">
		<link rel="stylesheet" href="links/css/vendor.bundle.addons.css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		  <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/font-awesome.css">
		<link rel="shortcut icon" href="infinitiv.ico"> 
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
	
		
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
                <p><?php echo $userprofile['First_name'] . " " . $userprofile['Last_name']; ?> Report case History Review As at <?php
    $Today = date('y:m:d');
    $new = date('l, F d, Y', strtotime($Today));
    echo $new;
    ?></p>
			<a class="btn btn-light ml-auto "  onclick="myFunction()">Refresh</a>
			
    </span>
            </div>
	      </div>
		  
		
		<hr>
		
		<div class="row">
		    <div class="span9">
                        <div class="content" style="width:130%">
                            
		 <table cellpadding="0" cellspacing="0" border="2" class="datatable-1 table table-bordered table-responsive table-hover display" width="100%">

		
		   <thead width="50px" >
								    <br>
                                    <tr class="success">
									     <th>#caseNo.</th>
										<th>Date</th>
                                        <th>Time of crime</th>
										 <th>Victims</th>  
                                        <th>Operators Involved</th>
										<th>Crime Description</th>
										
										<th>Actions</th>
                                 
                                    </tr>
                                </thead>
		
									 <tbody> 
								<?php include('dbcon.php'); ?>
								<?php 
								$user_count_query = mysql_query("select COUNT(AOBNumber) AS Num from crimereporting where ReportedBy = '$id' ")or die(mysql_error());
		                        $Count = mysql_fetch_array($user_count_query);
								$user_query = mysql_query("select * from crimereporting where ReportedBy = '$id' ")or die(mysql_error());
								
								
		
									while($row=mysql_fetch_array($user_query)){
									  $id = $row['AOBNumber'];
                            $member_id = $row['ReportedBy'];
                            $CrimeNature = $row['CrimeNature'];
                            /* member query  */
                            $member_query = mysql_query("select * from client_personal_acc where id = '$member_id'")or die(mysql_error());
                            $member_row = mysql_fetch_array($member_query);
                            /* service query  */
                            $crime_query = mysql_query("select * from crimecategories where id = '$CrimeNature' ")or die(mysql_error());
                            $crime_row = mysql_fetch_array($crime_query);
                            ?>	
								
								
							
								  <tr class="del<?php echo $id ?> success">
								  
								  <td style="width : 100"><?php echo $row['AOBNumber']; ?></td>
                                <td><?php echo $row['Date']; ?></td> 
                               
								<td><?php echo $row['DateofCrime'].' '.$row['CrimeTime']; ?></td>
                                <td><?php echo $row['Victims']; ?></td> 
                                <td><?php echo $row['ParpetratorName']; ?></td> 
                                <td width="200"><?php echo $row['CrimeDescription']; ?></td>
								<td><?php echo $row['CaseStatus']; ?></td>
								   </tr>
								  <?php 
								  }
								  ?>
		                             </tbody>
									</table> 	
									 <div class="pull-right">
		<a href="printcase_files.php" class="btn btn-light ml-auto" value="Print report" >PrintReports</a>
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
  
 

  
  
<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="scripts/common.js" type="text/javascript"></script>


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