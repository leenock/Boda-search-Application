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
        <title>Icheck Admin Panel</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
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
								<li><a href="#"><h5 style=color:#04C5E6><b>Welcome <?php echo $userprofile['Name'];?> </b></h5></a></li>
                                    <li><a href="#">Profiles</a></li>                                   
                                    <li><a href="#">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Sign-Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                   
                </div>
            </div>
            
        </div>
		
        
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
                                        <li><a href="client_booking_details.php"><i class="icon-user"></i>Clients' Booking Details </a></li>
                                       

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
					
					
					  <?php include('dbcon.php'); ?>
                    <div class="span9">
                        <div class="content">
						
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
									<?php 

									$Report_Count = mysql_query("SELECT COUNT(*) AS Reg_Boda_Acc FROM `operators_personal_acc` ")or die(mysql_error());
									$row_All = mysql_fetch_array($Report_Count);
									$total_operators=$row_All['Reg_Boda_Acc'];
									?>
                                    <a style="background-color:#B0E0E6" href="#" class="btn-box big span4"><i class=" icon-group"></i><b style="color:white"><?php echo $total_operators;?></b>
                                        <p style="color:white" class="text-muted">
                                            Registered Boda Operators</p>
                                    </a>
									<?php 

									$Report_Count_clients = mysql_query("SELECT COUNT(*) AS Phone_number FROM `client_personal_acc` ")or die(mysql_error());
									$row_All = mysql_fetch_array($Report_Count_clients);
									$total_users=$row_All['Phone_number'];
									?>
									
									
									<a style="background-color:#C0C0C0" href="#" class="btn-box big span4"><i class="icon-user"></i><b style="color:white" ><?php echo $total_users;?></b>
                                        <p style="color:white"  class="text-muted">
                                            Registered Clients/Users </p>
                                    </a>
									
									
									<?php 

									$Report_Count_savedrides = mysql_query("SELECT COUNT(*) AS Client_mobilenumber FROM `save_ride` ")or die(mysql_error());
									$row_All = mysql_fetch_array($Report_Count_savedrides);
									$total_savedrides=$row_All['Client_mobilenumber'];
									?>
									
									
									<a href="#" class="btn-box big span4"><i class="icon-chevron-up"></i><b style="color:black"><?php echo $total_savedrides;?></b>
                                        <p class="text-muted">
                                             Clients Search rides</p>
                                    </a>
                                </div>
								<div class="btn-box-row row-fluid">

                                   <?php 

                                    $Report_Count_reportfiles = mysql_query("SELECT COUNT(*) AS AOBNumber FROM `crimereporting` ")or die(mysql_error());
                                    $row_All = mysql_fetch_array($Report_Count_reportfiles);
                                    $total_reports=$row_All['AOBNumber'];
                                    ?>



                                    <a href="#" class="btn-box big span4"><i class=" icon-book"></i><b style="color:black"><?php echo $total_reports;?></b>
                                        <p class="text-muted">
                                             Reported case files</p>
                                    </a>
                                    <?php 

                                    $Report_Count_reportfiles = mysql_query("SELECT COUNT(*) AS AOBNumber FROM `crimereporting` WHERE CaseStatus='Resolved' ")or die(mysql_error());
                                    $row_All = mysql_fetch_array($Report_Count_reportfiles);
                                    $total_reports=$row_All['AOBNumber'];
                                    ?>

                                    <a href="#" class="btn-box big span4"><i class="icon-book"></i><b style="color:black"><?php echo $total_reports;?></b>
                                        <p class="text-muted">
                                            Resolved Report CaseFiles</p>
                                    </a>
									 <ul class="widget widget-usage unstyled span4">
                                        <li style="background-color:#B0E0E6">
                                            <p>
                                                <strong>Registered Boda Operators</strong> <span style="color:white" class="pull-right small muted"><?php echo $total_operators;?></span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar" style="width: <?php echo $total_operators."%";?>">
                                                </div>
                                            </div>
                                        </li>
                                        <li style="background-color:#C0C0C0">
                                            <p>
                                                <strong>Registered Clients/Users</strong> <span class="pull-right small muted"><?php echo $total_users;?></span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar" style="width: <?php echo $total_users."%";?>">
                                                </div>
                                            </div>
                                        </li>
                                       
                                        
                                    </ul>
									
                                </div>
                              
                            </div>
                            
                            
                           
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