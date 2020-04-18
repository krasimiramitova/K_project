<?php 
function guess_letter($guess, $arr, $guess_array)
{	if (array_search($guess,$arr)>-1)	
	{for ($i=0; $i<count($arr); $i++)
		{if ($arr[$i]==$guess)
			{$guess_array[$i]=$guess.' ';
			}
		}
	return $guess_array;
	}
	else
		{$mistake=1; 
		return $mistake;
	}
}	
