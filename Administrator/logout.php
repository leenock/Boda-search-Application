<?php
session_start();
if((isset($_COOKIE['adminuser']) && isset($_COOKIE['password']))||(isset($_SESSION['adminuser'])&&isset($_SESSION['password'])))
{
if(isset($_COOKIE['adminuser']))
	{
		$expiry=time()-10;
		setcookie("adminuser", "", $expiry);
		setcookie("password", "", $expiry);
	}
	else{

		session_destroy();
	     header("Location: index.php");	
	}
	
	}	else
{
 header("Location: index.php");		
	  session_destroy();
}
	
?>