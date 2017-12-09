<?php
	//page of deals
	// A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)
		include ('php/connect_db.php');
	/*-header bar---*/
		include('php/header.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Deals | Catchfreedeal</title>

	<style type="text/css">
		body,html
		{
			background-color: #f1f1f1;
			//text-align: center;
		}
	</style>

	<!------meta--tags-->
	<meta name="viewport" content ="width= device-width, initial-scale= 1">
</head>
<body>
<br><br>

<!--content of the coupon page-->
<?php
	if(isset($_GET['deal_catog']))
	{
		echo "<div class=\"choosed_deal_catog\">";
		echo $_GET['deal_catog'];
		echo "</div>";
		echo "<br><br>";
		
		echo "<div class=\"choosed_deal\"></div>";
	}
	else
	{
		echo "<br><br><br>";
		include('php/content_deal.php');
	}
	
?>

<?php
//----footer------>
	include('php/footer.php');
?>


<!---script for getting deal from choosed option---->
	<script type="text/javascript">
		var choosed_deal_catog = $.trim($('.choosed_deal_catog').text());
		
		var query_to_send = "SELECT * FROM content_deal WHERE tag LIKE '%" + choosed_deal_catog + "%'";
		$.post('php/deal_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			$('.choosed_deal').html(e);
		});

	</script>
</body>
</html>