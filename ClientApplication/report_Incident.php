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
		<title>report_incidence</title>
		<link rel="stylesheet" href="links/iconfonts/mdi/css/materialdesignicons.min.css">
		<link rel="stylesheet" href="links/css/vendor.bundle.base.css">
		<link rel="stylesheet" href="links/css/vendor.bundle.addons.css">
		<link href="bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">
		
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/font-awesome.css">
		<link rel="shortcut icon" href="infinitiv.ico"> 
		<meta name="viewport" content="user-scalable=no, width=device-width" /> 
		
		
		
		<script type="text/javascript" src="js/datepicker.js"></script>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript">
		//<![CDATA[

		/*
				A "Reservation Date" example using two datePickers
				--------------------------------------------------

				* Functionality

				1. When the page loads:
						- We clear the value of the two inputs (to clear any values cached by the browser)
						- We set an "onchange" event handler on the startDate input to call the setReservationDates function
				2. When a start date is selected
						- We set the low range of the endDate datePicker to be the start date the user has just selected
						- If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

				* Caveats (aren't there always)

				- This demo has been written for dates that have NOT been split across three inputs

		*/

		function makeTwoChars(inp) {
				return String(inp).length < 2 ? "0" + inp : inp;
		}

		function initialiseInputs() {
				// Clear any old values from the inputs (that might be cached by the browser after a page reload)
				document.getElementById("sd").value = "";
				document.getElementById("ed").value = "";

				// Add the onchange event handler to the start date input
				datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		var initAttempts = 0;

		function setReservationDates(e) {
				// Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
				// until they become available (a maximum of ten times in case something has gone horribly wrong)

				try {
						var sd = datePickerController.getDatePicker("sd");
						var ed = datePickerController.getDatePicker("ed");
				} catch (err) {
						if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
						return;
				}

				// Check the value of the input is a date of the correct format
				var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

				// If the input's value cannot be parsed as a valid date then return
				if(dt == 0) return;

				// At this stage we have a valid YYYYMMDD date

				// Grab the value set within the endDate input and parse it using the dateFormat method
				// N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
				var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

				// Set the low range of the second datePicker to be the date parsed from the first
				ed.setRangeLow( dt );
				
				// If theres a value already present within the end date input and it's smaller than the start date
				// then clear the end date value
				if(edv < dt) {
						document.getElementById("ed").value = "";
				}
		}

		function removeInputEvents() {
				// Remove the onchange event handler set within the function initialiseInputs
				datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		datePickerController.addEvent(window, 'load', initialiseInputs);
		datePickerController.addEvent(window, 'unload', removeInputEvents);

		//]]>
		</script>
		
		
		
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
		
		  <script>
									function myFunction() {
									    location.reload();
									}
									</script>
		  
		  <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p>Fill in the necessary information required to complete your Reportcase </p>
			<a class="btn btn-warning ml-auto  d-md-block"  onclick="myFunction()">Refresh</a>

              </span>
            </div>
	      </div>
		  
		  <div class="row">
		  <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
				
				    <!-- Reporting -->
                <?php
                if (isset($_POST['Submit'])) {
                    $date = $_POST['date'];
					$Time = $_POST['time'];
                    $crimecategory = $_POST['crimecategory'];
                    
					
					$query = mysql_query("SELECT * FROM `crimemonitor`") or die(mysql_error());
				    $CounterRow=mysql_fetch_array($query);
					$OldObNumber=$CounterRow['AobNumber'];
                    
                        $AobNumber = $OldObNumber + 1;
						$query = mysql_query("UPDATE `crimemonitor` SET `AobNumber`='$AobNumber' WHERE 1;") or die(mysql_error());
						$OBNumber ="OB4569/".Date('Y')."/".Date('m')."/".Date('d')."/".$AobNumber;
                        
						
					$date1 = $_POST['date'];
					$time =$_POST['time'];
                    $crimecategory = $_POST['crimecategory'];
					$CrimeStatus= $_POST['CrimeStatus'];
					$Location =$_POST['Location'];
					$Perpetrator= $_POST['plate_number'];
					$Victims = $_POST['Victim'];
					$PerpetratorDesc =$_POST['PerpetratorDesc'];
					$Weapons =$_POST['Weapons'];
					$Statement_description = $_POST['Statement_desc'];
					$victin_id = $_POST['IDnumber'];
					$victim_report_name = $_POST['fullnames'];
					
					
					
                    
                    mysql_query("INSERT INTO `crimereporting`(`AOBNumber`, `CrimeNature`, `DateofCrime`, `ReportedBy`, `ParpetratorName`,  `CrimeStatus`, `Victims`, `CrimeDescription`,  `National_id`, `Fullnames_clientvictim`, `CrimeLocation`, `CrimeTime`, `WeaponsInvolved`, `ParpetratorDescription`, `CaseStatus`) VALUES ('$OBNumber','$crimecategory','$date1','$id', '$Perpetrator', '$CrimeStatus', '$Victims', '$Statement_description', '$victin_id', '$victim_report_name','$Location','$time','$Weapons','$PerpetratorDesc','Ongoing')") or die(mysql_error());
                    ?>
					
					
                    <div class="yes"><h4>Your report case has been received your OB number is  <?php echo $OBNumber; ?>. THANK YOU</h4></div>
					
                <?php }			
						?>
                   
                
                <!-- end Reporting -->
				
		  <form class="form-horizontal row-fluid" Method="POST" > 
		  
		  <div class="row">
		   <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Crimedate</label>
                          <div class="col-sm-8">
                             <input type="text"  class="w8em format-d-m-y highlight-days-67 range-high-today span4 tip" name="date" id="sd"  maxlength="10"  required/>
                                     <a id="fd-but-sd" title="" class="date-picker-control" href=""><span> <i class="fa fa-calendar"></i></span></a>	
                          </div>
                        </div>
                      </div>
					  
					  <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">CrimeTime</label>
                          <div class="col-sm-7">
                            
							  <select name="time" class="form-control span3 tip" required>
                                <option><?php
                                    if (isset($_POST['Submit'])) {
                                        echo $time;
                                    }
                                    ?></option>
                                <option>12:00AM</option>
                                <option>01:00AM</option>
                                <option>02:00AM</option>
                                <option>03:00AM</option>
                                <option>04:00AM</option>
                                <option>05:00AM</option>
                                <option>06:00AM</option>
                                <option>07:00AM</option>
                                <option>08:00AM</option>
                                <option>09:00AM</option>
                                <option>10:00AM</option>
                                <option>11:00AM</option>
                                <option>12:00AM</option>
                                <option>01:00PM</option>
                                <option>02:00PM</option>
                                <option>03:00PM</option>
                                <option>04:00PM</option>
                                <option>05:00PM</option>
                                <option>06:00PM</option>
                                <option>07:00PM</option>
                                <option>08:00PM</option>
                                <option>09:00PM</option>
                                <option>10:00PM</option>
                                <option>11:00PM</option>
                            </select>
							
							
                          </div>
                        </div>
                      </div>
					  
                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Crime category</label>
                          <div class="col-sm-8">
                           <select name="crimecategory" class="form-control span3 tip"  required>
                                <option></option>
                                <?php
                                $query = mysql_query("select * from crimecategories") or die(mysql_error());
                                while ($row = mysql_fetch_array($query)) {
                                    ?>

                                    <option value="<?php echo $row['Id']; ?>"><?php echo $row['Name'] ?></option>
                                <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
			
	    </div>
		
		 
		
		   <div class="row">
		 <div class="col-md-4">
		    <div class="form-group row">
                         <label class="col-sm-3 col-form-label">Crime Status</label>
                         <div class="col-sm-7">
                            <select name="CrimeStatus" class="form-control span3 tip"   required>
                                <option><?php
                                    if (isset($_POST['Submit'])) {
                                        echo $CrimeStatus;
                                    }
                                    ?></option>
                                <option>Occurred</option>
                                <option>Ongoing</option>
                           
                            </select>
                        </div>
                    </div>
		       </div>
		
		 <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Crime Location</label>
                          <div class="col-sm-7">
                             <input type="text" class="form-control" name="Location"  required/>
                          </div>
                        </div>
                      </div>
					  
				<div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Boda Plate Involved</label>
                          <div class="col-sm-8">
                             <input type="text" class="form-control" name="plate_number"  required/>
                          </div>
                        </div>
                      </div>	  
					 	  
		     </div>
		
		 <div class="row">
		
		<div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Involved Victim</label>
                          <div class="col-sm-7">
                             <input type="text" class="form-control" name="Victim"  required/>
                          </div>
                        </div>
                      </div>
		
		<div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Perpetrator(s) Description
</label>
                          <div class="col-sm-7">
                            <textarea rows=4 name="PerpetratorDesc" id="perpetrator_decs" value="" required></textarea>
                          </div>
                        </div>
                      </div>
		
		<div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Weapon Involved</label>
                          <div class="col-sm-8">
                                <input type="text" class="form-control"  name="Weapons" value="<?php
                            if (isset($_POST['Submit'])) {
                                echo $Weapons;
                            }
                            ?>"  required>
                          </div>
                        </div>
                      </div>
		
		
		</div>
		
		<div class="row">	
		<div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Statement</label>
                          <div class="col-sm-9">
                            <textarea rows=3 name="Statement_desc" id="Statement" value="" required></textarea>
                          </div>
                        </div>
                      </div>	
					  
					    <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">National ID</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="IDnumber" value="<?php echo $userprofile['National_id'];?>" placeholder="national Id" readonly>
                          </div>
                        </div>
                      </div>
					  
					   <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Full Names</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control"  name="fullnames" value="<?php echo $userprofile['First_name']." ".$userprofile['Last_name']." ".$userprofile['surname'];?>" placeholder="firstName" readonly>
                          </div>
                        </div>
                      </div>
					  
					  
					  
					  
					  
		</div>
		 <div class="pull-right">
                                     <input type="Submit" name="Submit"  value="report Case"  class="btn btn-warning">
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