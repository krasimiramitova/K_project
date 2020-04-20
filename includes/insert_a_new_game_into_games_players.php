<?php
if (isset($_POST['play']))
	{$insert_play = "INSERT INTO `game_players`(`game_id`) VALUES ('".$_SESSION['game_id']."')";
   $select_play="SELECT * FROM `game_players` WHERE play_id= (SELECT MAX(`play_id`) FROM game_players)";
   $result_select_play=mysqli_query($conn, $select_play);
   if ($result_select_play)
      { $row = mysqli_fetch_assoc($result_select_play);
      $_SESSION['play_id']=$row['play_id'];
      $_SESSION['play_date_start']=$row['play_date_start'];
      }   
   }
if (isset($_SESSION['player_id']))
	{$update_play = "UPDATE `game_players` SET `player_id`='".$_SESSION['player_id']."' WHERE play_id = '".$_SESSION['play_id']."'";
   		$result_update_player_id = mysqli_query($conn, $update_play);
   }

