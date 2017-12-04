<div class="content_page">
	<?php
	//content of the deal content

		$content_query="SELECT * FROM content_deal ORDER BY id DESC";
		$content_query_run = mysqli_query($connect_link, $content_query);
	
		while($content_query_data = mysqli_fetch_assoc($content_query_run))
		{
			$content_id = $content_query_data['id'];
			
			$content_image = $content_query_data['image'];
			$content_provider = $content_query_data['provider'];
			$content_name = $content_query_data['name'];
			$content_org_price = $content_query_data['org_price'];
			$content_off = $content_query_data['off'];
			$content_price = $content_query_data['price'];
			$content_deal = $content_query_data['deal'];

			echo "<div class=\"content_div\">
					<div class=\"content_info\">
						<div class=\"content_image\">
							<img src=\"img/content/$content_image \"/>
						</div>

						<div class=\"content_data\">
							<span id=\"content_provider\">
								$content_provider
							</span>
							<br>
							<span id=\"content_name\">
								$content_name
							</span>
						</div>
					</div>
					
					<div class=\"content_price_div\">
						<span id=\"content_price\">
							&#8377 $content_price
						</span>
						<br>
						<span id=\"content_off\">
							$content_off%
						</span>

						<span id=\"content_org_price\">
							&#8377 $content_org_price
						</span>

						<form method=\"post\" action=\"desc_viewer.php\">
							<input type=\"text\" name=\"content_deal_id\" id=\"content_deal_id\" value=\"$content_id\"/>
							<input type=\"submit\" name =\"content_deal\" id=\"content_deal\" value=\"Get Deal\"/>
						</form>
					</div>
					
				  </div>";
			//echo "done <br>";
		}
	?>
</div>