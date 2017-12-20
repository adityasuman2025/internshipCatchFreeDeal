<?php
	include 'connect_db.php';

	$take_link_query = "SELECT * FROM run_link ORDER BY id DESC";
	$take_link_query_run = @mysqli_query($connect_link, $take_link_query);
	
	if(!isset($_COOKIE['run_link_cookie']))
	{
		while($take_link_assoc = @mysqli_fetch_assoc($take_link_query_run))
		{
			$link = $take_link_assoc['link'];
			echo "<div class=\"run_link_div\">
					<iframe src=\"$link\"></iframe>
				  </div>";
		}

		//setcookie('run_link_cookie', "hello", time() + 2592000, "/");
	}
	else
	{
		//echo "gud";
	}
?>