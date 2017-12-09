<?php
	//deleting cookie for logging out
	if(setcookie('logged_user_cookie', '' , time() - 2592000, "/"))
	{
		echo 1;	
	}
	else
	{
		echo 0;
	}

 ?>