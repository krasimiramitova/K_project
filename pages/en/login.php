<?php 
include '../../includes/header.php';
include '../../includes/db_connect.php'; 
session_start();
if (!isset($_SESSION['player_id']))
	{echo '<div id="container">
	<form method="post" action="">
	<p>Enter Username</p>
	<input type="text" name="username"';
	if (isset($_POST["submit"])&&isset($_POST["username"]))
	{	if ($_POST['username']==''){echo "You haven't entered a username";} 
		else
		{$select_username = "SELECT player_id, username FROM `players` WHERE username ='". $_POST['username'] ."'";
		$username_result = mysqli_query($conn,$select_username);
		if(mysqli_num_rows($username_result)==0)
			{echo ">Wrong username";}
		else {$_SESSION['username']=$_POST['username'];
			echo 'value="'.$_SESSION['username'].'">';}
		}
	}
	echo '<p></p>
	<p>Enter Password</p>
	<input type="password" name="password">';
	if	(isset($_POST['submit']))
		{	if (($_POST['password'])=='')
			{echo"You haven't entered a password";}
			else
			{$select_password = "SELECT player_id,password FROM `players` 
			WHERE username ='". $_POST['username'] ."' AND password='".$_POST['password']."'";
			$password_result = mysqli_query($conn,$select_password);
			//var_dump(mysqli_num_rows($password_result));
			if(mysqli_num_rows($password_result)==0)
				{echo "Wrong password";
		         echo '<p>Do you need a new password? - <a href="new_password.php"> get it here </a> </p>';}
			else 
				{$player_row = mysqli_fetch_assoc($password_result);
 				$_SESSION['player_id']=$player_row['player_id'];
				}
			}
		}
	echo '
	<input type="submit" name="submit" id="btn" value="Login">
	</form>
	</div>';
//	var_dump($_SESSION);
	}
else 
	{
	echo '<p>Wellcome, '.$_SESSION['username'].'!</p>';
	echo '<p>Would you <a href="new_game.php"> PLAY </a> or go <a href="home.php"> HOME </a>?</p>';
	}
include '../../includes/footer.php';





 


