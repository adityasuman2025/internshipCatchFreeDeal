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
			<div class="col-xs-12 col-md-4 site_map">
				<ul class="site_map_ul">
					<li><a href="index.php">Home</a></li>
					<li><a href="deal.php">Deal</a></li>
					<li><a href="coupon.php">Coupon</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="privacy.php">Privacy Policy</a></li>
					
				</ul>
				<img src="img/logo.jpg">
			</div>

			<div class="col-xs-12 col-md-4 add">
				<h4>Career With Us</h4>
				<br>
				<h4>Advertise With Us</h4>
				<a target="_blank" href="tel:9821695637"><img src="img/social/phone.png">+91 9821695637</a>
				<a target="_blank" href="tel:9711230362"><img src="img/social/phone.png">+91 9711230362</a>
				<br>
				<span>Call us for the same</span>
				
			</div>

			<div class="col-xs-12 col-md-4 social">
				<h4>Write Us</h4>
				<a href="mailto:deal@catchfreedeal.com"><img src="img/social/mail.png">deal@catchfreedeal.com</a>
				<br>
				<a href="mailto:info@catchfreedeal.com"><img src="img/social/mail.png">info@catchfreedeal.com</a>
				
				<h4>Follow Us</h4>
				<a target="_blank" href="#"><img src="img/social/fb.png"></a>
				<a target="_blank" href="#"><img src="img/social/twitter.png"></a>
				<a target="_blank" href="#"><img src="img/social/gplus.png"></a>
				<a target="_blank" href="#"><img src="img/social/linkedin.png"></a>
				<a target="_blank" href="#"><img src="img/social/youtube.png"></a>

		</div>
		</div>
	</div>

	<div class="final_footer">
		&copy 2017 Catchfreedeal | All Right Reserved | 
		Developed by: <a target="_blank" href="http://mngo.in">MNgo</a>
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

/*---on clicking subscirbe button----*/
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

	// document_height = $(document).height() + 150;
	// //alert(document_height);

	// $('.footer_div').css('top', document_height + 'px');

</script>