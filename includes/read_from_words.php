<?php
if (!isset($_SESSION['game_id']))
	{if (isset($_SESSION['category']))
		{
		$read_query = "SELECT games.word, games.game_id FROM `games` 
		LEFT JOIN categories ON (games.category_id= categories.category_id)
		LEFT JOIN levels ON (games.level_id= levels.level_id)
		WHERE categories.category='".$_SESSION['category']."'AND  levels.level_name='".$_SESSION['level']."'";
		$words=[];
		$result = mysqli_query($conn, $read_query);
		if( mysqli_num_rows($result) > 0 )
			{
				$i = 1;
				while($row = mysqli_fetch_assoc($result))
					{
					$words[$i][0]=$row['game_id'];
					$words[$i][1]=$row['word'];
					$i++;
					}
				$num_game=mt_rand(1,$i-1);
				$_SESSION['game_id']=$words[$num_game][0];
			}
		}
	else {echo "Ops!!! We've lost the category you play in!";}
	}

			