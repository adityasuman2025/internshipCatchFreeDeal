<?php
//it shows the descrition of the selected coupon
	if(isset($_POST['coupon_id']))
		{
			//echo 'ok';
		}
		else
		{
			die('not allowed');
		}

	include('connect_db.php');

	$coupon_id = $_POST['coupon_id'];
	
	$coupon_desc_query = "SELECT * FROM content_coupon WHERE id = '$coupon_id'";
	$coupon_desc_query_run = mysqli_query($connect_link, $coupon_desc_query);

	$coupon_desc_data = mysqli_fetch_assoc($coupon_desc_query_run);

	$coupon_desc_name = $coupon_desc_data['name'];
	$coupon_desc_image = $coupon_desc_data['image'];
	$coupon_desc_desc = $coupon_desc_data['desc'];
	$coupon_desc_code = $coupon_desc_data['code'];
	$coupon_desc_expiry = $coupon_desc_data['expiry'];
	$coupon_desc_provider = $coupon_desc_data['provider'];

	echo " <h3>$coupon_desc_name</h3>
			<div class=\"coupon_desc_image\">
			 	<img src=\"img/coupon/$coupon_desc_image\">
			</div>

			<div class=\"coupon_desc_get_code\">
				<p class=\"content_coupon_code\">$coupon_desc_code</p>
				<h5 style=\"color: grey\">$coupon_desc_provider</h5>
				
				<span>Expiry: $coupon_desc_expiry</span>
				
			</div>

			<div class=\"coupon_desc_desc\">
				$coupon_desc_desc
			</div>
			";

?>