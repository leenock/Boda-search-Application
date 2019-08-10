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
        <title>update_casefile...</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <link rel="shortcut icon" href="infinitiv.ico"> 
        
    </head>

    <body>
       
	    <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="dashboard.php">Icheck <img src="images/icheck5.jpg" style="width:60px;height:30px;" alt="icheck"  class="img-circle"></a>
						
                    <div class="nav-collapse collapse navbar-inverse-collapse">

                        <ul class="nav nav-icons">
                            <li class="active"><a href="generate_reports.php"><i class="icon-envelope"></i></a></li>
                            <li><a href="bodaOperatorsAccounts.php"><i class="icon-eye-open"></i></a></li>
                            <li><a href="dashboard.php"><i class="icon-bar-chart"></i></a></li>
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
                                    <h3 style="color:DarkCyan">
                                      Update  Personal Information Account</h3>
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
											<li><a href="#"><i class="menu-icon icon-file" ></i>View Operators Acc</a></li>
                                                
                                               
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
                                        
												<?php
    $con=mysqli_connect("localhost","root","","bodaichecksystem");
	$query="select *from crimereporting where AOBNumber LIKE '$_GET[id]'";
	
    $resuilt=mysqli_query($con, $query);
    $userprofile=mysqli_fetch_assoc($resuilt);	
	
			
?>	
										
											   <?php
						   
						     
                if (isset($_POST['Submit'])) {
					
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
					
	 $Aob = clean($_POST['aobnumber']);
	 $casestatus = clean($_POST['status']);
	 
	


                    $sql="update crimereporting set CaseStatus='$casestatus' where AOBNumber='$Aob' ";
					
                    mysql_query($sql)or die(mysql_error());
					
                    echo"<script>
							alert('Update succefully made');
							window.location='reported_case_files.php';
							</script>";		 
?>
                    <?php
                }
                ?>
										
										
										
                                   <form class="form-horizontal row-fluid" method="Post"     enctype="multipart/form-data">
                                    <div class="module-body">

                                        <div class="control-group">
                                        <label class="control-label">Full Name</label>
                                        <div class="controls">
                                                <input type="text" placeholder="First Name" name="fullnames" class="span4 tip" pattern="[A-Za-z]{3,}" value="<?php echo $userprofile['Fullnames_clientvictim'];?>"  title="Only Alphabets" readonly>
												
                                                <input type="text" placeholder="last Name " name="aobnumber" value="<?php echo $userprofile['AOBNumber'];?>" class="span4 tip" readonly>
												
                                                <select name="status"  type="text" class="form-control" value="#">
									          <option><?php echo $userprofile['CaseStatus']; ?></option>
											  <option>Resolved</option>
											  <option>Recurred</option>
									
				  
									</select>
												
                                        </div>
                                        </div>                            
<hr>
									<div class="pull-right">
                                        <input type="Submit" name="Submit" value="Update Status"  class="btn btn-warning">
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