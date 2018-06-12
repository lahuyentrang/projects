<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
		// connect db
	include('includes/connect_db.php');

		// check exist
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$result = $conn->query($sql);
		// if ($result) {
		// 		// success = do st here
		// }

		$user = $result->fetch(); // fetchAll();
		if ($user) {
			// $session
			$_SESSION['user'] = $user;

			// redirect
			header('Location: index.php');
		}

		// $error
		$error = 'Incorrect username or password!';
	}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!-- General meta information -->
		<title>Login Form </title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="robots" content="index, follow" />
		<meta charset="utf-8" />
		<!-- // General meta information -->
		
		<!-- Load Javascript -->
		<script type="text/javascript" src="./js/jquery.js"></script>

		<!-- Load stylesheets -->
		<link type="text/css" rel="stylesheet" href="css/style.css" media="screen" />
		<!-- // Load stylesheets -->

	</head>
	<body>
		<form action="" method="POST">
			<div id="wrapper">
				<div id="wrappertop"></div>

				<div id="wrappermiddle">

					<h2>Login</h2>

					<?php if (isset($error)): ?>
						<p><strong><?php echo $error; ?></strong></p>
					<?php endif; ?>

					<div id="username_input">

						<div id="username_inputleft"></div>

						<div id="username_inputmiddle">


							<input type="text" name="username" id="url"   placeholder="username">
							<img id="url_user" src="./images/mailicon.png" alt="">

						</div>

						<div id="username_inputright"></div>

					</div>

					<div id="password_input">

						<div id="password_inputleft"></div>

						<div id="password_inputmiddle">

							<input type="password" name="password" id="url" placeholder="password"  >
							<img id="url_password" src="./images/passicon.png" alt="">

						</div>

						<div id="password_inputright"></div>

					</div>

					<div id="submit">

						<input type="submit" id="submit1" value="Sign In">


					</div>


					<div id="links_left">

						<a href="#">Forgot your Password?</a>

					</div>

					<div id="links_right"><a href="#">Not a Member Yet?</a></div>

				</div>

				<div id="wrapperbottom"></div>

				<div id="powered">
					<p>Powered by <a href="http://www.premiumfreebies.eu">Premiumfreebies Control Panel</a></p>
				</div>
			</div>
		</form>

		<!-- javascripot -->
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
	</body>
	</html>