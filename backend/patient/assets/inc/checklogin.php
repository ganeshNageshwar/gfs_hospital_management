<?php
function check_login()
{
if(strlen($_SESSION['opdpatientid'])==0)
	{
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="index.php";
		$_SESSION["opdpatientid"]="";
		header("Location: http://$host$uri/$extra");
	}
}
?>
