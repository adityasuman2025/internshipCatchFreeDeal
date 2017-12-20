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
	<h4 class="content_deal_h4">Deals</h4>
	<div class="search_deal_div"></div>
	
	<div class="search_result_div2">
		no more results found
	</div>
	<br>

<!-----search coupon result-------->
	<h4 class="content_deal_h4">Coupons</h4>
	<div class="search_coupon_div"></div>
	
	<div class="search_result_div2">
		no more results found
	</div>
	<br>
	
<!-----search service result-------->
	<h4 class="content_deal_h4">Services</h4>
	<div class="search_service_div"></div>
	
	<div class="search_result_div2">
		no more results found
	</div>

<!----footer------>
	<br><br>
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
			//alert(e);
			$('.search_deal_div').append(e);

		});

	/*----searching deal by provider------*/
		query_to_send = "SELECT * FROM content_deal WHERE provider LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

		$.post('php/deal_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_deal_div').append(e);

		});

	/*----searching deal by tags------*/
		query_to_send = "SELECT * FROM content_deal WHERE tag LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

		$.post('php/deal_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_deal_div').append(e);

		});

	/*----searching coupon by provider------*/
		query_to_send = "SELECT * FROM content_coupon WHERE provider LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

		$.post('php/coupon_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_coupon_div').append(e);

		});

	/*----searching service by provider------*/
		query_to_send = "SELECT * FROM content_service WHERE provider LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

		$.post('php/service_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_service_div').append(e);

		});

	/*----searching service by location------*/
		query_to_send = "SELECT * FROM content_service WHERE location LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

		$.post('php/service_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_service_div').append(e);

		});


	/*----searching service by tag------*/
		query_to_send = "SELECT * FROM content_service WHERE tag LIKE '%" + search_value + "%' ORDER BY id DESC LIMIT 15";

		$.post('php/service_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_service_div').append(e);

		});

	}
	
</script>
	
</body>
</html>