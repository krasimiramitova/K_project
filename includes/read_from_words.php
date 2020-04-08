<?php
include 'header.php';
include 'db_connect.php';
$category='animals';
$level='easy';
$read_query = "SELECT games.word FROM `games` 
LEFT JOIN categories ON (games.category_id= categories.category_id)
LEFT JOIN level ON (games.level_id= levels.level_id)
WHERE categories.language=".$category."AND  levels.level_name='".$level."'";
$words=[];
$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 )
{
	
$i = 1;
	while($row = mysqli_fetch_assoc($result))
	{$words[$i]=$row['word'];
	$i++;}
}
include 'footer.php';

			