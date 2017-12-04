<?php 
	//connecting to the database of the site

	$mysql_host="localhost";
	$mysql_user="root";
	$mysql_pass="";
	$mysql_db = "catchfreedeal";

	if($connect_link = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db))
	{
		//echo 'done';
	}
	else
	{
		echo 'database failed to connect';
	}
 ?>