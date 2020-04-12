 <?php 
 if ((isset($_POST['category']))AND(isset($_POST['level'])))
	{$category=$_POST['category'];
	$level=$_POST['level'];
	$_SESSION['level']=$level; 												//get data from database
	$_SESSION['category']=$category;
	include '../../includes/read_from_words.php';
	$_SESSION['word']=$word;
	}
echo '<p>You play in category "'.$_SESSION['category'].'" <p>';
echo '<p>You play at level "'.$_SESSION['level'].'"<p>';
echo '<p>You play to guess "'.$_SESSION['word'].'"<p>';

//include '../../includes/insert_a_new_game_into_games_players.php'; 	//start the game
include '../../includes/switch_level_en.php';  							//transform level data from database into number of tries
//defining variables
$mistake=0;						//nulling $mistake
$guess_array=[];				//an array that keeps the result of all the guesses in the particular word
$index_guessed=0;						
$guess_letters=[];				//an array that keeps all the picked letters from the form

	$word=mb_strtoupper($_SESSION['word']); 		//makes the input uppercase 
	$count_empty=mb_strlen($word);		//defining the length of the word
	$arr=preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);		//transforms the word's characters into an array
	for ($i=0; $i<$count_empty; $i++)	//nulling $guess_array depending on the word
	{if ($arr[$i]!=' ')
		{$guess_array[$i]='_ ';
		echo '_ ';}
		else
		{$guess_array[$i]=$arr[$i];
		echo '<p></p>';}
	}
echo '<p></p>';