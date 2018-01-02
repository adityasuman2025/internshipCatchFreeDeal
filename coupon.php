<?php
//page of coupons
	include ('php/connect_db.php');
/*-header bar---*/
	include('php/header.php');
?>

<html>
<!--- A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)-->
<head>
	<title>Coupons | Catchfreedeal</title>

	<style type="text/css">
		body,html
		{
			background-color: #f1f1f1;
		}
	</style>
</head>
<body>

<div class="page_content">
	<div class="head_content">
	<!----image--slider------>
		<div class="catog_pc_div">
			<h4>Catogories</h4>
			<form action="coupon.php" method="get" class="catog_pc">
					<?php
						$sub_menu_query= "SELECT sub_menu FROM catog_coupon";

						if($sub_menu_assoc_run = mysqli_query($connect_link , $sub_menu_query))
						{
							//getting sub menu
							while($submenu_array = mysqli_fetch_assoc($sub_menu_assoc_run))
							{
								$sub_menu_result = $submenu_array['sub_menu'];
								echo "<input type=\"submit\"  value= \"" .$sub_menu_result."\" name=\"coupon_catog\" class=\"catog_menu_a\"><br>";
							}
						}
					?>
			</form>
		</div>
		
		<div class="image_slider">
			<?php
				include('php/image_slider.php');
			?>
		</div>
	</div>
	<br>

<!------if choosed category or not---------->
	<?php
		if(isset($_GET['coupon_catog']))
		{
			echo "<h4 class=\"choosed_catog_h4\">Coupons > <span class=\"choosed_coupon_catog\">" . $_GET['coupon_catog'] . "<span></h4>";
			echo "<div class=\"choosed_deal\"></div>";
		}
		else
		{
			echo "<div class=\"content_coupon_page\"></div>
					<div class=\"load_more_deal\">load more...</div>";
		}
	?>

<!----footer------>
	<br><br>
	<?php
		include('php/footer.php');
	?>
	
	<div class="content_div_no"></div>
</div>


<script src="js/copy.js" type="text/javascript"></script>
<script type="text/javascript">
/*----for showing result according to selected category--*/
	var choosed_deal_catog = $.trim($('.choosed_coupon_catog').text());
	var query_to_send = "SELECT * FROM content_coupon WHERE tag LIKE '%" + choosed_deal_catog + "%' ORDER BY id DESC LIMIT 30";

	$.post('php/coupon_viewer.php', {query_to_send : query_to_send}, function(e)
	{
		$('.choosed_deal').html(e);

		/*----if there is no coupon of the tag----*/
		suggested_coupon_no = $('.content_coupon_div').length;
		if(suggested_coupon_no ==0)
		{
			$('.choosed_deal').html('<br>sorry no coupons found').css('color', 'red');
		}
		
	});

/*----for getting total no of content div----*/
	content_query_div_no = "SELECT * FROM content_coupon";
	$.post('php/content_coupon.php', {content_query: content_query_div_no}, function(e)
	{
		$('.content_div_no').html(e);
		content_div_no = $('.content_div_no .content_coupon_div').length;
	});

/*----for generatng load more for content deal----*/
	start =0;
	limit = 35;
	org_limit = 35;

	content_query = "SELECT * FROM content_coupon ORDER BY id DESC LIMIT " + start + ", " + limit;
	$.post('php/content_coupon.php', {content_query: content_query}, function(e)
	{
		$('.content_coupon_page').html(e);

	//if initially total no of div is less than limit then load more is not visible
		if(content_div_no <= limit)
		{
			$('.load_more_deal').fadeOut(0);
		}
		else
		{
			$('.load_more_deal').fadeIn(0);
		}
	});

	$('.load_more_deal').click(function()
	{
		limit = limit + org_limit;
		content_query = "SELECT * FROM content_coupon ORDER BY id DESC LIMIT " + start + ", " + limit;
		$.post('php/content_coupon.php', {content_query: content_query}, function(e)
		{
			$('.content_coupon_page').html(e);
			content_deal_page_no = $('.content_coupon_page .content_coupon_div').length;

			if(content_deal_page_no>=content_div_no)
			{
				$('.load_more_deal').fadeOut(0);
			}
		});

		if(content_deal_page_no>=content_div_no)
		{
			$('.load_more_deal').fadeOut(0);
		}

	});

</script>
</body>
</html>