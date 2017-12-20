<?php
	include 'connect_db.php';

	$desc_likes = $_POST['desc_likes'];
	$desc_id = $_POST['desc_id'];
	$like_decr_query= $_POST['like_decr_query'];

	$new_desc_likes = $desc_likes - 1; //new description(desc) likes

	if($like_decr_query_run = mysqli_query($connect_link, $like_decr_query))
	{
		echo $new_desc_likes;
		$cookie_name_decr = "like_decr_" . $desc_id;
		setcookie($cookie_name_decr, $new_desc_likes, time() + 2592000 , "/");

		$cookie_name_incr = "like_incr_" . $desc_id;
		setcookie($cookie_name_incr, $new_desc_likes, time() - 2592000 , "/");
	}
	else
	{
		echo $desc_likes;
	}

?>