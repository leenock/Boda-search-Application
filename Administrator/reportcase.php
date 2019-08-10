<?php 
//check if user has login;
session_start();
require_once 'inc/Connection.php';

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
 
  $result=mysqli_query($con," SELECT * FROM acc_admin WHERE id=".$id);
  $userprofile=mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>bodaOperatorsAccounts...</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
        <link rel="shortcut icon" href="infinitiv.ico">  
		
		
		<!--sa calendar-->	
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
       
	    <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="dashboard.php">Icheck <img src="images/icheck5.jpg" style="width:60px;height:30px;" alt="icheck"  class="img-circle"></a>
						
                    <div class="nav-collapse collapse navbar-inverse-collapse">

                        <ul class="nav nav-icons">
                            
                            <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                        </ul>
						
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
						
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Accounts
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="bodaOperatorsAccounts.php">Boda Operators' Accounts</a></li>
									 <li class="divider"></li>
                                    <li><a href="#">Boda Clients' Accounts</a></li>

                                </ul>
                            </li>
                            <li><a href="#">Support Team </a></li>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
								<li><a href="#"><h5 style=color:#04C5E6><b>Welcome  <?php echo $userprofile['Name'];?></b></h5></a></li>
                                    <li><a href="#">Profiles</a></li>                                   
                                    <li><a href="#">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                   
                </div>
            </div>
            
        </div>
		
		
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="bodaOperatorsAccounts.php"><i class="menu-icon icon-user"></i>Boda Operators' Accounts</a>  </li>                             
                                                              
                                <li><a href="newbodaOperatorAcc.php"><i class="menu-icon icon-plus"></i>Create New operator Account  </a></li>
                                <li><a href="#"><i class="menu-icon icon-download"></i>Generate Report</a></li>
                                <li><a href="#"><i class="menu-icon icon-file"></i>Reported Case Files</a></li>
								

                            </ul>
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Manage Clients Accounts</a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="#"><i class="icon-user"></i>Clients' Booking Details </a></li>
                                        <li><a href="#"><i class="icon-trash"></i>Deleted Acoounts</a></li>
										<li><a href="#"><i class="icon-trash"></i>Temporary Deleted Acoounts</a></li>
                                       

                                    </ul>
                                </li>


                                <li><a href="#"><i class="menu-icon icon-user"></i>Boda Clients Accounts  </a></li> 
                                <li><a href="#"><i class="menu-icon icon-star"></i>Boda Operators Ratings</a></li>
                                <li><a href="#"><i class="menu-icon icon-inbox"></i>SMS Query Search details  </a></li>


                            </ul>

                       
                             
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-off"></i>Sign-Out </a></li>  
                            </ul>
                            

                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                           
                            
                            <div class="module-head">
                                    <h3>
                                        Report case file
                                </div>

                         <div class="module-option clearfix">
                                    <div class="pull-left">
                                        <div class="btn-group">
                                            <button class="btn">
                                                Settings</button>
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="createLibrarianAcc.php">Add</a></li>
                                                <li><a href="#">Edit</a></li>
                                                <li><a href="#">Delete</a></li>
                                                <li><a href="#">View-Users</a></li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <script>
									function myFunction() {
									    location.reload();
									}
									</script>
									                                    
							    <div class="pull-right">
                                        <button onclick="myFunction()" class="btn btn-light">Refresh Page</>
                                    </div>
                                </div>
                                        
                                   <form class="form-horizontal row-fluid" method="Post"     enctype="multipart/form-data">
                                    <div class="module-body">

                                        <div class="control-group">
                                        <label class="control-label">Full Name</label>
                                        <div class="controls">
                                                <input type="text" placeholder="First Name" name="firstname" class="span4 tip" onkeypress="return validateTextkeyStrokes(event)"   title="Only Alphabets" required>
                                                <input type="text" placeholder="last Name " name="lastname" class="span4 tip" required>
                                                <input type="text" placeholder="surName " name="surname" class="span4 tip" required>
                                        </div>
                                        </div>


                                        <div class="control-group">
                                        <label class="control-label" >Telephone Number</label>
                                        <div class="controls">
                                                <input type="text" placeholder="Phone Number" maxlength="10" name="telenumber" class="span4 tip" onkeypress="return validateKeyStrokes(event)" title="Only Numbers" required>
                                                
                                                <input type="text"  placeholder="National ID" maxlength="8" name="IDnumber" class="span4 tip" onkeypress="return validateKeyStrokes(event)" title="Only Numbers" required>
												
												<input type="text"  placeholder="Email Address" name="Email" class="span4 tip" required>


                                        </div>
                                        </div>


                                      <div class="control-group">
                                            <label class="control-label">Gender</label>
                                    <div class="controls">
                                                 <select name="gender" class="form-control span4 tip" required>
                                                 
												  <?php
												 include("inc/Connection2.php");
												 $query =mysql_query("select DISTINCT Sex from gender ORDER BY Sex ASC");
												 echo "<option>select gender</option>";
												 while($rs=mysql_fetch_array($query)){
													 echo "<option>".$rs['Sex']. "</option>";
												 }
												 ?>
												 
                                                 </select>
                                          
                                    <input type="text"  class="w8em format-d-m-y highlight-days-67 range-high-today span4 tip" name="dob" id="sd" placeholder="date of birth" maxlength="10"  required/>
                                     <a id="fd-but-sd" title="" class="date-picker-control" href=""><span>slc</span></a>
									<input type="text" placeholder="Place of Birth" name="birthplace" class="span4 tip" required>
                                     </div>
                                     </div>
                                   
                                       <br/>
                                    <div class="control-group">
                                    <label class="control-label">Home Address</label>
									
                                    <div class="controls">
                                                <input type="text" placeholder="Home Address" name="homeAddress" class="span4 tip" required>
                                                <input type="text" placeholder="Home Town" name="Hometwon" class="span4 tip" required>
												
											    <select name="county" class="form-control span4 tip" id="item"  onchange="getState(this.value)">
                                                 
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
                                   
									  <br>
									 <div class="jumbotron"> 
									 
									 <input type="text"  placeholder="Passport" name="#" class="span3 tip" disabled >
									 <input type="file" name="passportpic" id="fileToUpload" >
									  
									 </div>
									  
									
									
<hr>

                                 

                                     <div class="pull-right">
                                        <input type="Submit" name="Submit"  class="btn btn-primary">
                                    </div>

                                     </div>
                                     </form>
								  
								  
								  
								  
								  

                           
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>
</html>
<?php
}
else{
     header("Location:index.php");       
}
?>