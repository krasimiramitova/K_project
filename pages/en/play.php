<?php 
include '../../includes/header.php';
?>
play <a href="../bg/play.php">бг</a>
<p>
	under construction

</p>
<?php

	$word='канара на гъза';
	//echo mb_strlen($word);
	$word=mb_strtoupper($word);
	//echo $word; die;
	$guess_array=[];
	$arr=preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);
	for ($i=0; $i<mb_strlen($word); $i++)
	{if ($arr[$i]!=' ')
		{$guess_array[$i]='_ ';
		echo '_ ';}
		else
		{$guess_array[$i]=$arr[$i];
		echo '<p></p>';}
	}
echo '<p></p>';
$guess='а';	
$mistake=0;
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
$guess='а';
//guess('а', $arr, $guess_array,$mistake);
$result=guess($guess, $arr, $guess_array,$mistake);
if (is_numeric($result))
	{echo "You almost guess";
		$mistake=$result;
	}
else {$guess_array=$result;
	}




	

include '../../includes/footer.php';
?>