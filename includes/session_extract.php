<?php
if (!isset($_SESSION))
{
	$guess_letters=$_SESSION['guess_letters'];
	$get_argument=$_SESSION['get_argument'];
	$arr=$_SESSION['arr'];
	$guess_array=$_SESSION['guess_array'];
	$mistake=$_SESSION['mistake'];
	$tryings=$_SESSION['tryings'];
	$try=$_SESSION['try'];
}
else {
	$guess_letters=[];
	$get_argument=1;
	$arr=[];
	$guess_array=[];
	$mistake=0;
	$tryings=10;
	$try=1;
	}