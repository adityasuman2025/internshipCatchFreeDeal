<?php
	//page for search result 
	// A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)
	include('php/connect_db.php');

	//including header bar
		include('php/header.php');
?>
<html>
<head>
	<title>Search | Catchfreedeal</title>
	
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
	
	<div class="search_value">
		<?php
			$search_value = $_GET['search_input'];
			echo $search_value;
		?>
	</div>
	<br>

	<div class="search_result_div"></div>
	
	<div class="search_result_div2"></div>
	<br>
	
<!----footer------>
	<?php
		include('php/footer.php');
	?>

<!--scripts-------->
<script type="text/javascript">

	search_value = $.trim($('.search_value').text());

	search_value_length = search_value.length;
	
	if(search_value_length >= 3)
	{
	/*----searching deal by name------*/
		query_to_send = "SELECT * FROM content_deal WHERE name LIKE '%" + search_value + "%'";

		$.post('php/deal_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_result_div').append(e);

		});

	/*----searching deal by provider------*/
		query_to_send = "SELECT * FROM content_deal WHERE provider LIKE '%" + search_value + "%'";

		$.post('php/deal_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_result_div').append(e);

		});

	/*----searching deal by tags------*/
		query_to_send = "SELECT * FROM content_deal WHERE tag LIKE '%" + search_value + "%'";

		$.post('php/deal_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_result_div').append(e);

		});

	/*----searching coupon by provider------*/
		query_to_send = "SELECT * FROM content_coupon WHERE provider LIKE '%" + search_value + "%'";

		$.post('php/coupon_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_result_div').append(e);

		});

	}
	

	//location of no results found div
		search_result_div_height =	$('.search_result_div').height();
		//alert(search_result_div_height);

		if(search_result_div_height < 100)
		{
			$('.search_result_div2').text('sorry no more results found');
		}
		else
		{
			$('.search_result_div2').text('');
		}

</script>
	
</body>
</html>