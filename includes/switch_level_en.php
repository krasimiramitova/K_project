<?php
switch ($_SESSION['level']) 
		{
		case ('easy'):
			$tryings=10;
			break;
		case ('medium'):
			$tryings=8;
			break;
		case ('hard'):
			$tryings=6;
			break;
		}
	