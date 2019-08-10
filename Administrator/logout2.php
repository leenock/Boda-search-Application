<?php
session_start();
if((isset($_COOKIE['username']) && isset($_COOKIE['password']))||(isset($_SESSION['username'])&&isset($_SESSION['password'])))
{
if(isset($_COOKIE['username']))
	{
		$expiry=time()-10;
		setcookie("username", "", $expiry);
		setcookie("password", "", $expiry);
	}
	else{

		session_destroy();
	     	
	}
}
?>