<?php 
include '../../includes/header.php';
include '../../includes/function_guess.php';
?>
play <a href="../bg/play.php">бг</a>
<p>
	under construction

</p>
<?php

//start the game
	$word='Argentina'; 			//will read from database
	$level_id=2;				//will read from level information in database
//transform data from database
	switch ($level_) 
		{
		case (1 or 4):
			$tryings=10;
			break;
		case (2 or 5):
			$tryings=8;
			break;
		case (3 or 6):
			$tryings=6;
			break;
		}
	
	$word=mb_strtoupper($word); 		//make the input uppercase 
	$count_empty=mb_strlen($word);		//defining the length of the word
	$arr=preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);		//make the word characters in an array
	for ($i=0; $i<$count_empty; $i++)	//nulling $guess_array depending on the word
	{if ($arr[$i]!=' ')
		{$guess_array[$i]='_ ';
		echo '_ ';}
		else
		{$guess_array[$i]=$arr[$i];
		echo '<p></p>';}
	}
echo '<p></p>';
//defining variables
$mistake=0;					//nulling $mistake
$guess_array=[];				//an array that keeps the result of all the guesses in the particular word
$q=0;						
$guess_letters=[];				//an array that keeps all the picked letters from the form
//letter table
while ($count_empty>0)
	{
	$leter='A';
	echo '<table>';
		for ($k=1; $k<4; $k++)
		{echo '<tr>';
			for ($l=1; $l<11; $l++)
			{echo '<td>
				<form action="" method="get">
				<input type = "submit"';
			for ($q=0; $q<count($guess_letters); $q++)		//check for used letter
			{if ($leter=$guess_letters[$q])
				{echo 'disabled="disabled"';}
			}
			echo 'name="letter" value = "'.$leter.'">
				</form>
				</td>';
			if ($leter=='Z') {break;}
			$leter++;
			}
		echo '</tr>';
		}
	echo '</table>';
	
	if (!empty($_GET['letter']))
		{$guess=$_GET['letter'];					//taking guess from user
		$result=guess($guess, $arr, $guess_array,$mistake);	//taking result from guess function
		if (is_numeric($result))				//checking if the guess is right
			{echo "You almost guess!";
				$mistake=$result;			//new value for mistake if the guess isn't right
			}
		else {$guess_array=$result;}				//new value for $guess_array if the guess is right
		$count_empty=0;						//count _ to check the need for repeat
		for ($h=0; $h<count($arr); $h++)
			{
			if ($arr[$h]=='_ ')
				{$count_empty++;}
			}
		$guess_letters[$q]=$guess;
		$q++;	
		}
	else
	{echo 'CHOOSE A LETTER';}
	$tryings=$tryings-$mistake;
	echo 'You have '.$tryings.' tries left';
	echo '<img src="../../img/'.$tryings.'.jpg" class="img" alt="'.$tryings.'">';
}

include '../../includes/footer.php';
?>
