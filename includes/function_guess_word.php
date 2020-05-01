<?php 
function guess_word($guess, $word)
{	$guess=mb_strtoupper($guess);
	if ($guess==$word)	
		{$check_guess='right';}
	else
		{$check_guess='wrong';}
	return $check_guess;
}	
