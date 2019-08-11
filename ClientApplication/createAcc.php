<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>create_Account</title>
  <link rel="stylesheet" href="links/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="links/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="links/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="infinitiv.ico"> 
  <meta name="viewport" content="user-scalable=no, width=device-width" />
  
</head>

<body>

<?php

if(isset($_POST['Submit'])){
    $connect=mysql_connect("localhost","root","");
	mysql_select_db('bodaichecksystem',$connect)or die(mysql_error());
	$con=mysql_select_db('bodaichecksystem',$connect)or die(mysql_error());

      $query= "SELECT *from client_personal_acc WHERE Phone_number='".$_POST['phonenumber']."' || email_address='".$_POST['emailaddress']."'";

       $result=mysql_query($query)or die(mysql_error());
						 $Numrows=mysql_num_rows($result);	

		if($Numrows>0)
                     {
								 echo" <script>alert('PhoneNumber or the EmailAddress used is already registered')</script>";
					 }
		else
		{
	
  function clean($str){
		
	$str = @trim($str);
    if(get_magic_quotes_gpc()){
	$str = stripslashes($str);	
		
	}	
	return mysql_real_escape_string($str);
	}
	
  //Sanitize the post values
  
  
  $emailaddress = clean($_POST['emailaddress']);
  $phonenumber = clean($_POST['phonenumber']);
  $password = clean($_POST['password']);
  $confirmpassword = clean($_POST['confirmpassword']);
  
  $status='Active';
  $notification='Welcome to Icheck App , You can now complete your registration ';
  
   
   $encrypted_mypass = md5($password);
   $encrypted_myCopass = md5($confirmpassword);
   
   if($password!==$confirmpassword){
      
       echo" <script>alert('password do not match')</script>";
        }
		else{
   
  
$sql="INSERT INTO client_personal_acc(`email_address`,`Phone_number`,`password`, `Account_status`, `notification`) Values ('".$emailaddress."','".$phonenumber."','".$encrypted_mypass."','".$status."','".$notification."')";

 mysql_query($sql)or die(mysql_error());

						echo"<script>
							alert('Account Successfuly created');
							window.location='index.php';
							</script>";	
 

   
		
}	
		}
}
?>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            
            <div class="auto-form-wrapper">
			 <label><b style="font-family:Times New Roman, Times, serif"> Fill in the fields provided below</b> </label>
			 
          <form name="myform" action="#" autocomplete="on" Method="POST" onsubmit="return validateemail();" > 
               
			 <div class="form-group">
                  <div class="input-group">
                    <input type="email" name="emailaddress" class="form-control" autocomplete="off" placeholder="EmailAccount"  required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>	
				
			 <div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" maxlength="10"  placeholder="format 07**"  pattern="[0]{1}[7]{1}[0-9]{8}" name="phonenumber" autocomplete="off" onkeypress="return validateKeyStrokes(event)" title="Digits Only" required>
						<div class="input-group-append">
						  <span class="input-group-text">
							<i class="mdi mdi-check-circle-outline"></i>
						  </span>
						</div>
					  </div>
					</div>	
			
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" name="password" class="form-control" id="myInput" autocomplete="off" placeholder="Password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
				
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" name="confirmpassword" class="form-control" autocomplete="off" placeholder="Confirm Password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
					
				<div class="form-group d-flex justify-content-between">
								<div class="form-check form-check-flat mt-0">
									<label class="form-check-label">
										<input type="checkbox" name="agree" value="0" class="form-check-input"  required> By signing up you agree to the terms and conditions
									</label>
								</div>
							
						</div>
                
                <div class="form-group">
                  <button type="Submit" class="btn btn-success submit-btn btn-block" name="Submit">Register</button>
                </div>
				
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Already have and account ?</span>
                  <a href="index.php" class="text-black text-small">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  
  </div>
 
  <script src="links/js/vendor.bundle.base.js"></script>
  <script src="links/js/vendor.bundle.addons.js"></script>
  
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>

     <script>
									
									
							function validateKeyStrokes(event) {
								var charCode = (event.which) ? event.which : event.keyCode;
									if (charCode > 31 && (charCode < 48 || charCode > 57)) {
										return false;
																}
									return true;
									}
									
							function validateemail()  
									{  
								var x=document.myform.emailaddress.value;  
									
									var pass=document.myform.password.value;
										var conpass=document.myform.confirmpassword.value;
											var emailaddres=document.myform.emailaddress.value;
												
								
									
									var emailadxp=/^\w+@\w+\.\w{3}$/
									var letter = /[a-zA-Z]/
									var number = /[0-9]/
									var invalid = [];
									
								    //var atposition=x.indexOf("@");  
								    //var dotposition=x.lastIndexOf(".");  
						
									
							if(!(emailaddres.match(emailadxp))){
								alert("invalid email address");
									return false;
																}
								    if(pass!==conpass)
									{
									alert("password do not match , please try again");	
								    return false;											
									}
									 if (pass.length < 4 || !letter.match(password) || !number.match(password))
									{
										alert("invalid password Validation , include letter and numbers minmum of 4 letters");
										return false;
									}	
									
									
									}  

						window.onload = function() {
							var myInput = document.getElementById('myInput');
								myInput.onpaste = function(e) {
									e.preventDefault();
																}
													}
														
									
									</script>
  
<script type="text/javascript">
$(document).ready(function () {
    //Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
	
	//Disable part of page
    $('#id').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
});
</script>
</body>

</html>