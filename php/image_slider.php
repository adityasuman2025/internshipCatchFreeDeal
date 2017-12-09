<?php
	//image silder on the homepage
?>
<!--------school image slider---------->
	<ul class="slider">
		<?php
			include('php/connect_db.php');
			$slider_query = "SELECT image FROM image_slider ORDER BY id";

			if($slider_query_run = mysqli_query($connect_link , $slider_query))
			{
				while($slider_query_assoc = mysqli_fetch_assoc($slider_query_run))
				{
					$slider_query_result = $slider_query_assoc['image'];
					echo "<li><img src=\"img/image_slider/$slider_query_result\"/></li>";
				}
				//echo 'ok';
			}
			else
			{
				//echo 'not';
			}

		?>
	</ul>


	<script type="text/javascript" src="js/jquery.bxslider.js"></script>
	<script type="text/javascript">
		/*-----slideshow---*/
		$('.slider').bxSlider(
		{
			mode: 'horizontal',
			auto: true
		});
		
		$(window).on('load', function()
			{ 
				$('.preloader').delay(1000).slideUp('slow'); // will fade out the white DIV that covers the website. 
			});
			
	</script>