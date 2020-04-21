<?php 
function guess_word($guess, $word)
{	$guess=mb_strtoupper($guess);
	if ($guess==$word)	
		{$mistake=0;}
	else
		{$mistake=1;}
	return $mistake;
}	
