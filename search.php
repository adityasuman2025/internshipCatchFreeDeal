<?php
	//page for search result 
	// A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)
	include('php/connect_db.php');

	//including header bar
		include('php/header.php');
?>
<html>
<head>
	<title>Search</title>
	
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

	<div class="search_result_div">
		
	</div>
	<br>

	<div class="search_result_div2">
		
	</div>

<!--scripts-------->
<script type="text/javascript">

	search_value = $.trim($('.search_value').text());

	search_value_length = search_value.length;
	
	if(search_value_length > 3)
	{
	/*----searching by name------*/
		query_to_send = "SELECT * FROM content_deal WHERE name LIKE '%" + search_value + "%'";

		$.post('php/deal_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_result_div').append(e);

		});

	/*----searching by provider------*/
		query_to_send = "SELECT * FROM content_deal WHERE provider LIKE '%" + search_value + "%'";

		$.post('php/deal_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_result_div').append(e);

		});

	/*----searching by tags------*/
		query_to_send = "SELECT * FROM content_deal WHERE tag LIKE '%" + search_value + "%'";

		$.post('php/deal_viewer.php', {query_to_send : query_to_send}, function(e)
		{
			//alert(e);
			$('.search_result_div').append(e);

		});

	}
	

		search_result_div_height =	$('.search_result_div').height();
		//alert(search_result_div_height);

		if(search_result_div_height < 100)
		{
			$('.search_result_div2').text('sorry no more result found');
		}
		else
		{
			$('.search_result_div2').text('');
		}

</script>
	
</body>
</html>