<?php
	//logging the user in the database/site

	include('connect_db.php');
	
	$email_login = strtolower(htmlentities(mysqli_real_escape_string($connect_link,$_POST['email_login'])));
	$pass_login = htmlentities(mysqli_real_escape_string($connect_link,md5($_POST['pass_login'])));

	$user_login_query = "SELECT id FROM users WHERE email = '$email_login' AND password = '$pass_login'";
	$user_login_query_run = mysqli_query($connect_link, $user_login_query);
	
	$user_login_num_rows = mysqli_num_rows($user_login_query_run);

	if($user_login_num_rows ==1)
	{
		$user_info_result= mysqli_fetch_row($user_login_query_run);
		$user_info_id = $user_info_result[0];

		setcookie('logged_user_cookie', $user_info_id, time() + 2592000, "/");
		
		echo $user_info_id;

		// $sec = "0";
		// header("Refresh: $sec; url=http://localhost/index.php");
		//header("Location: ../index.php");
	}
	else
	{
		echo 0;
	}
?>