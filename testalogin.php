<?php
session_start();
if(isset($_SESSION['usuario']))
{
	$usuario = $_SESSION['usuario'];
	include("logoutform.php");
}
else 
{
	include("loginform.php");
}
?>