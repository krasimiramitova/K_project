<?php
	echo'<select name="level">';
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

			