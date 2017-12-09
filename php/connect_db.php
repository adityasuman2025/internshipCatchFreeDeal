<?php 
	//connecting to the database of the site
	//date_default_timezone_set('Asia/Kolkata');
	$mysql_host="localhost";
	$mysql_user="catchpdx_root";
	$mysql_pass="catchfreedeal";
	$mysql_db = "catchpdx_catchfreedeal";

	if($connect_link = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db))
	{
		//echo 'done';
	}
	else
	{
		echo 'database failed to connect';
	}
 ?>