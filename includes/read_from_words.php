<?php

//include 'header.php';
//include 'function_guess_letter.php';
//include 'db_connect.php';
//include 'read_from_levels.php';
//include 'read_from_categories.php';

$read_query = "SELECT games.word, games.game_id FROM `games` 
LEFT JOIN categories ON (games.category_id= categories.category_id)
LEFT JOIN levels ON (games.level_id= levels.level_id)
WHERE categories.category='".$category."'AND  levels.level_name='".$level."'";
$words=[];
$result = mysqli_query($conn, $read_query);
if( mysqli_num_rows($result) > 0 )
{	$i = 1;
	while($row = mysqli_fetch_assoc($result))
	{$words[$i][0]=$row['game_id'];
	 $words[$i][1]=$row['word'];
	 $i++;}
}
$num_game=mt_rand(1,$i-1);
$id=$words[$i-1][0];
$word=$words[$num_game][1];
//$_SESSION['word']=$word;
//$_SESSION['level']=$level;
//$_SESSION['category']=$category;
//var_dump($_SESSION);
//include 'footer.php';

			