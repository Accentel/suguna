

<html>

	<head>
		<?php
			include("header.php");
		?>
		<!-- Load Javascript -->
	<script type="text/javascript" src="login/js/jquery.js"></script>
	<script type="text/javascript" src="login/js/jquery.query-2.1.7.js"></script>
	<script type="text/javascript" src="login/js/rainbows.js"></script>
	<!-- // Load Javascipt -->

	<!-- Load stylesheets -->
	<link type="text/css" rel="stylesheet" href="login/css/style.css" media="screen" />
	<!-- // Load stylesheets -->
	
<script>


	$(document).ready(function(){
 
	$("#submit1").hover(
	function() {
	$(this).animate({"opacity": "0"}, "slow");
	},
	function() {
	$(this).animate({"opacity": "1"}, "slow");
	});
 	});


</script>

	</head>

	<body>

	<div id="conteneur">
		<div id="header"><?php include("title1.php"); ?></div>
			<div id="centre">
				<form action="login_suc.php" method="post" name="frm">
				<p style="margin-top:20px;font-size:22px;color:red;font-family:verdana;" align="center"></p>
				
				<div id="wrapper">
						<div id="wrappertop"></div>

						<div id="wrappermiddle">

							<h2>Login</h2>

							<div id="username_input">

								<div id="username_inputleft"></div>

								<div id="username_inputmiddle">
								
									<input type="text" name="name" required="required" id="url" placeholder="Username" autocomplete="off">
									<img id="url_user" src="login/images/mailicon.png" alt="">
								
								</div>

								<div id="username_inputright"></div>

							</div>

							<div id="password_input">

								<div id="password_inputleft"></div>

								<div id="password_inputmiddle">
								
									<input type="password" name="password" required="required" id="url" placeholder="Password">
									<img id="url_password" src="login/images/passicon.png" alt="">
								
								</div>

								<div id="password_inputright"></div>

							</div>

							<div id="submit">
								
								
								<input type="submit" value="" style="background:url(login/images/submit.png);width:300px;height:40px;" id="submit2" >
								
							</div>


							<div id="links_left">

							<a href="#">Forgot your Password?</a>

							</div>

							<div id="links_right"><a href="#">Not a Member Yet?</a></div>

						</div>

						<div id="wrapperbottom"></div>
						
						<div id="powered">
						
						</div>
					</div>	

				</form>
			</div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

