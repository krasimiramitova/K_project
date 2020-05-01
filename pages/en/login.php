<?php 
include '../../includes/header.php';
include '../../includes/db_connect.php'; 
session_start();
echo '<div class="container">';
	echo '<div class="col-md-7 col-md-offset-1">'; 
		if (!isset($_SESSION['player_id']))
			{echo '
			<form method="post" action="">
			<p>Enter Username</p>
			<input type="text" name="username"';
			if (isset($_POST["submit"]))
			{	if ((!isset($_POST['username']))||($_POST['username']==''))
					{echo "You haven't entered a username";} 
				else
				{$select_username = "SELECT player_id, username FROM `players` WHERE username ='". $_POST['username'] ."'";
				$username_result = mysqli_query($conn,$select_username);
				if(mysqli_num_rows($username_result)==0)
					{echo ">Wrong username";}
				else {$_SESSION['username']=$_POST['username'];
					echo 'value="'.$_SESSION['username'].'">';}
				}
			}
			else 
			var_dump($_POST);
			echo '<p></p>
			<p>Enter Password</p>
			<p><input type="password" name="password"></p>';
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
			<p><input class="btn btn-default" type="submit" name="submit" id="btn" value="Login"></p>
			</form>';
		//	var_dump($_SESSION);
			}
		else 
			{
			echo "<h1>Wellcome, ".$_SESSION['username']."! Enjoy the hanging! </h1>";
			header("../../index.php");
			}
		
	echo '</div>';
	echo '<div class="col-md-3">';
		//link to the bulgarian version
		echo '<p><a class="btn btn-default" href="../bg/login.php"> Български </a></p>';
		//choose a level and a category
		if (!isset($_POST['play']))
			{echo '<form action="../../index.php" method="post">';
				//check for username
				if (isset($_SESSION['username']))
					{echo 'Choose a level and a category, '.$_SESSION['username'].'!<p>';}
				echo '<p>Choose a level</p><p>';
				include '../../includes/read_from_levels.php';
				echo '</p><p>Choose a category</p><p>';
				include '../../includes/read_from_categories.php';
				echo '</p>';
			echo '<p><input class="btn btn-default" type="submit" name="play" value="PLAY"></p>';
				echo '</form>';
			}
		
	echo '</div>';

echo '</div>';
include '../../includes/footer.php';





 


