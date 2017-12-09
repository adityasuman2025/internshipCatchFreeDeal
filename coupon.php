<?php
	//page of coupons
	// A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)
		include ('php/connect_db.php');
	/*-header bar---*/
		include('php/header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Coupons | Catchfreedeal</title>

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

<br><br>
<br><br>
<br>

<!--content of the coupon page-->
<?php
	include('php/content_coupon.php');
?>



<?php
//----footer------>
	include('php/footer.php');
?>

</body>
</html>