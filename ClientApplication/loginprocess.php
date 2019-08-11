<?php
session_start();
$con=mysqli_connect("localhost","root","","bodaichecksystem");

$password=md5($_POST['password']);

$guery="SELECT * FROM client_personal_acc WHERE Phone_number='".$_POST['phonenumber']."' AND password='$password' AND Account_status='Active' ";
$result=mysqli_query($con, $guery);


if(mysqli_num_rows($result)>0)
{
$user=mysqli_fetch_assoc($result);
echo "details valid";


if($_POST['remember']==1)
{
$time=time()+2592000;
setcookie("userid",$user["id"],$time);
setcookie("adminuser",$_POST['phonenumber'],$time);
setcookie("password",$_POST['password'],$time);
header("Location: dashboard.php");
}
else{
$_SESSION['userid']=$user["id"];

$_SESSION['adminuser']=$_POST['phonenumber'];
$_SESSION['password']=$_POST['password'];
header("Location: dashboard.php");
}
}
else{


echo "<script>alert('check your login creditials and try again');
					window.location='index.php';
						</script>";

}



?>