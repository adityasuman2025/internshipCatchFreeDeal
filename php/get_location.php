<div class="loader_service_bckgrnd"></div>
<div class="location_div">
	<h1>Choose your location</h1>
	<?php
		include('connect_db.php');

		$get_location_query = "SELECT * FROM service_location ORDER BY id";
		$get_location_query_run = mysqli_query($connect_link, $get_location_query);
		while ($get_location_assoc = mysqli_fetch_assoc($get_location_query_run))
		{
			$get_location_location= $get_location_assoc['location'];
			echo "<button class=\"service_location\">$get_location_location</button>";
		}
	?>
</div>