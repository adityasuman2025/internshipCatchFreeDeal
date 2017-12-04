<?php 
	//user logout form
?>

<br>
<button name="logout" class="logout_button">Log Out</button>
<br>
<span id="logout_feed"></span>


<script type="text/javascript">
	$('.logout_button').click(function()
	{	

		$.post('php/logout_user.php', {}, function(data)
		{
			//alert(data);
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
</script>