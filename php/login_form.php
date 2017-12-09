<?php 
	//user login form
?>

<div class="new_login_div">
	<input type="email" id="email_login" placeholder="email address">
	<br>
	<span id="email_feed_login"></span>
	<br>
	<input id="pass_login" type="password" placeholder="password">
	<br>
	<br>
	<span id="random_no_login">
		<?php
			echo $random_no = rand(1,999);
		?>
	</span>
	<input type="text" placeholder="enter the text" id="random_no_login_input"/>
	<br><br>
	<button class="login_submit">Login</button>
	<br><br>
	<span id="login_feed"></span>
	<br>

	<div class="fb-login-button" data-scope = "public_profile,email" onlogin="checkLoginState();">
		Login From Facebook
	</div>
	<br><br>
	<!-- 
	<button class="google_login_button" >Login With Google</button>
 -->
</div>

<script type="text/javascript">
	//variables for login
		pass_val = 0;
		email_val_login = 0;
		random_val_login = 0;

	/*----email varification for login-----*/
		$('#email_login').keyup(function()
		{
			var email= $('#email_login').val();

			if(email!='')
			{
				$.post('php/email.php',{email: email},function(e)
				{	
					if(e=="1")
					{
						$('#email_feed_login').text('Valid email address').css('color','green');
						email_val_login = 1;
					}
					else
					{
						$('#email_feed_login').text('Invalid email address').css('color','red');
						email_val_login = 0;
					}
					
				});
			}
			else
			{
				$('#email_feed_login').text('');
				email_val_login = 0;
			}

		});

	/*---random text varification--------*/
		$('#random_no_login_input').keyup(function()
		{
			random_no_login_input = $('#random_no_login_input').val();
			random_no_login = $.trim($('#random_no_login').html());
			 
			if(random_no_login_input == random_no_login)
			{
				random_val_login = 1;
				//alert('gud');
			}
			else
			{
				random_val_login = 0;
			}

		});

	/*-----on clicking login submit button--------*/
		$('.login_submit').click(function()
		{
			email_login = $('#email_login').val();
			pass_login = $('#pass_login').val();
	
			if(random_val_login == 1)
			{
				$.post('php/user_login.php',{email_login: email_login, pass_login: pass_login }, function(e)
				{
					logged_user_id = e;

					if(e==0)
					{
						$('#login_feed').text('Your login information is not correct').css('color','red');
					}
					else
					{
						$('#login_feed').text('Welcome! Your id = ' + logged_user_id);
						
						//for refreshing the page after successfully login of user
						location.reload();
					}

				});
			}
			else
			{
				$('#login_feed').text('Enter the text correctly').css('color','red');
			}
			

		});

	/*------on clicking login google button -----*/
	
		// function onSignIn(googleUser)
		// {
		// 	profile = googleUser.getBasicProfile();
		// 	email_reg_google = profile.getEmail();
		// 	name_reg_google = profile.getName();
		// 	//alert(name_reg_google);
			
		// 	$.post('php/reg_google.php', {email_reg_google: email_reg_google, name_reg_google: name_reg_google}, function(e)
		// 	{
		// 		//alert(e);
		// 		//location.reload();
		// 	});
		// }

</script>