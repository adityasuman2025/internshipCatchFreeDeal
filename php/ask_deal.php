<br>
<div class="ask_text_div">
	<div class="ask_name">
		<?php
			$logged_user_id =  $_COOKIE['logged_user_cookie'];
			$logged_user_name_query = "SELECT * FROM users WHERE id = '$logged_user_id'";

			$logged_user_name_query_run = mysqli_query($connect_link, $logged_user_name_query);
			$logged_user_name_assoc = mysqli_fetch_assoc($logged_user_name_query_run);

			$logged_user_name = $logged_user_name_assoc['name'];
			$logged_user_email = $logged_user_name_assoc['email'];
			echo "Hello " . $logged_user_name . "! write your query here.";
		?>
	</div>
	<textarea class="ask_text"></textarea>
	<br><br>
	<input type="submit" value="Ask" class="ask_button"/>
</div>
<br>

<div class="ask_feed"></div>


<script type="text/javascript">
	$('.ask_button').click(function()
	{
		ask_text = $('.ask_text').val();

		mail_email = "info@catchfreedeal.com";
		mail_subject= "<?php echo $logged_user_email; ?>" + " asked";
		mail_body= ask_text + "\n \n " + "<?php echo $logged_user_name; ?> \n" + "<?php echo $logged_user_email; ?>";
		mail_header= "From: <?php echo $logged_user_name; ?> <<?php echo $logged_user_email; ?>>";

		$.post('php/mailing.php', {mail_email: mail_email, mail_subject: mail_subject, mail_body: mail_body , mail_header: mail_header}, function(f)
		{
			if(f== 1)
			{
				$('.ask_text_div').fadeOut(0);
				$('.ask_feed').text('Your request have been successfully submitted').css('color', 'green');
			}
			else
			{
				$('.ask_feed').text('Something went wrong').css('color', 'red');
			}
		});

	});
</script>