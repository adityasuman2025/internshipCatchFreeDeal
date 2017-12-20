<?php 
	//user logout form
?>

<br>
<button name="logout" class="logout_button">Log Out</button>
<br>
<span class="forgot_pass">Change Password</span>
<br>
<br>

<div class="new_pass_div">
	<input type="password"  placeholder="enter your new password" id="new_pass_input"/>
	<br>
	<br>
	<input type="password" placeholder="confirm your password" id="new_pass_cnfrm_input"/>
	<br><br>

	<button class="new_pass_button">Set</button>
</div>
<br>

<span class="new_pass_feed"></span>
<span id="logout_feed"></span>


<script type="text/javascript">
/*----on clicking on logout button--------*/
	$('.logout_button').click(function()
	{	
		$.post('php/logout_user.php', {}, function(data)
		{
			if(data==1)
			{
				$('#logout_feed').text('You successfully logged out');

				//for refreshing the page after successfully logout of user
				location.reload();
			}
			else
			{
				$('#logout_feed').text('Something went wrong while logging out');
			}
		});

	});

/*-----script for forgot password-----*/
	$('.forgot_pass').click(function()
	{
		$('.new_pass_div').fadeIn(100);
	});

/*-----on clicking on set password button-------*/
	$('.new_pass_button').click(function()
	{
		new_password = $.trim($('#new_pass_input').val());
		new_cnfrm_password = $.trim($('#new_pass_cnfrm_input').val());
		recovery_email = "<?php echo $logged_user_email ?>";
		//alert(recovery_email);

		if(new_password == new_cnfrm_password & new_password != '')
		{
			$.post('php/recover_pass.php', {new_password: new_password , recovery_email: recovery_email}, function(g)
			{
				if(g == 1)
				{
					$('.new_pass_feed').text('Congrats! You have successfully changed your password.').css('color','green');
					$('.new_pass_div').fadeOut(500);
					$('.forgot_pass').fadeOut(500);
				}
				else
				{
					$('.new_pass_feed').text('Something went wrong! Your password failed to change.').css('color', 'red');
				}
			});
		}
		else
		{
			$('.new_pass_feed').text('Your password do not match or your input is blank. Please try again').css('color', 'red');
		}
		
	});			

</script>