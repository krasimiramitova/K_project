<?php
$leter='A';
echo '<table>';
	for ($k=1; $k<4; $k++)
	{echo '<tr>';
		for ($l=1; $l<11; $l++)
		{echo '<td>
			<form action="" method="get">
			<input type = "submit" name="letter" value = "'.$leter.'">
			</form>
			</td>';
		if ($leter=='Z') {break;}
		$leter++;
		}
	echo '</tr>';
	}

echo '</table>';