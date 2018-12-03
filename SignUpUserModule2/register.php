<?php include('./header.php'); ?>
<?php include('./server.php');?>


<!--	<link rel="stylesheet" type="text/css" href="style.css"/>-->
	
	<div class="header">
			<h2>Sign up in seconds</h2>
			<form method="post" action="register.php">
			<!--display validation errors here-->
			<?php include('./errors.php'); ?>
				<div class="input-group">
					<label><span class="glyphicon glyphicon-user"></span>Username</label>
					<input type="text" name="username" placeholder="John Joe" value="<?php echo $username; ?>">
				</div>
				<div class="input-group">
					<label><span class="glyphicon glyphicon-envelope"></span>Email</label>
					<input type="text" name="email" placeholder="johnjoe@humancloud.in" value="<?php echo $email; ?>">
				</div>
				<div class="input-group">
					<label><span class="glyphicon glyphicon-lock"></span>Password</label>
					<input type="password" name="password_1" placeholder="**********">
				</div>
				<div class="input-group">
					<label><span class="glyphicon glyphicon-lock"></span>Confirm Password</label>
					<input type="password" name="password_2" placeholder="**********">
				</div>
				<div>
					<button type="submit" class="btn btn-primary" name="register">Create an account</button>
				</div>
				<p id="btn1">
					Already a member? <a href="login.php">Sign in</a></p>
			</form>
		</div>

<?php include('./footer.php'); ?>