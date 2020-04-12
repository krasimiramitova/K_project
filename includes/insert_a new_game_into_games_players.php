<?php
//include 'header.php';
//include 'db_connect.php';
//include 'read_from_words';

//insert game_id and start of the game
if (isset($_POST['play']))
	{$insert_query = "INSERT INTO `games_players`(`game_id`) VALUES ('".$id."')";
   	 $result = mysqli_query($conn, $insert_query);
//var_dump($result);
//	 if($result)
//		{	echo 'Succesfully added play';}
//	else 
//		{	die('Query failed!' . mysqli_error($conn));}
//	}
   	 $row = mysqli_fetch_assoc($result);
   	 $play_id=$row['play_id'];
   	}
   	die;
//insert player_id 

if (isset($_SESSION['username']))
	{	$username=$_SESSION['username']; 
		$player_id=$_SESSION['player_id'];
		$update_query = "UPDATE `games_players` SET `player_id`='".$player_id."' WHERE play_id = '".$play_id."'";
   		$result_update_player_id = mysqli_query($conn, $update_query);
   	}
//var_dump($result);
if($result_update_player_id)
	{	echo 'Succesfully updated game';}
 	else 
	{	die('Query failed!' . mysqli_error($conn));}
//include 'footer.php';
