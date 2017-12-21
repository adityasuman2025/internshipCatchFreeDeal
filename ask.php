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
				echo "	<script type=\"text/javascript\">

							$('.div_loader').fadeIn(500);
							$('.loader_bckgrnd').fadeIn(500);

							$('.pop_back').fadeIn(500);
							$('.pop_div').fadeIn(500);
							$('.pop_div_content').text('For asking for a deal you need to login first');

						</script>";
			}
			else
			{
				include('php/ask_deal.php');
			}
		?>

	</div>
	
<!----footer------>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php
		include('php/footer.php');
	?>
</div>

</body>
</html>