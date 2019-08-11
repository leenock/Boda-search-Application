<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>icheckApp</title>
  <link rel="stylesheet" href="links/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="links/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="links/css/vendor.bundle.addons.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="infinitiv.ico"> 
  <meta name="viewport" content="user-scalable=no, width=device-width" />
   
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
		  
            <div class="auto-form-wrapper">
			<label><b style="font-family:Times New Roman, Times, serif">Please Fill in details to change your password</b> </label>
			
			<?php
			
if(isset($_POST['Submit'])){			
			
    $connect=mysql_connect("localhost","root","");
	mysql_select_db('bodaichecksystem',$connect)or die(mysql_error());
	$con=mysql_select_db('bodaichecksystem',$connect)or die(mysql_error());	

    $query= "SELECT *from client_personal_acc WHERE Phone_number='".$_POST['phonenumber']."'";
    $result=mysql_query($query)or die(mysql_error());
    $Numrows=mysql_num_rows($result);  
	
	if(!$Numrows>0)
                     {
                 echo" <script>alert('Phone Number does not exist')</script>";
           }else{
      
    
      
      
      //Function to sanitize values received from the form. Prevents SQL injection
      function clean($str) {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
          $str = stripslashes($str);
        }
        return mysql_real_escape_string($str);
      }
      
      //Sanitize the POST values

  
  $emailaddress = clean($_POST['emailaddress']);
  $phonenumber = clean($_POST['phonenumber']);
  $password = clean($_POST['password']);
  $confirmpassword = clean($_POST['confirmpassword']);
  $status='Active';
  
  $encrypted_mypass = md5($password);
  $encrypted_myCopass = md5($confirmpassword);
   
    if($password!==$confirmpassword){
      
       echo" <script>alert('password do not match')</script>";
     }
   else{
     

 $sql="UPDATE client_personal_acc SET password='$encrypted_mypass' WHERE Phone_number='$phonenumber' AND Account_status='$status' ";

 
       mysql_query($sql)or die(mysql_error());
     echo"<script>
              alert('Password Successfuly changed');
                  window.location='index.php';
              </script>";    
}
}
  		
			
}			
			?>
		
			   <form  name="myform" action="#" autocomplete="on" onsubmit="return validateemail();" Method="POST" > 
			  
					<div class="form-group">
					 
					  <div class="input-group">
						<input type="text" class="form-control" placeholder="format 07**" onkeypress="return validateKeyStrokes(event)" name="phonenumber" autocomplete="off" title="Digits Only" required>
						<div class="input-group-append">
						  <span class="input-group-text">
							<i class="mdi mdi-check-circle-outline"></i>
						  </span>
						</div>
					  </div>
					</div>
					
				<div class="form-group">
					 
					  <div class="input-group">
						<input type="email" class="form-control" name="emailaddress" autocomplete="off" placeholder="EmailAddress" title="EmailAddress" required>
						<div class="input-group-append">
						  <span class="input-group-text">
							<i class="mdi mdi-check-circle-outline"></i>
						  </span>
						</div>
					  </div>
					</div>
				
				<div class="form-group">
					 
					  <div class="input-group">
						<input type="password" class="form-control" name="password" id="myInput" placeholder="New Password" required>
						<div class="input-group-append">
						  <span class="input-group-text">
							<i class="mdi mdi-check-circle-outline"></i>
						  </span>
						</div>
					  </div>
					</div>
					
					
			<div class="form-group">
					 
					  <div class="input-group">
						<input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password"  required>
						<div class="input-group-append">
						  <span class="input-group-text">
							<i class="mdi mdi-check-circle-outline"></i>
						  </span>
						</div>
					  </div>
					</div>		
				
				
						<div class="form-group">
							 <button type="Submit" class="btn btn-success submit-btn btn-block" name="Submit">Update</button>
						</div>
											
					<div class="text-block text-center my-3">
						<span class="text-small font-weight-semibold">Not a member ?</span>
							<a href="createAcc.php" class="text-black text-small">Create new account</a>
					</div>
							
			</form>					
		</div>
		
            <ul class="auth-footer">
              <li>
                <a style="color:black" href="#">Conditions</a>
              </li>
              <li>
                <a style="color:black" href="#">Help</a>
              </li>
              <li>
                <a style="color:black" href="#">Terms</a>
              </li>
            </ul>
			
            <p style="color:black" class="footer-text text-center">copyright © 2018 IcheckApp. All rights reserved.</p>
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