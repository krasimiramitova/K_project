<?php
	$current_date =date('Y-m-d H:i:s');
	$current=date_create($current_date);
	$start_date=date_create($_SESSION['play_date_start']);
	$d=date_diff($current,$start_date);
	$duration=$d->format("%H:%I:%S");
	$update_play_status = "UPDATE `game_players` SET `play_date_finished` = '".$current_date."', `play_duration` = '".$duration."', `play_status` = '".$play_status."' WHERE `game_players`.`play_id` = '".$_SESSION['play_id']."'";
	$update_res = mysqli_query($conn, $update_play_status);