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
   
</head>

<body>
  <div class="container-scroller">
    <div  class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div  class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-5 mx-auto">
		  
            <div class="auto-form-wrapper">
		<div class="alert alert-info ">
			<label><b style="font-family:Times New Roman, Times, serif">Please enter the Boda plate Number</b> </label>	 
		</div>
			<?php require_once 'inc/Connection.php'; ?>
			<?php
			if(isset($_POST['submitquery'])){
	  $con=mysqli_connect("localhost","root","","bodaichecksystem");		
	  $sql = "select * from operators_personal_acc WHERE Boda_plate_number='".$_POST['searchquery']."' AND Account_status='Active' ";
        
		 $result=mysqli_query($con, $sql );
			 if(mysqli_num_rows($result)>0)
			{
			   $user=mysqli_fetch_assoc($result);
               echo "Boda plate number is Valid";    
			 if($_POST['searchquery'])
                     {  
						$time=time()+2592000;
						setcookie("adminuser_operator",$_POST["searchquery"],$time);
                        setcookie("userid_operator",$user["Count_id"],$time);
						header("Location: Results_query.php");
                     } 
					 else
					 {
                    
					$_SESSION['adminuser_operator']=$_POST["searchquery"];	
					$_SESSION['userid_operator']=$user["Count_id"];
					header("Location: Results_query.php");
					
					
					 }
			}
        else
			{
					
			echo "<script>alert('check the plate Number and try again');
					window.location='searchboda_operator.php';
						</script>";		
					
		    }
			}
			
			?>
	
     <form class="form-inline" Method="POST" action="#">
      <input type="text" class="form-control col-sm-6" id="" name="searchquery" autocomplete="off" placeholder="boda plate number" required>
			<p style="color:white">..</p>	
			
          <button class="btn btn-success btn-md col-sm-3" id="search" name="submitquery" type="submit">Search<i class="icon-search"></i></button>
		  
	</form>

					
											
					<div class="text-block text-center my-3">
						<span class="text-small font-weight-semibold">Not a member ?</span>
							<a href="createAcc.php" class="text-black text-small">Create new account</a>
					</div>
		
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
									
									function validateTextkeyStrokes(event) {
									
									var ch = String.fromCharCode(event.keyCode);
									var filter = /[a-zA-Z]/   ;
									if(!filter.test(ch)){
									event.returnValue = false;
									}

									}
									
									
									
									</script>
  
</body>

</html>