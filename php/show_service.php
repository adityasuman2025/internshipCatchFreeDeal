<?php
//page for showing code on click of catch service
	include('connect_db.php');
	$service_id = $_POST['service_id'];
	$service_provider = $_POST['service_provider'];

	if(isset($_COOKIE['logged_user_cookie']))
	{
		$logged_user_id =  $_COOKIE['logged_user_cookie'];
		$logged_user_name_query = "SELECT * FROM users WHERE id = '$logged_user_id'";

		$logged_user_name_query_run = mysqli_query($connect_link, $logged_user_name_query);
		$logged_user_name_assoc = mysqli_fetch_assoc($logged_user_name_query_run);

		$logged_user_name = $logged_user_name_assoc['name'];
		$logged_user_email = $logged_user_name_assoc['email'];
		$logged_user_mob = $logged_user_name_assoc['mob'];
		
		//$service_and_user_cookie= "user_id_" . $logged_user_id . "_service_id_" . $service_id;
		
		// if(isset($_COOKIE[$service_and_user_cookie]))
		// {
		// 	echo 1;
		// }
		// else
		// {

			$service_and_user_query = "INSERT INTO service_and_user VALUES('','$logged_user_id ','$logged_user_name ','$logged_user_email','$logged_user_mob','$service_id', '$service_provider', CURRENT_TIMESTAMP)";
			if($service_and_user_query_run = mysqli_query($connect_link, $service_and_user_query))
			{
				echo 1;
			}
			else
			{
				echo 0;
			}

			//setcookie($service_and_user_cookie, $service_and_user_cookie, time() + 2592000, "/");
		//}
		
	}
	else
	{
		echo "You need to login first";
	}
?>