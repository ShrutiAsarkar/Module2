<?php include('./header.php'); ?>
<?php include('./server.php'); ?>
<!--	<link rel="stylesheet" type="text/css" href="style.css"/>-->
	<div class="header">
			<h2>Log in</h2>
			<form method="post" action="login.php">
			<!--display validation errors here-->
			<?php include('./errors.php'); ?>
				<div class="input-group">
					<label><span class="glyphicon glyphicon-envelope"></span>Username or email</label>
					<input type="text" name="username">
				</div>
				<div class="input-group">
					<label><span class="glyphicon glyphicon-lock"></span>Password</label>
					<input type="password" name="password">
				</div>
				<div>
					<button type="submit" class="btn btn-primary" name="login">Login</button>
				</div>
				<p>
					Not yet a a member? <a href="register.php">Sign up</a>
			</form>
		</div>

<?php include('./footer.php'); ?>