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



<?php
if(isset($_POST['Submit'])){
	
  

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
	
	
	function fileupload2($PhotoField, $Email, $Field){
		if(isset($_FILES[$PhotoField]["name"])){
		$fileSize=$_FILES[$PhotoField]["size"];
		$fileName=$_FILES[$PhotoField]["name"];
		global $filepath2;
		$filepath2=$_FILES[$PhotoField]["tmp_name"];
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
	
	
	function fileupload3($PhotoField, $Email, $Field){
		if(isset($_FILES[$PhotoField]["name"])){
		$fileSize=$_FILES[$PhotoField]["size"];
		$fileName=$_FILES[$PhotoField]["name"];
		global $filepath3;
		$filepath3=$_FILES[$PhotoField]["tmp_name"];
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
	
	function fileupload4($PhotoField, $Email, $Field){
		if(isset($_FILES[$PhotoField]["name"])){
		$fileSize=$_FILES[$PhotoField]["size"];
		$fileName=$_FILES[$PhotoField]["name"];
		global $filepath4;
		$filepath4=$_FILES[$PhotoField]["tmp_name"];
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
	
	function fileupload5($PhotoField, $Email, $Field){
		if(isset($_FILES[$PhotoField]["name"])){
		$fileSize=$_FILES[$PhotoField]["size"];
		$fileName=$_FILES[$PhotoField]["name"];
		global $filepath5;
		$filepath5=$_FILES[$PhotoField]["tmp_name"];
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
	         
					 
		
 if(!(isset($_FILES["nationalIdpic"]["name"])||isset($_FILES["insuarancecover"]["name"])||isset($_FILES["drivinglicence"]["name"])||isset($_FILES["ownershipcert"]["name"])||isset($_FILES["passportpic"]["name"]))){
	echo "<script>
              alert('Please fill in the necessary legal documents');
              window.location='bodaOperatorsAccounts.php';		  
        </script>";
		
}


else{
	$newName1=fileupload("nationalIdpic", $_POST['Email'], "National id");
	$newName2=fileupload2("insuarancecover", $_POST['Email'], "Insuarance Cover");
	$newName3=fileupload3("drivinglicence", $_POST['Email'], "Driving Licence");
	$newName4=fileupload4("ownershipcert", $_POST['Email'], "Boda Ownership Certificate");
	$newName5=fileupload5("passportpic", $_POST['Email'], "passport");
	
	
	if(!($newName1=="Empty"||$newName1=="too large"||$newName1=="image only"||$newName2=="Empty"||$newName2=="too large"||$newName2=="image only"||$newName3=="Empty"||$newName3=="too large"||$newName3=="image only"||$newName4=="Empty"||$newName4=="too large"||$newName4=="image only"||$newName5=="Empty"||$newName5=="too large"||$newName5=="image only")){

	mkdir("Uploads/".$_POST['Email']);
	
	
	
$nationalIdpic="Uploads/".$_POST['Email']."/nationalIdpic".$newName1;
move_uploaded_file($filepath1, $nationalIdpic);
$insuarancecover="Uploads/".$_POST['Email']."/insuarancecover".$newName2;
move_uploaded_file($filepath2, $insuarancecover);
$drivinglicence="Uploads/".$_POST['Email']."/drivinglicence".$newName3;
move_uploaded_file($filepath3, $drivinglicence);
$ownershipcert="Uploads/".$_POST['Email']."/ownershipcert".$newName4;
move_uploaded_file($filepath4, $ownershipcert);
$passportpic="Uploads/".$_POST['Email']."/passportpic".$newName5;
move_uploaded_file($filepath5, $passportpic);


    $connect=mysql_connect("localhost","root","");
	mysql_select_db('bodaichecksystem',$connect)or die(mysql_error());
	$con=mysql_select_db('bodaichecksystem',$connect)or die(mysql_error());
	
	
	$sql_mobile="SELECT *from operators_personal_acc WHERE Phonenumber='".$_POST['telenumber']."'";
	$sql_emergency="SELECT *from operators_personal_acc WHERE Emergency_number='".$_POST['emergencynum']."'";
	$sql_ID="SELECT *from operators_personal_acc WHERE National_Id='".$_POST['IDnumber']."'";
	$sql_platenU="SELECT *from operators_personal_acc WHERE Boda_plate_number='".$_POST['platenumber']."'";
	$sql_mail="SELECT *from operators_personal_acc WHERE Email_Address='".$_POST['Email']."'";
	
	$result_mobile=mysql_query($sql_mobile)or die(mysql_error());
						  $Numrows_mobile=mysql_num_rows($result_mobile);
						  
						  $result_emergency=mysql_query($sql_emergency)or die(mysql_error());
						  $Numrows_emergency=mysql_num_rows($result_emergency);
						  
  $result_id=mysql_query($sql_ID)or die(mysql_error());
						  $Numrows_id=mysql_num_rows($result_id);

						  $result_platenUm=mysql_query($sql_platenU)or die(mysql_error());
						  $Numrows_platenumber=mysql_num_rows($result_platenUm);
						  
  $result_mail=mysql_query($sql_mail)or die(mysql_error());
						  $Numrows_mail=mysql_num_rows($result_mail);
						  
						  
						   if($Numrows_mobile>0)
                     {
						 echo" <script>alert('The Mobile Number is already registered')</script>";
						 
					 } elseif($Numrows_emergency>0){
						 
						 echo" <script>alert('The Emergency Number is already registered')</script>";
						 
					 } elseif($Numrows_id>0){
						 
						 echo" <script>alert('National identification card is already registered')</script>";
						 
					 } elseif($Numrows_platenumber>0){
						 
						  echo" <script>alert('Boda Number plate  is already registered to another operator')</script>";
						  
					 } elseif ($Numrows_mail>0){
						 
						  echo" <script>alert('Email Address is already registered')</script>";
						 
					 }else{



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
	$emergencynum	=  clean($_POST['emergencynum']);
	$nationalId		=  clean($_POST['IDnumber']);
				
	$gender			=  clean($_POST['gender']);
	$dob			=  clean($_POST['dob']);
	$plceofbirth	=  clean($_POST['birthplace']);
				
	$homeaddress	=  clean($_POST['homeAddress']);
	$hometown		=  clean($_POST['Hometwon']);
	$county			=  clean($_POST['county']);			
				
	/*$nationalIdpic	=  clean($_POST['nationalId']);
	$insuarancecover =  clean($_POST['insuarancecover']);
	$drivinglicence	 =  clean($_POST['drivinglicence']);
	$ownershipcert	=  clean($_POST['ownershipcert']);
	$passportpic	=  clean($_POST['passportpic']);*/
				
	$referencenumber =  clean($_POST['referencenumber']);
	$bodaplatenumber =  clean($_POST['platenumber']);
	$emailaddress    =  clean($_POST['Email']);
	
	$status='Active';

$sql="INSERT INTO operators_personal_acc(`Firstname`, `Lastname`, `Surname`, `Phonenumber`, `Emergency_number`, `National_Id`, `Gender`, `DOB`, `Place_of_birth`, `Home_address`, `Hometown`, `County`, `Nationa_id_image`, `Insuarance_cover`, `Driving_licence`, `Boda_ownwership_certificate`, `Passport_picture`, `Operators_reference_id`, `Boda_plate_number`, `Email_Address`, `Account_status`) Values ('".$fullname."', '".$lastname."', '".$surname."', '".$phonenumber."', '".$emergencynum."', '".$nationalId."', '".$gender."', '".$dob."', '".$plceofbirth."', '".$homeaddress."', '".$hometown."', '".$county."', '".$nationalIdpic."', '".$insuarancecover."', '".$drivinglicence."', '".$ownershipcert."', '".$passportpic."', '".$referencenumber."', '".$bodaplatenumber."', '".$emailaddress."', '".$status."')";


 mysql_query($sql)or die(mysql_error());

    
	echo"<script>
              alert('Your Account has been succefully been created');
              window.location='bodaOperatorsAccounts.php';
			  
        </script>";

    }

	}
else{
	
	echo "<script>
              alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed . The images should not be larger than 800kb');
              window.location='bodaOperatorsAccounts.php';
			  
        </script>";
	
   }	


}

}


    $connect=mysql_connect("localhost","root","");
	mysql_select_db('bodaichecksystem',$connect)or die(mysql_error());
	$con=mysql_select_db('bodaichecksystem',$connect)or die(mysql_error());


             
			 $query = mysql_query("SELECT * FROM `counter_table`") or die(mysql_error());
			 $CounterRow=mysql_fetch_array($query);
			 $last_num=$CounterRow['Last_Num_count'];
             $Last_Num_count = $last_num + 1;
             $query = mysql_query("UPDATE `counter_table` SET `Last_Num_count`='$Last_Num_count' WHERE 1;") or die(mysql_error());
             $displayNumber="BOIS/".DATE('y')."/". $Last_Num_count;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create new Account...</title>
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
                                    <li><a href="Clients_user_Accounts.php">Boda Clients' Accounts</a></li>

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
                                <li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>
                                <li><a href="bodaOperatorsAccounts.php"><i class="menu-icon icon-user"></i>Boda Operators' Accounts</a></li>                                                 
                                <li><a href="newbodaOperatorAcc.php"><i class="menu-icon icon-plus"></i>Create New operator Account  </a></li>		
                                <li><a href="generate_reports.php"><i class="menu-icon icon-download"></i>Generate Reports</a></li>
                                <li><a href="reported_case_files.php"><i class="menu-icon icon-file"></i>Reported Case Files</a></li>
								
								

                            </ul>
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Manage Clients Accounts</a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="#"><i class="icon-user"></i>Clients' Booking Details </a></li>
                                        <li><a href="#"><i class="icon-trash"></i>Deleted Accounts</a></li>
										<li><a href="#"><i class="icon-trash"></i>Deactivated Acoounts</a></li>
                                       

                                    </ul>
                                </li>


                                <li><a href="Clients_user_Accounts.php"><i class="menu-icon icon-user"></i>Boda Clients Accounts  </a></li> 
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
                                    <h3 style="color:DarkCyan">
                                        Personal Information Account</h3>
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
										    <li><a href="dashboard.php"><i class="menu-icon icon-dashboard" ></i>Dash board</a></li>  
											<li><a href="bodaOperatorsAccounts.php"><i class="menu-icon icon-file" ></i>View Operators Acc</a></li>
                                                
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <script>
									function myFunction() {
									    location.reload();
									}
									
									
									function validateKeyStrokes(event) {
									var charCode = (event.which) ? event.which : event.keyCode;
									if (charCode > 31 && (charCode < 48 || charCode > 57)) {
									return false;
									}
									return true;
									}
									
									function validateTextkeyStrokes(event) {
									
									var ch = String.fromCharCode(event.keyCode);
									var filter = /[a-zA-Z]/   ;
									if(!filter.test(ch)){
									event.returnValue = false;
									}

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
                                                <input type="text" placeholder="First Name" name="firstname" class="span4 tip" pattern="[A-Za-z]{3,}"  title="Only Alphabets" required>
                                                <input type="text" placeholder="last Name " name="lastname" class="span4 tip" required>
                                                <input type="text" placeholder="surName " name="surname" class="span4 tip" required>
                                        </div>
                                        </div>


                                        <div class="control-group">
                                        <label class="control-label" >Telephone Number</label>
                                        <div class="controls">
                                                <input type="text" placeholder="Phone Number" maxlength="10" name="telenumber" class="span4 tip" onkeypress="return validateKeyStrokes(event)" title="Only Numbers" required>
                                                <input type="text" placeholder="Emergency Number" maxlength="10" name="emergencynum" class="span4 tip" onkeypress="return validateKeyStrokes(event)" title="Only Numbers" required>
                                                <input type="text"  placeholder="National ID" maxlength="8" name="IDnumber" class="span4 tip" onkeypress="return validateKeyStrokes(event)" title="Only Numbers" required>

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
                                     <a id="fd-but-sd" title="" class="date-picker-control" href=""><i class="fa fa-calendar"></i><span>sel</span></a>
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
                                      <hr>
                                     <div class="module-head">
                                    <h3 style="color:DarkCyan ">
                                        Other Legal Information Documents</h3>
										
                                     </div>
                                     <br>
									 
									 <div class="jumbotron">
									
									 <input type="text" placeholder="National Id" name="#" class="span2 tip" disabled >
									 <input type="file" name="nationalIdpic" id="fileToUpload">
									 
									 <input type="text" placeholder="Insuarance Cover" name="#" class="span3 tip" disabled >
									 <input type="file" name="insuarancecover" id="fileToUpload" >
								
								
									 
									 </div>
									<br>
									
									<div class="jumbotron">
									
									    <input type="text" placeholder="Driving Licence" name="#" class="span2 tip" disabled >
									    <input type="file" name="drivinglicence" id="fileToUpload">
								
								        <input type="text" placeholder="Boda Ownership Certificate" name="#" class="span3 tip" disabled >
									    <input type="file" name="ownershipcert" id="fileToUpload" >
									 
									  </div>
									  <br>
									 <div class="jumbotron"> 
									 
									 <input type="text"  placeholder="Passport" name="#" class="span3 tip" disabled >
									 <input type="file" name="passportpic" id="fileToUpload" >
									  
									 </div>
									  
									 <hr>
									 <div class="jumbotron">
                                     <label class="control-label span4 tip">Operator's Identification Number</label> 
                                     <div class="controls">
                                     <input type="text"  value="<?php echo $displayNumber;?>" readonly  name="referencenumber" class="span3 tip" autofocus required>
									 <input type="text"  placeholder="Boda PlateNumber (KXX-212Z)" name="platenumber" class="span3 tip" required>
									 <input type="text"  placeholder="Email Address" name="Email" type="email" class="span4 tip" required>
                                     </div>
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