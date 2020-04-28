<?php
session_start();
include '../../includes/header.php';
include '../../includes/db_connect.php';
echo '<form action="play.php" method="post">';
if (isset($_SESSION['username']))
	{echo 'Choose a level and a category, '.$_SESSION['username'].'!<p>';}
include '../../includes/read_from_levels.php';
include '../../includes/read_from_categories.php';
	echo '</p><input type="submit" name="play" value="PLAY">';
echo '</form>';
include '../../includes/footer.php';