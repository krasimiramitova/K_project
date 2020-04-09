<?php
//include 'header.php';
//include 'db_connect.php';
echo '<form action="" method="post">';
include 'read_from_levels.php';
include 'read_from_categories.php';
	echo '<input type="submit" name="play" value="PLAY">';
echo '</form>';
if ((isset($_POST['category']))AND(isset($_POST['level'])))
	{$category=$_POST['category'];
	$level=$_POST['level'];
	}
	else {echo 'Choose level and category';
			die;}
$read_query = "SELECT games.word FROM `games` 
LEFT JOIN categories ON (games.category_id= categories.category_id)
LEFT JOIN levels ON (games.level_id= levels.level_id)
WHERE categories.category='".$category."'AND  levels.level_name='".$level."'";
$words=[];
$result = mysqli_query($conn, $read_query);
if( mysqli_num_rows($result) > 0 )
{
	$i = 1;
	while($row = mysqli_fetch_assoc($result))
	{$words[$i]=$row['word'];
	$i++;}
}
//include 'footer.php';

			