<?php
switch ($_SESSION['level']) 
		{
		case ('easy'):
			$fails=10;
			break;
		case ('medium'):
			$fails=8;
			break;
		case ('hard'):
			$fails=6;
			break;
		}
	