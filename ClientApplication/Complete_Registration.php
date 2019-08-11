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

<?php

if(isset($_POST['Submit'])){
require_once 'inc/Connection.php';

function fileupload($PhotoField, $Email, $Field){
		if(isset($_FILES[$PhotoField]["name"])){
		$fileSize=$_FILES[$PhotoField]["size"];
		$fileName=$_FILES[$PhotoField]["name"];
		global $filepath1;
		$filepath1=$_FILES[$PhotoField]["tmp_name"];
		$fileInfo=pathinfo($_FILES[$PhotoField]["name"]);
		$fileExtension=$fileInfo['extension'];
		$newName=$Email."-".date("y-m-d H-i-s").".". $fileExtension;
		
		
		if($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg" && $fileExtension != "gif" && $fileExtension != "JPG" && $fileExtension != "PNG" && $fileExtension != "JPEG" && $fileExtension != "GIF" ) {
	
			  return "image only";
    
              }
		else if($fileSize>50000000){
	
			return "too large";
	
			}
		else{
		return $newName;
		}
		}

		else{
			return "Empty";
		}
		
	}
	
 if(!(isset($_FILES["profile_pic"]["name"]))){
	echo "<script>
              alert('Please fill in profile pic');
              window.location='Complete_Registration.php';		  
        </script>";
		
}
else{
	$newName1=fileupload("profile_pic", $_POST['Email'], "profile pic");

		
	if(!($newName1=="Empty"||$newName1=="too large"||$newName1=="image only")){
	mkdir("Uploads/".$_POST['Email']);
    
	$profile_pic="Uploads/".$_POST['Email']."/profile_pic".$newName1;
    move_uploaded_file($filepath1, $profile_pic);

    function clean($str){
		
	$str = @trim($str);
    if(get_magic_quotes_gpc()){
	$str = stripslashes($str);	
		
	}	
	return mysql_real_escape_string($str);
	}	

	 //Sanitize the post values
	
	 $fullname = clean($_POST['firstname']);
	 $lastname = clean($_POST['lastname']);
	 $surname =  clean($_POST['surname']);
	
	 $phonenumber	=  clean($_POST['telenumber']);
	 $nationalId		=  clean($_POST['IDnumber']); 
	 $gender			=  clean($_POST['gender']);
	
	$county			=  clean($_POST['county']);
	$hometown		=  clean($_POST['Hometwon']);
	$dob			=  clean($_POST['dob']);
	
	$emailaddress    =  clean($_POST['Email']);
	$username        =  clean($_POST['username']);
	$password		 =  clean($_POST['password']);
	
	$notification    =  'Succefully Updated Your Account';
	
	$sql="UPDATE client_personal_acc set First_name='$fullname' , Last_name='$lastname' , surname='$surname' , Phone_number='$phonenumber' , National_id='$nationalId' , Gender='$gender' ,
	County='$county' , Hometown='$hometown' , date_of_birth='$dob' , email_address='$emailaddress' , username='$username' , profile_pic='$profile_pic' , password='$password' ,  notification='$notification' where id='$id' ";
	
	if(mysqli_query($con, $sql)){ //Check if query is successful

    
	echo"<script>
              alert('Your Account has been updated succefully');
              window.location='user_profile.php';
			  
        </script>";

    }
	
	else{
	

	echo"<script>
              alert('Error Updating your Account');
              window.location='Complete_Registration.php';
			  
        </script>";
    }
	


}
else{
	
	echo "<script>
              alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed . The images should not be larger than 800kb');
              window.location='Complete_Registration.php';
			  
        </script>";
	
   }

}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>update_profile</title>
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
                  <img src="<?= $userprofile["profile_pic"] ?>" width="100px" height="50px" alt="profile image">
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
		
								<script>
									function myFunction() {
									    location.reload();
									}
									</script>
		
		<div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p>Fill in the necessary information required to complete Your Registration For better services with Boda IcheckApp  </p>
			<a class="btn btn-warning ml-auto  d-md-block"  onclick="myFunction()">Refresh</a>

              </span>
            </div>
	      </div>
		  
		 <div class="row">
		
		<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                 
                <form class="form-horizontal row-fluid" Method="POST"  enctype="multipart/form-data" > 
                    <p class="card-description">
                      <b>Personal information</b>
                    </p>
                    <div class="row">
					
					  <div class="col-md-4">
                        
						<div class="form-group">
                          <div class="profile-image">
							<img src="<?php echo $userprofile['profile_pic']; ?>"  width="170px" height="150px" alt="profile image">
						</div>
                        </div>
                      </div>
					  
					  </div>
						
					  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"  name="firstname" value="<?php echo $userprofile['First_name'];?>" placeholder="firstName" required/>
                          </div>
                        </div>
                      </div>
					  
					  <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="lastname" value="<?php echo $userprofile['Last_name'];?>" placeholder="Last Name" required/>
                          </div>
                        </div>
                      </div>
					  
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Surname</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="surname" value="<?php echo $userprofile['surname'];?>" placeholder="Surname" required/>
                          </div>
                        </div>
                      </div>
                    </div>
					
				<p><p>
				    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Phone Number</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?php echo $userprofile['Phone_number'];?>" name="telenumber" placeholder="phoneNumber" required/>
                          </div>
                        </div>
                      </div>
					  
					  <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">National ID</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="IDnumber" value="<?php echo $userprofile['National_id'];?>" placeholder="national Id" required/>
                          </div>
                        </div>
                      </div>
					  
                      <div class="col-md-3">
                        <div class="form-group row">
                          
                          <select name="gender" class="form-control span3 tip" required>
						   <option><?php echo $userprofile['Gender']; ?></option>
                                                 
												  <?php
												 include("inc/Connection2.php");
												 $query =mysql_query("select DISTINCT Sex from gender ORDER BY Sex ASC");
												 echo "<option>select gender</option>";
												 while($rs=mysql_fetch_array($query)){
													 echo "<option>".$rs['Sex']. "</option>";
												 }
												 ?>
												 
                                                 </select>
                        </div>
                      </div>
					  </div>
					
					<p><p>
					
                     <div class="row">
                      <div class="col-md-3">
                        <div class="form-group row">
                        
                          <select name="county" class="form-control span3 tip" id="item"  onchange="getState(this.value)">
                                                 <option><?php echo $userprofile['County']; ?></option>
												 <?php
												 include("inc/Connection2.php");
												 $query =mysql_query("select DISTINCT County,County_Num from counties ORDER BY County ASC");
												 echo "<option>select county</option>";
												 while($rs=mysql_fetch_array($query)){
													 echo "<option>".$rs['County']. '---' . $rs['County_Num'] . "</option>";
												 }
												 ?>
                                                 </select>
                        </div>
                      </div>
					  
					  <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Home Address</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="Hometwon" value="<?php echo $userprofile['Hometown'];?>" placeholder="Home Address" required/>
                          </div>
                        </div>
                      </div>
					  
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">DOB</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="dob" value="<?php echo $userprofile['date_of_birth'];?>" placeholder="00/00/0000" required/>
                          </div>
                        </div>
                      </div>
                    </div>
					
					<p><p>
					  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Email Address</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="Email" value="<?php echo $userprofile['email_address'];?>" placeholder="Email Address" required/>
                          </div>
                        </div>
                      </div>
					  
					  <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">User Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $userprofile['username'];?>" name="username" placeholder="User Name" required/>
                          </div>
                        </div>
                      </div>
					  
					   <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Current Password</label>
                          <div class="col-sm-5">
                            <input type="text" class="form-control" value="<?php echo $userprofile['password'];?>" name="password" placeholder="Current Password" required/>
                          </div>
                        </div>
                      </div>
					  
                     <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Profile</label>
                          <div class="col-sm-9">
                           <input type="file"  name="profile_pic" id="fileToUpload">
                          </div>
                        </div>
						
					  
                    </div>
                  
                   <p><p>
				   
				   <div class="pull-left">
                                     <input type="Submit" name="Submit"  value="Update Details"  class="btn btn-success">
                                    </div>
									
                  </form>
                </div>
              </div>
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