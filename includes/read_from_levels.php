<?php
//include 'header.php';
//include 'db_connect.php';
//echo '<form action="" method="post">';
	echo'<select name="level">';
	$read_query = "SELECT levels.level_name FROM levels WHERE language_id=1";
	$result = mysqli_query($conn, $read_query);
	if( $result )
		{$row = mysqli_fetch_assoc($result);}
	$level_query = "SELECT * FROM levels WHERE language_id=1";
	$level_result = mysqli_query($conn, $level_query); 
	if( mysqli_num_rows($level_result) > 0 )
		{
			while($level_row = mysqli_fetch_assoc($level_result))
				{echo '<option value="'.$level_row['level_name'].'">';
				echo $level_row['level_name'].'</option>';
				}
		}	
	echo '</select>';
//	echo '<input type="submit" name="play" value="PLAY">';
//echo '</form>';

//include 'footer.php';

			