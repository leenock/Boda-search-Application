<?php include 'logout2.php';?>
<?php require_once 'inc/Connection.php'; ?>
<?php
 if(isset($_POST['button'])){
        $con=mysqli_connect("localhost","root","","bodaichecksystem");
        $guery="SELECT * FROM Acc_Admin WHERE username='".$_POST['username']."' AND Password='".$_POST['password']."' AND status='approved' ";
		
            $result=mysqli_query($con, $guery );
 
			 if(mysqli_num_rows($result)>0)
			{
			   $user=mysqli_fetch_assoc($result);
               echo "details valid"; 
			   
		
			   
			 if($_POST['remember']==1)
                     {  
						$time=time()+2592000;
                        setcookie("userid",$user["id"],$time);
						setcookie("adminuser",$user["username"],$time);
						setcookie("password",$_POST['password'],$time);
						header("Location: dashboard.php");


                     } 
					 else
					 {
                    $_SESSION['userid']=$user["id"];
					$_SESSION['adminuser']=$user["username"];	 
					$_SESSION['password']=$_POST['password'];	
					header("Location: dashboard.php");
					
					
					 }
			}
			else
			{
					
			echo "<script>alert('check your login creditials or contact System Administrator');
					window.location='index.php';
						</script>";		
					
		    }
 
 
 }


   /* $connect=mysql_connect("localhost","root","");
    mysql_select_db('library_managementsystem',$connect)or die(mysql_error());
    $con=mysql_select_db('library_managementsystem',$connect)or die(mysql_error());

if(isset($_POST['button']))
{
          //   $con=mysqli_connect("localhost","root","","library_managementsystem");


$username=$_POST['username'];
$password=$_POST['password'];

          $sql="INSERT INTO admin_login_sessions(username,password)VALUES('".$username."','".$password."') ";
         // mysql_query($sql)or die(mysql_error());
      $guery="SELECT * FROM admin_login WHERE username='".$_POST['username']."' AND Password='".$_POST['password']."'";
             mysql_query($guery)or die(mysql_error());


if(mysql_query($sql)){

    echo "New record created succefully";
}
else
{
    echo "Error: " . $sql . "<br>" . mysql_error($connect);
}
mysql_close($connect);
}*/


?>
<!DOCTYPE html>
 <html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>BodaIcheckSystem</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="css.admin/demo.css" />
        <link rel="stylesheet" type="text/css" href="css.admin/style.css" />
		<link rel="stylesheet" type="text/css" href="css.admin/animate-custom.css" />
        <link rel="shortcut icon" href="infinitiv.ico"> 
		<meta name="viewport" content="user-scalable=no, width=device-width" />
    </head>

 <script type="text/javascript">
var tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
var tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
var d=new Date();
var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate();
var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

if(nhour==0){ap=" AM";nhour=12;}
else if(nhour<12){ap=" AM";}
else if(nhour==12){ap=" PM";}
else if(nhour>12){ap=" PM";nhour-=12;}

if(nmin<=9) nmin="0"+nmin;
if(nsec<=9) nsec="0"+nsec;

document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+" "+nhour+":"+nmin+":"+nsec+ap+"";
}

window.onload=function(){
GetClock();
setInterval(GetClock,1000);
}
</script>

    <body>
        <div class="container">
            
				<div class="codrops-top">
				<a href="index.php">
				<strong>&laquo; MyPage: </strong>Homepage
				</a>
				<div class="clr"></div>
				</div>
			
						<header>
						<span style="font-size:20px;"> 
						<p><center><div id="clockbox"></div></center></p> </span>
						<nav class="codrops-demos">
						<span><strong>Login To</strong> Access system</span>
						</nav>
						</header>
			
            <section>		
			
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="#" autocomplete="on" Method="POST" > 
                                <h1>Boda Icheck System</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > AdministratorID </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="AdministratorID"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p">password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="password" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" name="remember"   id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" name="button" value="Login" /> 
								</p>
                               
                            </form>
                        </div>
						
                    </div>
                </div> 
				
            </section>
			
        </div>
    </body>
</html>