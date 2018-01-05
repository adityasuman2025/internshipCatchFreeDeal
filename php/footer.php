<?php
	//footer of the site pages
?>
<div class="footer_div">
	<div class="email_subs">
		<img src="img/email_subs.png"/>
		<br>
		<span class="email_subs_text">Subscribe to our mail alert of new deals and coupons</span>
		<br>
		<input type="email" placeholder="type your email id here"/>
		<button> Subscribe</button>
		<br>
		<span class="email_subs_feed"></span>
	</div>


	<div class="footer">
		<div class="row">
			<div class="col-xs-12 col-md-4 add">
				<img src="img/logo.png">
			</div>

			<div class="col-xs-12 col-md-4 site_map">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="deal.php">Deals</a></li>
					<li><a href="coupon.php">Coupons</a></li>
					<li><a href="service.php">Near-By Service</a></li>
				</ul>

				<ul>
					<li><a href="career.php">Career With US</a></li>
					<li><a href="advertise.php">Advertise With US</a></li>
					<li><a href="privacy.php">Privacy Policy</a></li>
					<li><a href="terms.php">Terms & Conditions</a></li>
					<li><a href="sitemap.php">Sitemap</a></li>
				</ul>	
			</div>
		
			<div class="col-xs-12 col-md-4 social">
				<h5>Write Us</h5>
				<a href="mailto:info@catchfreedeal.com"><img src="img/social/mail.png">info@catchfreedeal.com</a>
				<br><br>
				
				<h5>Follow Us</h5>
				<a target="_blank" href="https://www.facebook.com/Catchfreedeal-323090278168567/"><img src="img/social/fb.png"></a>
				<a target="_blank" href="https://twitter.com/@CatchFreeDeal"><img src="img/social/twitter.png"></a>
				<a target="_blank" href="https://plus.google.com/communities/106379394105002108410?sqinv=Z1hZVzR6NTNZZWljNlRXT193a0JEZTJrbklNeEpn"><img src="img/social/gplus.png"></a>
				<a target="_blank" href="https://www.linkedin.com/in/catchfreedeal"><img src="img/social/linkedin.png"></a>
				<a target="_blank" href="https://www.youtube.com/playlist?list=PLK_2uS3WxUHknu1Gy_F8Y0EgZJ1wyrLZy"><img src="img/social/youtube.png"></a>

		</div>
		</div>
	</div>

	<div class="final_footer">
		&copy 2017 Catchfreedeal | All Right Reserved | 
		Designed & Developed by: <a target="_blank" href="http://mngo.in">MNgo</a>
		
		<br>
	<!--links to run in nbackground------>
		<?php
			include('php/run_link.php');
		?>
	</div>

</div>
	
<!----script for email subscription---->
<script type="text/javascript">
	
/*----email varification for email susbscription-----*/
	$('.email_subs input').keyup(function()
	{
		var email_subs= $('.email_subs input').val();

		if(email_subs!='')
		{
			$.post('php/email.php',{email: email_subs},function(e)
			{	
				if(e=="1")
				{
					$('.email_subs_feed').text('valid email address').css('color','white');
					email_val_login = 1;
				}
				else
				{
					$('.email_subs_feed').text('invalid email address').css('color','white');
					email_val_login = 0;
				}
				
			});
		}
		else
		{
			$('.email_subs_feed').text('');
			email_val_login = 0;
		}

	});

/*---on clicking subscribe button----*/
	$('.email_subs button').click(function()
	{
		email_subs_email = $('.email_subs input').val();
		
		$.post('php/email_subs.php', {email_subs_email: email_subs_email}, function(e)
		{
			if(e == 1)
			{
				$('.email_subs_feed').text('You are successfully subscribed');
			}
			else
			{
				$('.email_subs_feed').text('Something went wrong in your subscription');
			}

		});

	});

</script>