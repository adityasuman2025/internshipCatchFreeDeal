<?php
	include ('php/connect_db.php');
/*-header bar---*/
	include('php/header.php');
?>

<html>
<!--- A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)-->
<head>
	<title>Ask | Catchfreedeal</title>
	<style type="text/css">
		body,html
		{
			background-color: #f1f1f1;
		}
	</style>
</head>
<body>

<div class="page_content">
	
	<div class="ask_page">
		<?php
			if(!isset($_COOKIE['logged_user_cookie']))
			{
				echo "For asking for a deal you need to login first.";
			}
			else
			{
				include('php/ask_deal.php');
			}
		?>

	</div>
	
	<!----footer------>
		<br><br>
		<?php
			include('php/footer.php');
		?>
</div>

</body>
</html>