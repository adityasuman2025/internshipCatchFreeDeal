<?php
	//show the deal acccording the query send
		include('connect_db.php');
		
	//if directyly visiting the page
		if(isset($_POST['query_to_send']))
		{

		}
		else
		{
			die('not allowed');
		}

		$query_to_send = $_POST['query_to_send'];
		$viewer_query_run = mysqli_query($connect_link, $query_to_send);
	
		while($content_coupon_data = mysqli_fetch_assoc($viewer_query_run))
		{
			$content_coupon_id= $content_coupon_data['id'];

			$content_coupon_name= $content_coupon_data['name'];
			$content_coupon_image= $content_coupon_data['image'];
			$content_coupon_desc= $content_coupon_data['desc'];
			$content_coupon_code= $content_coupon_data['code'];
			$content_coupon_expiry= $content_coupon_data['expiry'];
			$content_coupon_provider= $content_coupon_data['provider'];

			echo "<div class=\"content_coupon_div\">

					 <div class=\"content_coupon_image\">
					 	<img src=\"img/coupon/$content_coupon_image\">
					 </div>

					 <div class=\"content_coupon_info\">
						<h3>$content_coupon_name</h3>
						<h4>$content_coupon_provider</h4>
						<span>Valid till: $content_coupon_expiry</span>
						<br>
						<button coupon_id=\"$content_coupon_id\" class=\"coupon_code_button\">Catch Coupon</button>
					</div>

				  </div>";
		}
?>

<!---------loader div-------->
<div class="coupon_loader_bckgrnd">
	
</div>

<div class="coupon_loading_div">
	<button class="close_loader_coupon">X</button>
	<div class="div_coupon_loader">
			
	</div>
</div>


<!--------scripts-------->
<script type="text/javascript">

/*----coupon viewer entry and exit--------*/
	$('.coupon_code_button').click(function()
	{
		$('.coupon_loader_bckgrnd').fadeIn(400);
		$('.coupon_loading_div').fadeIn(400);
	});

	$('.close_loader_coupon').click(function()
	{
		$('.coupon_loader_bckgrnd').fadeOut(400);
		$('.coupon_loading_div').fadeOut(400);
	});

	$('.coupon_loader_bckgrnd').click(function()
	{
		$('.coupon_loader_bckgrnd').fadeOut(400);
		$('.coupon_loading_div').fadeOut(400);
	});

/*--------on clicking get coupon button---*/
	$('.coupon_code_button').click(function()
	{
		coupon_id = $(this).attr('coupon_id');
		$.post('php/coupon_desc_viewer.php', {coupon_id:coupon_id}, function(e)
		{
			$('.div_coupon_loader').html(e);
		});

	});

</script>
