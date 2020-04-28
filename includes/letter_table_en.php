<?php
//$guess_letters=['D','K'];
//$try=2;
//$get_argument='letter'.$try;
$letter='A';
	echo '<table>';
		for ($k=1; $k<4; $k++)
		{echo '<tr>';
			for ($l=1; $l<11; $l++)
			{echo '<td>
				<form action="" method="get">
				<input class="btn btn-default" type = "submit"';
			if (!empty($_SESSION['guess_letters']))
			{$q=0;	
			for ($q=0; $q<count($_SESSION['guess_letters']); $q++)		//check for used letters
				{if ($letter==$_SESSION['guess_letters'][$q])
					{echo 'disabled="disabled" style="text-decoration: line-through;"';}
				}
			}
			echo 'name="letter" value = "'.$letter.'" >
				</form>
				</td>';
			if ($letter=='Z') {break;}
			$letter++;
			}
		echo '</tr>';
		}
	echo '</table>';
//$_SESSION[$get_argument]=$_GET[$get_argument];
