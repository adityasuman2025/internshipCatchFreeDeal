<?php
	$service_location = $_POST['service_location'];
	session_start();

	if($_SESSION["set_location_cookie"] = $service_location)
	{
		echo $_SESSION["set_location_cookie"];
	}
	else
	{
		echo 0;
	}
	
?>