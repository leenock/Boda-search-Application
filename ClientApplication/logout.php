<?php
session_start();
if((isset($_COOKIE['phonenumber']) && isset($_COOKIE['password']))||(isset($_SESSION['phonenumber'])&&isset($_SESSION['password'])))
{
if(isset($_COOKIE['phonenumber']))
	{
		$expiry=time()-10;
		setcookie("phonenumber", "", $expiry);
		setcookie("password", "", $expiry);
	}
	else{

		session_destroy();
	     header("Location: index.php");	
	}
	
	}	else
{
	 session_destroy();
 header("Location: index.php");		
	
}
	
?>