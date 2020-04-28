<?php
if (isset($_POST['play']))
	{$insert_play = "INSERT INTO `game_players`(`play_date_start`,`game_id`) VALUES (CURRENT_TIMESTAMP,'".$_SESSION['game_id']."')";
   $insert_play_result=mysqli_query($conn, $insert_play);
      if($insert_play_result)
      {
         $select_play="SELECT * FROM `game_players` WHERE play_id= (SELECT MAX(`play_id`) FROM game_players)";
         $result_select_play=mysqli_query($conn, $select_play);
         if ($result_select_play)
            {$row = mysqli_fetch_assoc($result_select_play);
            $_SESSION['play_id']=$row['play_id'];
            $_SESSION['play_date_start']=$row['play_date_start'];
            }  
      }
      else {"Something went wrong!";} 
   }
if (isset($_SESSION['player_id']))
	{$update_play = "UPDATE `game_players` SET `player_id`='".$_SESSION['player_id']."' WHERE play_id = '".$_SESSION['play_id']."'";
   		$result_update_player_id = mysqli_query($conn, $update_play);
   }


