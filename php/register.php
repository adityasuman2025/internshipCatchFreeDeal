<?php
	//registering users into database

	include('connect_db.php');

	$name_reg = strtolower(htmlentities(mysqli_real_escape_string($connect_link,$_POST['name_reg'])));
	$mob_reg = htmlentities(mysqli_real_escape_string($connect_link,$_POST['mob_reg']));
	$email_reg = strtolower(htmlentities(mysqli_real_escape_string($connect_link,$_POST['email_reg'])));
	$pass_reg =  htmlentities(mysqli_real_escape_string($connect_link, md5($_POST['pass_reg'])));
	
	$registration_query = "INSERT INTO users VALUES('','$name_reg','$email_reg','$mob_reg','$pass_reg','0','0','0','0','0')";

	if($registration_query_run = mysqli_query($connect_link, $registration_query))
	{
		echo "Hey $name_reg! You have successfully registered";
	}
	else
	{
		echo 'Something wrong went in your registration';
	}
?>