<?php 
//check if user has login;
require_once 'inc/Connection.php';

if((isset($_COOKIE['adminuser_operator']) && isset($_COOKIE['userid_operator']))||(isset($_SESSION['adminuser_operator'])&&isset($_SESSION['userid_operator'])))
{
$id="";
  $status="";
  if(isset($_COOKIE['userid_operator']))
  {
    $id=$_COOKIE['userid_operator'];
    
  }
  else{
    $id=$_SESSION['userid_operator'];
   
  }	
  $result=mysqli_query($con," SELECT * FROM operators_personal_acc WHERE Count_id=".$id);
  $userprofile=mysqli_fetch_assoc($result);
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>rate_rider</title>
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

<?php
if(isset($_POST['saveride'])){

    $connect=mysql_connect("localhost","root","");
	mysql_select_db('bodaichecksystem',$connect)or die(mysql_error());
	$con=mysql_select_db('bodaichecksystem',$connect)or die(mysql_error());


	
	
	
	
	
    function clean($str){
		
	$str = @trim($str);
    if(get_magic_quotes_gpc()){
	$str = stripslashes($str);	
		
	}	
	return mysql_real_escape_string($str);
	}	

	 //Sanitize the post values

		$clientphonenumber	=  clean($_POST['client_telenumber']);
	    $bodaplateNumber	=  clean($_POST['plateNumber']);
		$operators_name		=  clean($_POST['fullnames']);
	    $county             =  clean($_POST['county']);
		$operator_phonenumber   =  clean($_POST['boda_mobile']);
		$rate_number        =  clean($_POST['rate']);
		
		$notification    = 'you rated your rider!';
		

$sql="INSERT INTO ratings(`Boda_plateNumber`,`operator_fullname`,`operator_Telephone_number`,`Operator_county`, `client_phonenumber`, `rate_counter`,`notification`) Values ('".$bodaplateNumber."','".$operators_name."','".$operator_phonenumber."','".$county."','".$clientphonenumber."','".$rate_number."','".$notification."')";
 mysql_query($sql)or die(mysql_error());

 $sqlrate="UPDATE operators_personal_acc set rate_counter ='$rate_number' where Boda_plate_number='$bodaplateNumber' ";
 mysql_query($sqlrate)or die(mysql_error());
 
						echo"<script>
							alert('Succefully rated Your Ride');
							window.location='Results_query.php';
							</script>";	
 

}
?>

    <div  class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div  class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-3">
		
	<label><b style="font-family:Times New Roman, Times, serif">Rate Boda Operator</b> </label>	

	  <form class="form-inline" Method="POST" action="#" >
	  
	  <button class="btn-xs btn-primary" name="saveride" type="submit" ><i class="fa fa-motorcycle"></i><b>Rate your Rider</b>
	  </button>
	  
	  
	  <hr>
         <div  class="row">
         	<div  class="wrapper">
				   <div class="jumbotron" > 
				     <div  class="container" >
				     <div  class="form-group">
		

                     <div class="profile-image">
					     <table>
					     <tbody> 
					
   <td><a href="<?php echo "../AdminSystem/".$userprofile['Passport_picture']; ?>"><img src="<?php echo "../AdminSystem/".$userprofile['Passport_picture']; ?>" class="img-thumbnail" alt="Photo" width="140" height="140"></a></td>
						
					   </tbody>
					   </table>	
					 </div>		  
                  </div>
				  
					<label><b style="font-family:Times New Roman, Times, serif">Operator's FullNames</b> </label> <input type="text" name="fullnames" value=" <?php echo $userprofile['Firstname']." ".$userprofile['Lastname']." ".$userprofile['Surname'];?>"  readonly>
					
					<label><b style="font-family:Times New Roman, Times, serif">PhoneNumber</b></label>  <input type="text" name="boda_mobile" value="  <?php echo $userprofile['Phonenumber'];?>" readonly>
				
					<label><b style="font-family:Times New Roman, Times, serif">County</b> </label> <input type="text" name="county" value="<?php echo $userprofile['County'];?>" readonly>
					
					<label><b style="font-family:Times New Roman, Times, serif">Boda Plate number</b> </label> <input type="text" name="plateNumber"  value="<?php echo $userprofile['Boda_plate_number'];?>" readonly>
					
					<label><b style="font-family:Times New Roman, Times, serif">Phone Number</b> </label>
					<input type="text" class="form-control" name="client_telenumber" id="phonenumber" placeholder="PhoneNumber" required>
					
					<label><b style="font-family:Times New Roman, Times, serif">Rate your rider</b> </label>
					 <select name="rate" class="form-control span4 tip" required>
					     <option>please select</option>
						 <option>1</option>
						 <option>2</option>
						 <option>3</option>
						 <option>4</option>
						 <option>5</option>
					 </select>
					
					
						
	</div>
		</div>
			</div>
		      </div>
			  
  	</form>			
				
					<div class="text-block text-center my-3">
					
					<hr>
						<span class="text-small font-weight-semibold">Not a member ?</span>
							<a href="createAcc.php" class="text-black text-small">Create new account</a>
							<p><a href="tel:0799 031 985 " class="btn-sml btn-warning"><i class="fa fa-phone"></i><b>Call us Now</b></a>
							<a href="index.php" class="btn-sml btn-warning"><i class="fa fa-warning"></i><b>Report to us</b></a>
							<hr>
							<a href="searchboda_operator.php" class="text-black text-small"><i class="fa fa-motorcycle"></i><b>Search New Motorlist</b></a>
					</div>
			
            <p style="color:black" class="footer-text text-center">copyright © 2018 IcheckApp. All rights reserved.</p>
          </div>
        </div>
      </div> 
   
  <script src="links/js/vendor.bundle.base.js"></script>
  <script src="links/js/vendor.bundle.addons.js"></script>

  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
   

  
</body>

</html>
<?php
}
else{
     header("Location:searchboda_operator.php");       
	
}
?>