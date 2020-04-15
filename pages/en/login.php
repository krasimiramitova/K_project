<?php 
include '../includes/hangman_connect.php';

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<div id="container">
	<form method="post" action="">
	<p>Enter Username</p>
	<input type="text" name="username">
	<p>Enter Password</p>
	<input type="password" name="password">
    <!-- <p>Verify Password</p>
	<input type="password" name="verify_password"> -->
	<input type="submit" name="submit" id="btn" value="Login">
	</form>
	</div>
</body>
</html>

<?php 

if( isset($_POST["submit"])){
$flag = true;
if( isset($_POST["username"])){
	$username = $_POST["username"];
}else{
	$flag = false;
	echo 'Enter Username!'; 
}
if(isset($_POST["password"])){
	$password = $_POST["password"];
}else{
	$flag = false;
	echo 'Enter password!';
}

$select_query = "SELECT * FROM `players` WHERE username ='". $username ."' AND password ='". $password ."'";

$mysqli_result = mysqli_query($conn,$select_query);

if(mysqli_num_rows($mysqli_result)){
	echo 'You Have Successfully Logged in';
	exit();
}else{
	echo 'You have Entered Incorrect Username or Password';
	exit();
}
}
?>




 


