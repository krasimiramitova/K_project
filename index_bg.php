
<?php 
include 'includes/header.php';
include 'includes/function_guess_letter.php';
include 'includes/function_guess_word.php';
include 'includes/db_connect.php';
session_start();
echo '<div class="container">';
	echo '<div class="col-md-7 col-md-offset-1">'; 

	if ((isset($_POST['play']))||(isset($_SESSION['category'])))
		{if (isset($_POST['play'])){$_GET['letter']=NULL;}
		if (isset($_POST['username']))
	 		{$_SESSION['username']=$_POST['username'];}
		if (isset($_POST['player_id']))	
			{$_SESSION['player_id']=$_POST['player_id'];}
		if (!isset($_SESSION['level']))
			{if (isset($_POST['level']))
				{$_SESSION['level']=$_POST['level'];}
			else {$_SESSION['level']='easy';}
			}
		if (!isset($_SESSION['category']))
			{if (isset($_POST['category']))
				{$_SESSION['category']=$_POST['category'];}
			else {$_SESSION['category']='animal';}
			}
 			
		if (!isset($_SESSION['guess_letters'])) 
			{$_SESSION['guess_letters']=[];}			//an array that keeps all the picked letters from the form

		if (!isset($_SESSION['fails']))					//get data from database
			{if (isset($_SESSION['level']))
				{$level=($_SESSION['level']);}
			else {$level='easy';}
				
			switch ($level) 
				{case ('easy'):
					$fails=10;
					break;
				case ('medium'):
					$fails=8;
					break;
				case ('hard'):
					$fails=6;
					break;
				}
			$_SESSION['fails']=$fails;
			}

		include 'includes/read_from_words.php';
		
		if (!isset($_SESSION['word']))
			{
			$_SESSION['word']=mb_strtoupper($words[$num_game][1]); 		//makes the input uppercase 
			$count_empty=mb_strlen($_SESSION['word']);					//defining the length of the word}
			}

		//start the game
		include 'includes/insert_a_new_game_into_games_players.php'; 				
		//defining variables
		//nulling $mistake
		$mistake=0;	
		$play_status='playing';															
		//transforms the word's characters into an array
		
		if (!isset($_SESSION['arr'])) 
			{$_SESSION['arr']=preg_split('//u', $_SESSION['word'], null, PREG_SPLIT_NO_EMPTY);}		
		
		//an array that keeps the result of all right guesses in the word	
		
		if (!isset($_SESSION['guess_array'])) 
			{$_SESSION['guess_array']=[];
		//nulling   $guess_array depending on the word
			for ($i=0; $i<$count_empty; $i++)	
				{if ($_SESSION['arr'][$i]!=' ')
					{$_SESSION['guess_array'][$i]='_ ';}
				else
					{$_SESSION['guess_array'][$i]='<p></p>';}
				}
			}		
	
		//taking guess from $_GET and check if it is in the word ($_SESSION['arr'])
		if (isset($_GET['letter']))
			{$_SESSION['guess_letters'][]=$_GET['letter'];
			//taking result from guess function
			$result_guess=guess_letter($_GET['letter'], $_SESSION['arr'], $_SESSION['guess_array']);
		//checking if the guess is right		
			if (is_numeric($result_guess))		
		//new value for mistake if the guess isn't right
				{
		//		if (isset($_SESSION['username']))
		//			{echo "You almost guess, ".$_SESSION['username']."!";}
		//		else {echo "You almost guess! Try again!";}
				$mistake=$result_guess;	}
			else {$_SESSION['guess_array']=$result_guess;}								
		//new value for $guess_array if the guess is right
			}
		else {$_GET['letter']='';}
		$check_guess='';
		if (isset($_POST['fast_guess']))
			{
			$check_guess=guess_word($_POST['fast_guess'], $_SESSION['word']);
			}
		if ($check_guess=='wrong')
				{$mistake=1;}

//		if (isset($_SESSION['fails']))
//			{
				$_SESSION['fails']=$_SESSION['fails']-$mistake;
//			}	
		if (isset($_POST['save_game']))
			{$play_status='saved';}

		//count empty letters to check the need for repeat	
		$count_empty=0;													
		for ($h=0; $h<count($_SESSION['arr']); $h++)
			{
			if ($_SESSION['guess_array'][$h]=='_ ')
				{$count_empty++;}
			}
			
		//won/lost or continuing playing
		if (($count_empty==0)||($check_guess=='right'))
			{$play_status='won';}
		elseif ($_SESSION['fails']==0)
			{$play_status='lost';}
		else 	//see the guessings till now
			{echo '<h1>';
			for ($i=0; $i<count($_SESSION['arr']); $i++)
				{echo $_SESSION['guess_array'][$i];}
			echo '</h1>';
//			echo '</div>';
//			echo '<div class="col-md-8>';
			echo '<img src="img/'.$_SESSION['fails' ].'.jpg" alt="'.$_SESSION['fails'].'" height="100%" width="100%">';
			if ($_SESSION['fails']==1)
				{echo 'You have '.$_SESSION['fails'].' mistake to make.';}
			else {echo 'You have '.$_SESSION['fails'].' mistakes  to make.';}
			if ($_GET['letter']!=='')
				{if (isset($_SESSION['username']))
					{echo '<p>Make another guess,'.$_SESSION['username'].'!</p>';} 
				else {echo '<p>Make another guess!</p>';
					//var_dump($_GET);
					}
				}
			else 
				{if (isset($_SESSION['username']))
					{echo '<p>Make a guess,'.$_SESSION['username'].'!</p>';} 
				else {echo '<p>Make a guess!</p>';}
				}
			include 'includes/letter_table_en.php';							//letter table
			}
	

		
		if ($play_status!=='playing')				
			{switch ($play_status) 
				{
				case 'won':
					$play_status=3;
					echo '<img src="img/won.jpg" alt="won the game" height="100%" width="100%">';
					if (isset($_SESSION['username']))
						{echo '<p>You saved that man'.$_SESSION['username'].'!</p><p>Would you try to hang another one?</p>';
						}
					else
						{echo '<p>You saved that man!</p><p>Would you try to hang another one?</p>';
						echo '<p>You can <a class="btn btn-default" href="sign_up.php">sign up</a> or 
						<a class="btn btn-default" href="login.php">login</a> if you want to get more options.</p>';
						}
					break;
					case 'lost':
						$play_status=1;
						echo '<img src="img/hangman_family.jpg" alt="won the game" height="100%" width="100%">';
						if (isset($_SESSION['username']))
							{echo "<p>A hangman's familly lost their father</p><p>Would you try to save another one,".$_SESSION['username']."?</p>";
							}
						else 
							{echo "<p>A hangman's familly lost their father</p><p>Would you try to save another one?</p>";}
					break;
					case 'saved':
						$play_status=5;	
						if (isset($_SESSION['username']))
							{echo "<p>You saved that game for later, ".$_SESSION['username'].".</p>";}
						else 
							{echo '<p>You can <a class="btn btn-default" href="sign_up.php">sign up</a> or 
					<a class="btn btn-default" href="login.php">login</a> if you want to be able to continue that game later.</p>';}	
				}

//			include 'includes/session_transmitt.php';
			echo '<form method="post" action="">';
			if (isset($_SESSION['username']))
				{echo 
					'<input type="hidden" name="username" value="'. $_SESSION['username'].'">
					<input type="hidden" name="player_id" value="'. $_SESSION['player_id'].'">';
				}
			echo '<input type="hidden" name="level" value="'. $_SESSION['level'].'">
			<input type="hidden" name="category" value="'. $_SESSION['category'].'">
			<input class="btn btn-default" type="submit" name="play" id="btn" value="PLAY AGAIN">
				</form>';
			include 'includes/function_update_status.php';
			session_destroy();
			}
		}	
	else 
		{echo "<h1>Welcome to hangman!</h1>
		<img src='img/words_hurt.jpg' alt='Words hurt!' height='100%' width='100%'>
			<p>This is version of the classic letter guessing game called Hangman. You are shown a set of blank letters that match a word or phrase and you have to guess what these letters are to reveal the hidden word. You guess by picking letters from a table. If you pick a letter that is in the word, it is revealed from the blank letters; however, if you pick a letter that is not in the word, then a stickman is slowly drawn. With each wrong letter guess, the man is drawn more and more. When the man is finished, he is hung and the game is lost. This is why the game is called 'Hangman'. If you can reveal all the letters in the word before the man is hung then you are successful and the full word is revealed. You can make a fast guess by using the field called fast guess.</p>
			<p>You can save games for playing later. Also you can see how many games you've played, won or lost. You can challenge other players with words added by you. All that if you register and log in.</p>
			<p>You can choose another language as well, if you don't want to play in English.</p>
			<p>Use the buttons and forms at your right to navigate the app!</p>
			<h2>Enjoy the game!</h2>";
		}	
	echo '</div>';
	echo '<div class="col-md-3">';
		//link to the bulgarian version
		echo '<p><a class="btn btn-default" href="index.php"> English </a></p>';
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
		if (isset($_SESSION['player_id']))
			{echo '<p><a class="btn btn-default" href="pages/en/home.php">HOME</a></p>';
			}
	echo '</div>';

echo '</div>';
	
include 'includes/footer.php';
