<?php
session_start();
if((isset($_COOKIE['adminuser_client']) && isset($_COOKIE['password']))||(isset($_SESSION['adminuser_client'])&&isset($_SESSION['password'])))
{
if(isset($_COOKIE['adminuser_client']))
	{
		$expiry=time()-10;
		setcookie("adminuser_client", "", $expiry);
		setcookie("password", "", $expiry);
	}
	else{

		session_destroy();
	     	
	}
}
?>