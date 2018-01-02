<?php
//header of the site pages
//including the file to connect to the database
	include('php/connect_db.php');
?>

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111428335-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-111428335-1');
	</script>

<!------ad sense---------->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>

	  (adsbygoogle = window.adsbygoogle || []).push({

	    google_ad_client: "ca-pub-7073027541477667",

	    enable_page_level_ads: true

	  });
	</script>


	<!--- A MNgo Creation by: Aditya Suman (http://www.mngo.in/aditya.php)-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">

	<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
	<script>
	  var OneSignal = window.OneSignal || [];
	  OneSignal.push(function() {
	    OneSignal.init({
	      appId: "9b258792-5184-4e52-8e33-f238109fbaf7",
	    });
	  });
	</script>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="fbapp/fb.js"></script>

	<!------meta--tags-->
	<link rel="icon" href="img/logo.jpg" />
	
	<meta name="viewport" content ="width= device-width, initial-scale= 1">
	<meta name="Description" content="CatchFreeDeal is a India's one of the best provider of  deals, coupons, free samples, contests, freebies, recharge offers and free online tips, Sale, Bargins">
	<meta name="Keywords" content="Best Deals, Top Deals online, coupons,deals, coupons, free samples, contests, freebies, recharge offers and free online tips, Sale, Bargins">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="English">
	<meta name="revisit-after" content="1">
	<meta name="author" content="Aditya Suman">
</head>

<body>

<!----------header-----bar-------->
	<div class="header_bar">
		<a href="index.php"><img class="header_logo_img" src="img/logo.jpg"></a>		
		<div class="header_logo_bar">
			<img class="menu_img" src="img/menu_mob.png"/>
			<a href="index.php"><img class="header_logo_mob" src="img/logo_mob.jpg"></a>
			<div class="pc_menu">
				<ul>
					<li><a href="deal.php">Deals</a></li>
					<!----sub menu of deals category------>
						<form action="deal.php" method="get" class="catog_menu">
							<b class="deals_catog_button">Category ></b>
							<div class="deals_catog_options">
								<?php
									$sub_menu_query= "SELECT sub_menu FROM catog_deal";

									if($sub_menu_assoc_run = mysqli_query($connect_link , $sub_menu_query))
									{
										//getting sub menu
										while($submenu_array = mysqli_fetch_assoc($sub_menu_assoc_run))
										{
											$sub_menu_result = $submenu_array['sub_menu'];
											echo "<input type=\"submit\" value= \"" .$sub_menu_result."\" name=\"deal_catog\" class=\"catog_menu_a\"><br>";
										}
									}
								?>
							</div>
						</form>

					<li><a href="coupon.php">Coupons</a></li>
					<!----sub menu of deals category------>
						<form action="coupon.php" method="get" class="catog_menu">
							<b class="coupons_catog_button">Category ></b>
							<div class="coupons_catog_options">
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
							</div>
						</form>

					<li><a href="service.php">Near-By Service</a></li>
					<!----sub menu of service category------>
						<form action="service.php" method="get" class="catog_menu">
							<b class="services_catog_button">Category ></b>
							<div class="services_catog_options">
								<?php
									$sub_menu_query= "SELECT sub_menu FROM catog_service";

									if($sub_menu_assoc_run = mysqli_query($connect_link , $sub_menu_query))
									{
										//getting sub menu
										while($submenu_array = mysqli_fetch_assoc($sub_menu_assoc_run))
										{
											$sub_menu_result = $submenu_array['sub_menu'];
											echo "<input type=\"submit\"  value= \"" .$sub_menu_result."\" name=\"service_catog\" class=\"catog_menu_a\"><br>";
										}
									}
								?>
							</div>
						</form>

					<li><a href="ask.php">Ask For Deal</a></li>

					<form action="index.php" method="get" class="deals_tab_mob">
						<div class="add_tab_mob">
							<button name="deals_tab" value="loot" class="loot_button">Loot Deals</button>
							<button name="deals_tab" value="cashback" class="cashback_button">Cashback Deals</button>
						</div>
					</form>

				<!-----search--bar for pc---->
					<div class="search_bar_div">
						<form action = "search.php" method="get">
							<input class="search_input" placeholder="Search for Deals, Coupons and Services" name="search_input" type="text"/>
							<button type="submit" value="search" class="search_button"><img src="img/search_icon.png"></button>
						</form>
					</div>
				</ul>
			</div>		
		</div>

	<!----user login and register area-->
		<div class="user_area">
			<img class="user_area_img" src="img/user_icon.png"/>
		</div>

	</div>

<!----search bar for mobile---->
	<div class="search_bar_div_mob">
		<form action = "search.php" method="get">
			<input class="search_input_mob" placeholder="Search for Deals, Coupons and Services" name="search_input" type="text">
			<button type="submit" value="search" class="search_button"><img src="img/search_icon.png"></button>
		</form>
	</div>

<!--------header bar 2 (mini)---->
	<div class="header_mini_bar">
		<form action="index.php" method="get" class="deals_tab">
			<button name="deals_tab" value="free" class="free_button">Free Deals</button>
			<button name="deals_tab" value="trend" class="trending_button">Trending Deals</button>
			<button name="deals_tab" value="below_nn" class="below_nn_button">Under &#8377 99</button>
			<button name="deals_tab" value="greater_fifty" class="greater_fifty_button">50% Or More OFF</button>
			<div class="add_tab">
				<button name="deals_tab" value="loot" class="loot_button">Loot Deals</button>
				<button name="deals_tab" value="cashback" class="cashback_button">Cashback Deals</button>
			</div>
		</form>
	</div>

<!---------loader div-------->
	<div class="loader_bckgrnd"></div>

	<div class="div_loader">
		<div class="log_reg_button">
			<button class="login_button">Login</button>
			<button class="register_button">Register</button>
		</div>

	<!--------login-div-------->
		<div class="login_div">
			<?php
				if(!isset($_COOKIE['logged_user_cookie']))
				{
					include('php/login_form.php');
				}
				else
				{
					$logged_user_id =  $_COOKIE['logged_user_cookie'];
					$logged_user_name_query = "SELECT * FROM users WHERE id = '$logged_user_id'";

					$logged_user_name_query_run = mysqli_query($connect_link, $logged_user_name_query);
					$logged_user_name_assoc = mysqli_fetch_assoc($logged_user_name_query_run);
					$logged_user_name = $logged_user_name_assoc['name'];
					$logged_user_email = $logged_user_name_assoc['email'];

					echo "<div class=\"already_logged\">
							Welcome " .$logged_user_name. "!
							</div>";

					include('php/logout_form.php');
				}
			?>
		</div>

	<!--------register div-------->
		<div class="register_div">
			<input type="text" id="name_reg" placeholder="username" maxlength="15">
			<br>
			<span id="name_feed"></span>
			<br>
			<input type="email" id="email_reg" placeholder="email address">
			<br>
			<span id="email_feed"></span>
			<br>
			<input type="number" id="mob_reg" placeholder="mobile number">
			<br>
			<span id="mob_feed"></span>
			<br>
			<input type="password" id="pass_reg" placeholder="password">
			<br><br>
			<input id="re_pass_reg" type="password" placeholder="re-enter password">
			<br>
			<span id="pass_feed"></span>
			<br>
			<span id="random_no">
				<?php
					echo $random_no = rand(1,999);
				?>
			</span>
			<input type="text" placeholder="enter the text" id="random_no_input"/>
			<br><br>
			<button class="register_submit">Register</button>
		</div>

		<div id="reg_feed"></div>
	</div>

<!---------pop up---------->
	<div class="pop_back"></div>
	<div class="pop_div">
		<div class="close_pop">
			<button>X</button>
		</div>
		<div class="pop_div_content">sf</div>
	</div>

<!------scripts---->
<script type="text/javascript">
/*---script for pop up box-------*/
	$('.close_pop button').click(function()
	{
		$('.pop_back').fadeOut(500);
		$('.pop_div').fadeOut(500);
	});

	$('.pop_back').click(function()
	{
		$('.pop_back').fadeOut(500);
		$('.pop_div').fadeOut(500);
	});

/*-----mob menu toogle-------*/
	$('.menu_img').click(function()
	{
		var pc_menu = $('.pc_menu');

		if(pc_menu.hasClass('appear'))
		{
			$('.pc_menu').animate({"left":"-250px"}, 900).removeClass('appear');
		}
		else
		{
			$('.pc_menu').animate({"left":"00px"}, 900).addClass('appear');
		}

	});

/*------category viewing in mobiles--------*/
	(function($) {
	    $.fn.clickToggle = function(func1, func2) {
	        var funcs = [func1, func2];
	        this.data('toggleclicked', 0);
	        this.click(function() {
	            var data = $(this).data();
	            var tc = data.toggleclicked;
	            $.proxy(funcs[tc], this)();
	            data.toggleclicked = (tc + 1) % 2;
	        });
	        return this;
	    };
	}(jQuery));

	//for deals catog
	$('.deals_catog_button').clickToggle(
		function(){$('.deals_catog_options').slideDown(500);},
		function(){$('.deals_catog_options').slideUp(500);}
	);

	//for coupons catog
	$('.coupons_catog_button').clickToggle(
		function(){$('.coupons_catog_options').slideDown(500);},
		function(){$('.coupons_catog_options').slideUp(500);}
	);

	//for services catog
	$('.services_catog_button').clickToggle(
		function(){$('.services_catog_options').slideDown(500);},
		function(){$('.services_catog_options').slideUp(500);}
	);
	
/*----user area entry and exit--------*/
	$('.user_area_img').click(function()
	{
		$('.loader_bckgrnd').fadeIn(400);
		$('.div_loader').fadeIn(400);
	});

	$('.loader_bckgrnd').click(function()
	{
		$('.loader_bckgrnd').fadeOut(400);
		$('.div_loader').fadeOut(400);
	});

/*----user area login and register switching--------*/
	$('.login_button').css('border-bottom','7px solid #cc0000');

	$('.register_button').click(function()
	{
		$('.register_div').fadeIn(200);
		$('.login_div').fadeOut(0);
		$('#reg_feed').fadeIn(200);
		$('.register_button').css('border-bottom','7px solid #cc0000');
		$('.login_button').css('border-bottom','0px solid #cc0000');
	});

	$('.login_button').click(function()
	{
		$('.login_div').fadeIn(200);
		$('.register_div').fadeOut(0);
		$('#reg_feed').fadeOut(0);
		$('.login_button').css('border-bottom','7px solid #cc0000');
		$('.register_button').css('border-bottom','0px solid #cc0000');
	});

//varyfying variables for registration
	pass_val = 0;
	email_val = 0;
	name_val = 0;
	mob_val = 0;

	random_val = 0;

	name_reg = $('#name_reg').val();
	pass_reg = $('#pass_reg').val();
	re_pass_reg = $('#re_pass_reg').val();
	email_reg = $('#email_reg').val();
	mob_reg = $('#mob_reg').val();

/*---random text varification--------*/
	$('#random_no_input').keyup(function()
	{
		random_no_input = $('#random_no_input').val();
		random_no = $.trim($('#random_no').html());
		 
		if(random_no_input == random_no)
		{
			random_val = 1;
			//alert('gud');
		}
		else
		{
			random_val = 0;
		}

	});

/*----name varification--*/
	$('#name_reg').keyup(function()
	{
		name_reg = $('#name_reg').val();
	
		if(name_reg !='')
		{
			name_val = 1;
		}
		else
		{
			name_val = 0;
		}
	});
		
/*--mobile no varification--*/
	$('#mob_reg').keyup(function()
	{
		mob_reg_length = $('#mob_reg').val().length;
		if(mob_reg_length>10)
		{
			mob_val = 0;
		}
		else if (mob_reg_length == 10)
		{
			mob_val = 1;
		}
		else
		{
			mob_val = 0;
		}
	});

/*----password varification-----*/
	$('#pass_reg').keyup(function()
	{
		pass_reg = $('#pass_reg').val();
		re_pass_reg = $('#re_pass_reg').val();
	
		if(pass_reg !='' && re_pass_reg !='')
		{
			if(pass_reg != re_pass_reg && re_pass_reg != pass_reg)
			{
				pass_val = 0;
			}
			else
			{
				pass_val = 1;
			}
		}
		else
		{	
			pass_val = 0;
		}
	});

	$('#re_pass_reg').keyup(function()
	{
		pass_reg = $('#pass_reg').val();
		re_pass_reg = $('#re_pass_reg').val();
	
		if(pass_reg !='' && re_pass_reg !='')
		{
			if(pass_reg != re_pass_reg && re_pass_reg != pass_reg)
			{
				pass_val = 0;
			}
			else
			{
				pass_val = 1;
			}
		}
		else
		{
			pass_val = 0;
		}
	});

/*----email varification-----*/
	$('#email_reg').keyup(function()
	{
		email= $.trim($('#email_reg').val());
		if(email!='')
		{
			$.post('php/email.php',{email: email},function(e)
			{	
				if(e=="1")
				{
				//varyfing if that email already exists
					$.post('php/email_existing_varification.php', {email: email}, function(e)
					{
						//$('#email_feed').text(e);
						if(e==1)
						{
							email_val = 1;
						}
						else
						{
							email_val = 2;
						}
					});		
				}
				else
				{
					email_val = 0;
				}
			});
		}
		else
		{
			email_val = 0;
		}
	});
	
/*----on clicking login button-----*/
	$('.register_submit').click(function()
	{
		name_reg = $('#name_reg').val();
		pass_reg = $('#pass_reg').val();
		re_pass_reg = $('#re_pass_reg').val();
		email_reg = $('#email_reg').val();
		mob_reg = $('#mob_reg').val();

	//name varification
		if(name_val == 0)
		{
			$('#name_feed').text('Kindly enter your name').css('color','red');
		}
		else
		{
			$('#name_feed').text('');
		}

	//mobile number varification
		if(mob_val == 0)
		{
			$('#mob_feed').text('Please enter a valid mobile number').css('color','red');
		}
		else
		{
			$('#mob_feed').text('');
		}

	//password varification
		if(pass_val == 0)
		{
			$('#pass_feed').text('Password do no match').css('color','red');
		}
		else
		{
			$('#pass_feed').text('Password match').css('color','green');
		}

	//email varification
		if(email_val == 0)
		{
			$('#email_feed').text('Invalid email address').css('color','red');
		}
		else if(email_val == 2)
		{
			$('#email_feed').text('Email already exists').css('color','red');
		}
		else
		{
			$('#email_feed').text('Valid email address').css('color','green');
		}


	/*----ajax to register the user---*/
		if(pass_val == 1 && email_val==1 && name_val==1 && random_val == 1 && mob_val ==1)
		{
			$.post('php/register.php', {name_reg : name_reg, pass_reg : pass_reg, email_reg : email_reg, mob_reg : mob_reg}, function(e)
			{
				$('#reg_feed').css('padding','5px').text(e).delay(3000).fadeOut(500);
				$('.register_div').fadeOut(0);
				$('.login_div').fadeIn(200);
			});

		}
		else
		{
			$('#reg_feed').css('margin-top', 'auto').text('Fill all the required fields correctly');
		}

	});
</script>
</body>
