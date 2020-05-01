<?php 

  include '../includes/hangman_connect.php';


?>

<form method="post" action="">
	<link rel="stylesheet" type="text/css" href="style2.css">
	<div class='container'>
	<p>Enter Username</p>
	<input type="text" name="username" placeholder="Enter Usename" class="input">
	<p>Enter Password</p>
	<input type="password" name="password" placeholder="Enter Password" class="input">
    <p>Repeat Password</p>
	<input type="password" name="verify_password" placeholder="Verify Password" class="input">
	<p>Enter Mail</p>
	<input type="text" name="email" placeholder="Enter Your Email" class="input">
	<input type="submit" name="submit" value="Register" class="btn">
	</div>
</form>

<?php

if( isset($_POST["submit"])){
$flag = true;
if( isset($_POST["username"])){
	if (preg_match("/[^A-Za-z0-9]/", $_POST['username']))
{
    echo "Invalid Characters!";
}
	$username = $_POST["username"];
}else{
	$flag = false;
	echo 'Enter Username!'; 
}
if (isset($_POST["password"])){
	$password = $_POST["password"];
}else{
	$flag = false;
	echo 'Enter password!';
}
if (isset($_POST["verify_password"])){
	$verify_password = $_POST["verify_password"];
}
else{
	$flag = false;
}
if(isset($password) && isset($verify_password)){
if($password != $verify_password){
	$flag = false;
	echo 'Password doesnt match!';
} 
}
if (isset($_POST["email"])) {
	}
	$email = $_POST["email"];
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo("$email is a valid email address");
} else {
  echo "$email is not a valid email address";
}
}else{
	$flag = false;
	echo 'Enter Email!';
}
 if($flag){

 $date_added =date("Y-m-d H:i:s");
 $date_deleted =date("Y-m-d H:i:s");

//2 insert_query
$insert_query = "INSERT INTO `players`(`username`, `password`, `register_date`, `e-mail`, `date_deleted`) VALUES ('".$username."','".$password."','".$date_added."','".$email."','".$date_deleted."')";

//3
$result = mysqli_query($conn, $insert_query);

if($result){
	echo "You've registered successfully";
} else {
	die('Query failed!' . mysqli_error($conn));
}
}else{
	echo 'Register Failed';
}

?>
