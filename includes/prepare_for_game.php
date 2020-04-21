 <?php 
 if (!isset($_SESSION['username']))
 	{if (isset($_POST['username']))
 		{$_SESSION['username']=$_POST['username'];}
 	}
 if ((isset($_POST['category']))AND(isset($_POST['level'])))
	{$_SESSION['category']=$_POST['category'];
	$_SESSION['level']=$_POST['level'];
	}
if (!isset($_SESSION['fails']))
	{switch ($_SESSION['level']) 
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

//get data from database
include '../../includes/read_from_words.php';
	if (!isset($_SESSION['word']))
		{$_SESSION['word']=mb_strtoupper($words[$num_game][1]); 		//makes the input uppercase 
		$count_empty=mb_strlen($_SESSION['word']);
		}																//defining the length of the word}
echo '<p class="menu">category: '.$_SESSION['category'].' <p>';
echo '<p class="menu">level: '.$_SESSION['level'].'<p>';
echo '<p class="menu">You play to guess "'.$_SESSION['word'].'"<p>';

include '../../includes/insert_a_new_game_into_games_players.php'; 		//start the game

//defining variables
$mistake=0;																//nulling $mistake
if (!isset($_SESSION['guess_letters'])) 
	{$_SESSION['guess_letters']=[];}									//an array that keeps all the picked letters from the form
//transforms the word's characters into an array
if (!isset($_SESSION['arr'])) 
	{$_SESSION['arr']=preg_split('//u', $_SESSION['word'], null, PREG_SPLIT_NO_EMPTY);}		
//an array that keeps the result of all right guesses in the word	
if (!isset($_SESSION['guess_array'])) 
	{$_SESSION['guess_array']=[];
	for ($i=0; $i<$count_empty; $i++)	//nulling   $guess_array depending on the word
		{if ($_SESSION['arr'][$i]!=' ')
			{$_SESSION['guess_array'][$i]='_ ';
			}
		else {$_SESSION['guess_array'][$i]='<p></p>';
			}
		}
	}
if (!isset($_SESSION['try']))
	{$_SESSION['try']=1;}
	else {$_SESSION['try']++;}
if (!isset($_SESSION['get_argument']))
	{$_SESSION['get_argument']='letter'.$_SESSION['try'];}
echo '<p></p>';-