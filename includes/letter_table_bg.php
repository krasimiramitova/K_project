<?php
$leter='А';
echo '<table>';
	for ($k=1; $k<4; $k++)
	{echo '<tr>';
		for ($l=1; $l<11; $l++)
		{echo '<td>
			<form action="" method="get">
			<input type = "submit" value = "'.$leter.'">
			</form>
			</td>';
		if ($leter=='Я') {break;}
		switch ($leter) 
			{
			case 'А':
				$leter='Б';
				break;
			case 'Б':
				$leter='В';
				break;
			case 'В':
				$leter='Г';
				break;
			case 'Г':
				$leter='Д';
				break;
			case 'Д':
				$leter='Е';
				break;
			case 'Е':
				$leter='Ж';
				break;
			case 'Ж':
				$leter='З';
				break;
			case 'З':
				$leter='И';
				break;
			case 'И':
				$leter='Й';
				break;
			case 'Й':
				$leter='К';
				break;
			case 'К':
				$leter='Л';
				break;
			case 'Л':
				$leter='М';
				break;
			case 'М':
				$leter='Н';
				break;
			case 'Н':
				$leter='О';
				break;
			case 'О':
				$leter='П';
				break;
			case 'П':
				$leter='Р';
				break;
			case 'Р':
				$leter='С';
				break;
			case 'С':
				$leter='Т';
				break;
			case 'Т':
				$leter='У';
				break;
			case 'У':
				$leter='Ф';
				break;
			case 'Ф':
				$leter='Х';
				break;
			case 'Х':
				$leter='Ц';
				break;
			case 'Ц':
				$leter='Ч';
				break;
			case 'Ч':
				$leter='Ш';
				break;
			case 'Ш':
				$leter='Щ';
				break;
			case 'Щ':
				$leter='Ъ';
				break;
			case 'Ъ':
				$leter='ь';
				break;
			case 'ь':
				$leter='Ю';
				break;
			case 'Ю':
				$leter='Я';
				break;
			case 'Я':
				break;
			}
		 
		}
	echo '</tr>';
	}

echo '</table>';