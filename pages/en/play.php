<?php 
include '../../includes/header.php';
include '../../includes/function_guess.php';
?>
play <a href="../bg/play.php">бг</a>
<p>
	under construction

</p>
<?php
//letter table
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
//game
	$word='Argentina';
	$word=mb_strtoupper($word);
	$count_empty=mb_strlen($word);
	$guess_array=[];
	$arr=preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);
	for ($i=0; $i<$count_empty; $i++)
	{if ($arr[$i]!=' ')
		{$guess_array[$i]='_ ';
		echo '_ ';}
		else
		{$guess_array[$i]=$arr[$i];
		echo '<p></p>';}
	}
echo '<p></p>';
$mistake=0;
//
	
$q=0;
if (!empty($_GET['letter']))
{
	$guess=$_GET['letter'];
//die;
//	while ($count_empty>0)
//	{
		$result=guess($guess, $arr, $guess_array,$mistake);
		if (is_numeric($result))
			{echo "You almost guess";
				$mistake=$result;
			}
		else {$guess_array=$result;
			}
		$arr=$guess_array;

	$count_empty=0;
	for ($h=0; $h<count($arr); $h++)
		{
			if ($arr[$h]=='_ ')
			{$count_empty++;}
		}


	$guess_letters[$q]=$_GET['letter'];
	$guess=$guess_letters[$q];
	$q++;	
//	}
}
else
{echo 'CHOOSE A LETTER';}
include '../../includes/footer.php';
?>