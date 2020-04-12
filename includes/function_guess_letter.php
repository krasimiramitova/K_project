<?php 
function guess_letter($guess, $arr, $guess_array, $mistake)
{	if (array_search($guess,$arr)>-1)	
	{echo '<p></p>';
	for ($i=0; $i<count($arr); $i++)
		{if ($arr[$i]==' ')
			{echo '<p></p>';}
		elseif ($arr[$i]==$guess)
			{$guess_array[$i]=$guess.' ';
			echo $guess_array[$i];}
		else
			{echo $guess_array[$i];}
		}
	return $guess_array;
	}
	else
		{$mistake++; 
		return $mistake;
	}
}	
