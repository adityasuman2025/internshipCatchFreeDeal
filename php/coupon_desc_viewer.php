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
	$coupon_desc_link = $coupon_desc_data['link'];

	echo "  <div class=\"coupon_desc_image\">
			 	<img src=\"img/coupon/$coupon_desc_image\" onerror=\"this.onerror=null;this.src='img/logo.jpg';\">
			</div>

			<div class=\"coupon_desc_get_code\">
				<h3>$coupon_desc_name</h3>
				<h5>$coupon_desc_provider</h5>";

				if($coupon_desc_code != '')
				{
					echo " 	<br><div class=\"content_coupon_code\">
								<span id=\"p1\">$coupon_desc_code</span>
								<button id=\"copy_code\" onclick=\"copyToClipboard('#p1')\">Copy Code</button>
							</div>";
				}
				
				if($coupon_desc_link != '')
				{
					echo "  <a target=\"_blank\" href=\"$coupon_desc_link\" class=\"coupon_desc_link\">Visit Site</a>
							<br>";
				}

				
		echo "  <span>$coupon_desc_expiry</span>
				
				<div class=\"coupon_desc_desc\">
					$coupon_desc_desc
				</div>
			</div>";

?>

<body>
	<!-----for copying coupon code in clipboard-------->
	<script type="text/javascript">
		function copyToClipboard(element) {
		  var $temp = $("<input>");
		  $("body").append($temp);
		  $temp.val($(element).text()).select();
		  document.execCommand("copy");
		  $temp.remove();
		}

		$('#copy_code').click(function()
		{
			$(this).text('Copied');
		})

	</script>
</body>