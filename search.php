<?php
//page for search result 
	include('php/connect_db.php');

//including header bar
	include('php/header.php');
?>
<html>
<!--- A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)-->
<head>
	<title>Search | Catchfreedeal</title>
	
	<style type="text/css">
		body,html
		{
			background-color: #f1f1f1;
		}
	</style>
</head>
<body>

<div class="page_content">	

<!-----search deal result-------->
	<h4 class="content_deal_h4" id="deal_h">Deals</h4>
	<div class="search_deal_div"></div>
	
	<br>

<!-----search coupon result-------->
	<h4 class="content_deal_h4" id="coupon_h">Coupons</h4>
	<div class="search_coupon_div"></div>
	
	<br>
	
<!-----search service result-------->
	<h4 class="content_deal_h4" id="service_h">Services</h4>
	<div class="search_service_div"></div>
	
	<div class="deals_div"></div>
	

<!----footer------>
	<br><br><br><br><br><br><br><br><br><br><br>
	<?php
		include('php/footer.php');
	?>

</div>

<!--scripts-------->
<script type="text/javascript">

	search_value = "<?php echo $_GET['search_input'] ?>";
	search_value_length = search_value.length;
	
	if(search_value_length >= 3)
	{
	/*----searching deal by name------*/
		query_to_send = "SELECT * FROM content_deal WHERE name LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

		$.post('php/deal_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			$('.search_deal_div').append(e);

		/*----searching deal by provider------*/
			query_to_send = "SELECT * FROM content_deal WHERE provider LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

			$.post('php/deal_viewer.php', {query_to_send : query_to_send}, function(e)
			{
				$('.search_deal_div').append(e);

			/*----searching deal by tags------*/
				query_to_send = "SELECT * FROM content_deal WHERE tag LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

				$.post('php/deal_viewer.php', {query_to_send : query_to_send}, function(e)
				{
					$('.search_deal_div').append(e);
					searched_deal = $('.search_deal_div .content_div').length;
					//alert(searched_deal);

					if(searched_deal == 0)
					{
						$('.search_deal_div').fadeOut(0);
						$('#deal_h').fadeOut(0);
					}
					else
					{
						$('.search_deal_div').fadeIn(0);
						$('#deal_h').fadeIn(0);
					}
				});
			});

		});

	/*----searching coupon by provider------*/
		query_to_send = "SELECT * FROM content_coupon WHERE provider LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

		$.post('php/coupon_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_coupon_div').append(e);
			searched_coupon= $('.search_coupon_div .content_coupon_div').length;
			//alert(searched_coupon);

			if(searched_coupon == 0)
			{
				$('.search_coupon_div').fadeOut(0);
				$('#coupon_h').fadeOut(0);
			}
			else
			{
				$('.search_coupon_div').fadeIn(0);
				$('#coupon_h').fadeIn(0);
			}
		});

	/*----searching service by provider------*/
		query_to_send = "SELECT * FROM content_service WHERE provider LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

		$.post('php/service_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_service_div').append(e);
		/*----searching service by location------*/
			query_to_send = "SELECT * FROM content_service WHERE location LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

			$.post('php/service_viewer.php', {query_to_send : query_to_send}, function(e)
			{
				//alert(e);
				$('.search_service_div').append(e);
			/*----searching service by tag------*/
				query_to_send = "SELECT * FROM content_service WHERE tag LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

				$.post('php/service_viewer.php', {query_to_send : query_to_send}, function(e)
				{
					//alert(e);
					$('.search_service_div').append(e);
					searched_service= $('.search_service_div .content_service_div').length;
					//alert(searched_service);

					if(searched_service == 0)
					{
						$('.search_service_div').fadeOut(0);
						$('#service_h').fadeOut(0);
					}
					else
					{
						$('.search_service_div').fadeIn(0);
						$('#service_h').fadeIn(0);
					}

				/*-------if no deal no service and not any coupon is found----------*/
					if(searched_service ==0 && searched_deal ==0 && searched_coupon ==0)
					{
						$('.deals_div').html("sorry no such deals found at the moment").css('color', 'red');
					}

				});
			});
		});
	}
	
</script>
	
</body>
</html>