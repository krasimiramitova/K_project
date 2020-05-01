<?php

	echo '<div class="col-md-3">';
		//link to the bulgarian version
		echo '<p><a class="btn btn-default" href="../bg/play.php"> Български </a></p>';
		//choose a level and a category
		if (!isset($_POST['play']))
			{echo '<form action="" method="post">';
				//check for username
				if (isset($_SESSION['username']))
					{echo 'Choose a level and a category, '.$_SESSION['username'].'!<p>';}
				echo '<p>Choose a level</p><p>';
				include 'includes/read_from_levels.php';
				echo '</p><p>Choose a category</p><p>';
				include 'includes/read_from_categories.php';
				echo '</p>';
			echo '<p><input class="btn btn-default" type="submit" name="play" value="PLAY"></p>';
				echo '</form>';
			}
		else
			{	
		//check for spelling of the word before category
		if (substr($_SESSION['category'],0,1)=='a')
			{echo '<p class="menu">You play to guess an '.$_SESSION['category'].'. <p>';}
			else
			{echo '<p class="menu">You play to guess a '.$_SESSION['category'].'. <p>';}
		//echo '<p class="menu">level: '.$_SESSION['level'].'<p>';
		//echo 'login, register, choose: category&level,fast guess';
			echo '<form autocomplete="off" method="post" action="">
			<p>Fast guess</p>
			<input type="text" name="fast_guess">
			<p><input class="btn btn-default" type="submit" name="submit" id="btn" value="guess"></p>
			</form>';
			}
		if (!isset($_SESSION['player_id']))
			{echo '<p><a class="btn btn-default" href="pages/en/login.php">Login</a></p>';
			echo '<p><a class="btn btn-default" href="sign_up.php">Sign up</a></p>';
			}
		else 
			{echo '<p><a class="btn btn-default" href="logout.php">Logout</a></p>';
			echo '<p><a class="btn btn-default" href="challenge.php">Challenge</a></p>';
			}
		if (isset($_POST['play']))	
			{echo '<p><form method="post" action="">
			<input class="btn btn-default" type="submit" name="save_game" value="SAVE">
			</form></p>';
			}
	echo '</div>';