<?php 
include '../../includes/header.php';
include '../../includes/function_guess_letter.php';
include '../../includes/db_connect.php';
?>
play <a href="../bg/play.php"> бг </a>
play <a href="new_game.php"> new game </a>
<p>
	under construction

</p>
<?php
session_start();
include '../../includes/prepare_for_game.php'; 							//transform data from database for algorithm
$try=1; 
$get_argument='letter1';
include '../../includes/letter_table_en.php';
for ($r=1; $r<=$try; $r++)
//while ($count_empty>0)
	{	if ($r>1) {include '../../includes/session_extract.php';}
//letter table
	if (isset($_GET[$get_argument]))
		{
		$guess_letters[$index_guessed]=$_GET[$get_argument];
		$guess=$guess_letters[$index_guessed];							//taking guess from $_GET
			echo '<p>Your '.$try.' guess is '.$guess.'</p>'; 
		$result=guess_letter($guess, $arr, $guess_array,$mistake);		//taking result from guess function
		if (is_numeric($result))										//checking if the guess is right
			{echo "You almost guess!";
				$mistake=$result;										//new value for mistake if the guess isn't right
			}
		else {$guess_array=$result;}									//new value for $guess_array if the guess is right
		$count_empty=0;													//count _ to check the need for repeat
		for ($h=0; $h<count($arr); $h++)
			{
			if ($guess_array[$h]=='_ ')
				{$count_empty++;}
			}
		$index_guessed++;	
		$tryings=$tryings-$mistake;

			echo '<p></p>$get_argument: ';	var_dump($get_argument);
			echo '<p></p>$tryings: ';				var_dump($tryings);
			echo '<p></p>$guess_array: ';		var_dump($guess_array);
			echo '<p></p>$guess_letters: ';		var_dump($guess_letters);
			echo '<p></p>$count_empty: ';		var_dump($count_empty);			echo '<p></p>';


//	echo 'You have '.$tryings.' tries left';
//	echo '<img src="../../img/'.$tryings.'.jpg" class="img" alt="'.$tryings.'">';
		if ($count_empty==0)
			{echo 'You won!';}
		elseif ($tryings==0)
			{echo "A hangman's familly lost their father";}
		else 
			{$try++; 
			$get_argument='letter'.$try;
			include '../../includes/letter_table_en.php';
			include '../../includes/session_load.php';
			}
		if ($try==5) {break; } // just to break the cycle
		}
	else
		{echo '<p>Make a guess!</p>';
		break; }
	}
	include '../../includes/footer.php';
?>
