<?php 

  include '../includes/hangman_connect.php';


?>

<form method="post" action="">
	<p>Enter Username</p>
	<input type="text" name="username">
	<p>Enter Password</p>
	<input type="password" name="password">
    <p>Repeat Password</p>
	<input type="password" name="verify_password">
	<p>Enter Mail</p>
	<input type="text" name="email">
	<input type="submit" name="submit" value="Register">	
</form>
<?php

if( isset($_POST["submit"])){
$flag = true;
if( isset($_POST["username"])){
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
	$email = $_POST["email"];
}else{
	$flag = false;
	echo 'Enter Email!';
}
 if($flag){

 $date_added =date("Y-m-d H:i:s");
 $date_deleted =date("Y-m-d H:i:s");

//2 insert_query
$insert_query = "INSERT INTO `players`(`username`, `password`, `register_date`, `e-mail`, `date_deleted`) VALUES ('$username','$password','$date_added','$email','$date_deleted')";

//3
$result = mysqli_query($conn, $insert_query);

if($result){
	echo "Record created successfuly";
} else {
	die('Query failed!' . mysqli_error($conn));
}
}else{
	echo 'Register Failed';
}
}
?>
