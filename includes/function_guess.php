<?php 
function guess($guess, $arr, $guess_array, $mistake)
{	
	$guess=mb_strtoupper($guess);
	for ($j=0; $j<count($arr); $j++)
	{
		if  ($arr[$j]==$guess)
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
	elseif ($j==count($arr)-1) 
		{$mistake++; 
		return $mistake;
		}
	}
}	
