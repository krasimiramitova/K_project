<?php 
include '../../includes/header.php';
include '../../includes/function_guess_letter.php';
include '../../includes/function_guess_word.php';
include '../../includes/db_connect.php';
?>
play <a href="../bg/play.php"> бг </a>
<p>
	under construction

</p>
<?php
session_start();
include '../../includes/prepare_for_game.php'; 						//transform data from database for algorithm
if (isset($_GET[$_SESSION['get_argument']]))
	{
	$_SESSION['guess_letters'][]=$_GET[$_SESSION['get_argument']];
	$guess=$_GET[$_SESSION['get_argument']];						//taking guess from $_GET
//		echo '<p>Your '.($_SESSION['try']-1).' guess is '.$guess.'</p>'; 
	$result_guess=guess_letter($guess, $_SESSION['arr'], $_SESSION['guess_array']);		//taking result from guess function
	if (is_numeric($result_guess))										//checking if the guess is right
		{echo "You almost guess!";
			$mistake=$result_guess;										//new value for mistake if the guess isn't right
		}
	else {$_SESSION['guess_array']=$result_guess;}									//new value for $guess_array if the guess is right
	$count_empty=0;													//count _ to check the need for repeat
	for ($h=0; $h<count($_SESSION['arr']); $h++)
		{
		if ($_SESSION['guess_array'][$h]=='_ ')
			{$count_empty++;}
		}
	$_SESSION['fails']=$_SESSION['fails']-$mistake;
	echo '<img src="../../img/'.$_SESSION['fails' ].'.jpg" class="img" alt="'.$_SESSION['fails'].'" height="42" width="42">';
	if ($count_empty==0)
		{echo '<p>You saved that man!</p><p>Would you try to hang another one?</p>';
		
		include '../../includes/session_transmitt.php';
		$play_status=3;
		include '../../includes/function_update_status.php';
		
		 session_destroy();
		}
	elseif ($_SESSION['fails']==0)
		{echo "<p>A hangman's familly lost their father</p><p>Would you try to save another one?</p>";
		include '../../includes/session_transmitt.php';
		$play_status=1; 
		include '../../includes/function_update_status.php';
		session_destroy();
		}

	else 
		{ if ($mistake==0)
			{echo 'You can make '.$_SESSION['fails'].' mistakes';	}
			elseif ($_SESSION['fails']==1)
			{echo 'You can make '.$_SESSION['fails'].' more mistake';	}
			else {echo 'You can make '.$_SESSION['fails'].' more mistakes';}
		echo '<p>Make another guess!</p>';
		echo '<p></p>';														//see the guessings till now
		for ($i=0; $i<count($_SESSION['arr']); $i++)
			{echo $_SESSION['guess_array'][$i];}
		echo '<p></p>';
		include '../../includes/letter_table_en.php';							//letter table
		}
	}
	else
	{echo '<p>Make a guess!</p>'; 
	echo '<p></p>';														//see the guessings till now
	for ($i=0; $i<count($_SESSION['arr']); $i++)
		{echo $_SESSION['guess_array'][$i];}
	echo '<p></p>';
	include '../../includes/letter_table_en.php';							//letter table
	}
echo '<form method="post" action="">
		<p>Fast guess</p>
	<input type="text" name="fast_guess">
	<input type="submit" name="submit" id="btn" value="guess">
		</form>';
if (isset ($_POST['fast_guess']))
{	$guess=$_POST['fast_guess'];
	$right_guess=guess_word($guess, $_SESSION['word']);
	if ($right_guess==0)
	{	echo '<p>You saved that man!</p><p>Would you try to hang another one?</p>';
		include '../../includes/session_transmitt.php';
		$play_status=3;
		include '../../includes/function_update_status.php';
		session_destroy();
	}
	else 
	{$_SESSION['fails']=$_SESSION['fails']-$mistake;}
}

	
include '../../includes/footer.php';
