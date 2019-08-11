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
		  <h3 class="text-center mb-4"><b style="font-family:Times New Roman, Times, serif">!check@<i>pp</i></b></h3>
            <div class="auto-form-wrapper">
			
			   <form role="form"  action="loginprocess.php" autocomplete="on" Method="POST" > 
			  
					<div class="form-group">
					  <label class="label">PhoneNumber</label>
					  <div class="input-group">
						<input type="text" class="form-control" name="phonenumber" placeholder="PhoneNumber" onkeypress="return validateKeyStrokes(event)" title="Digits Only" autocomplete="off" required>
						<div class="input-group-append">
						  <span class="input-group-text">
							<i class="mdi mdi-check-circle-outline"></i>
						  </span>
						</div>
					  </div>
					</div>
					
				<div class="form-group">
				  <label class="label">Password</label>
					<div class="input-group">
						<input type="password" name="password" class="form-control" autocomplete="off" placeholder="*********" required>
							<div class="input-group-append">
								<span class="input-group-text">
						<i class="mdi mdi-check-circle-outline"></i>
				</span>
			</div>
		</div>
				</div>
						<div class="form-group">
							<button class="btn btn-success submit-btn btn-block" name="button">Login</button>
						</div>
							
						<div class="form-group d-flex justify-content-between">
								<div class="form-check form-check-flat mt-0">
									<label class="form-check-label">
										<input type="checkbox"  name="remember" class="form-check-input" checked> Keep me signed in
									</label>
								</div>
							<a href="forgotpassword.php" class="text-small forgot-password text-black">Forgot Password</a>
						</div>
							</form>	
					<div class="form-group">
			     <a href="searchboda_operator.php" style="color:white"><button class="btn btn-warning submit-btn btn-block" width="20%">	Search Boda Operator</button></a>
					</div>
							
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
									
  
 <script type="text/javascript">
 $(document).ready(function () {
   // Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
     });
	
	//Disable part of page
     $('#id').bind('cut copy paste', function (e) {
         e.preventDefault();
     });
   
  //  Disable mouse right click
     $("body").on("contextmenu",function(e){
        return false;
     });
 });
 </script>									
									
  
</body>

</html>