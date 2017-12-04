<?php
	// A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)
		include ('php/connect_db.php');
	/*-header bar---*/
		include('php/header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
	<style type="text/css">
		body,html
		{
			background-color: #f1f1f1;
		}
	</style>

	<!------meta--tags-->
	<meta name="viewport" content ="width= device-width, initial-scale= 1">
</head>
<body>


<!----image--slider------>
	<?php
		include('php/image_slider.php');
	?>
	<br>

<!-----user views div-------->
	<div class="viewed_deal_div">
		<?php
			if(!isset($_COOKIE['logged_user_cookie']))
			{
				echo 'You have no recent views';	
			}
			else
			{
				echo "<h3>Your Last Views</h3>";
				include ('php/prev_views.php');
			}
		?>
	</div>
	<br>

<!-----content-deal---->
	<h3 style="padding: 10px;">Latest Deals</h3>
	<?php
		include('php/content_deal.php');
	?>

</body>
</html>