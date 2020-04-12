<?php
//$guess_letters=['D','K'];
//$try=2;
//$get_argument='letter'.$try;
$leter='A';
	echo '<table>';
		for ($k=1; $k<4; $k++)
		{echo '<tr>';
			for ($l=1; $l<11; $l++)
			{echo '<td>
				<form action="" method="get">
				<input type = "submit"';
			if (!empty($guess_letters))
			{$q=0;	
			for ($q=0; $q<count($guess_letters); $q++)		//check for used letters
				{if ($leter==$guess_letters[$q])
					{echo 'disabled="disabled" style="text-decoration: line-through;"';}
				}
			}
			echo 'name="'.$get_argument.'" value = "'.$leter.'" >
				</form>
				</td>';
			if ($leter=='Z') {break;}
			$leter++;
			}
		echo '</tr>';
		}
	echo '</table>';
//$_SESSION[$get_argument]=$_GET[$get_argument];
