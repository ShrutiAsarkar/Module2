
<?php
include('connection.php');
session_start();

$username = "";
$email= "";
$emailErr="";
$errors = array();

// REGISTER USER
if(isset($_POST['register']))
{
	 // receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	

	//ensure that form fields are filled properly
	if (empty($username)) 
	{ 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) 
  	{ 
  		array_push($errors, "Email is required");  
  	}
  	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
  	{
  			array_push($errors, "Please Enter valid email");
  	}
  	
    
  	if (empty($password_1)) 
  	{ 
  		array_push($errors, "Password is required"); 
  	}
  	if ($password_1 != $password_2) 
  	{
		array_push($errors, "The two passwords do not match");
  	}



// first check the database to make sure 
// a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
	$answer = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($answer);
	if ($user) 
	{ 
	// if user exists
    	if ($user['username'] === $username) 
    	{
    		array_push($errors, "Username already exists");
    	}

    	if ($user['email'] === $email) 
    	{
      	array_push($errors, "email already exists");
		}
	}


// Finally, register user if there are no errors in the form
	if (count($errors) == 0) 
	{
		$password = md5($password_1);//encrypt the password before saving in the database
		$query = "INSERT INTO user (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
		mysqli_query($db, $query);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');
	}
}

 //log user in from login page

if (isset($_POST['login'])) 
{
	 // receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);


	//ensure that form fields are filled properly in log in page
	if (empty($username)) 
	{
  		array_push($errors, "Username is required");
	}
	if (empty($password)) {
  		array_push($errors, "Password is required");
  	}


  	if(count($errors)==0)
	{
		$password= md5($password);//encryption of password
		$query= "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$result= mysqli_query($db, $query);
		if(mysqli_num_rows($result)==1)
		{
			//log user in
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are successfully logged in";
			header('location: ./index.php');
		}
		else
		{
			array_push($errors, "Incorrect username and password combination");
			//header('location: ./login.php');
		}
	}
}

//logout from index

 if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>