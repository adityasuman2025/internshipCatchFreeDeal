<?php
	include('connect_db.php');

//if directyly visiting the page
	if(isset($_POST['email_subs_email']))
	{

	}
	else
	{
		die('not allowed');
	}

	$email_subs_email = strtolower(htmlentities(mysqli_real_escape_string($connect_link, $_POST['email_subs_email'])));

	$email_subs_query = "INSERT INTO email_subs VALUES('','$email_subs_email')";

	if($email_subs_query_run = mysqli_query($connect_link, $email_subs_query))
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
	
?>