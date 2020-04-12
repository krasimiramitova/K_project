<?php
session_start();
include '../../includes/header.php';
include '../../includes/db_connect.php';
echo '<form action="play.php" method="post">';
include '../../includes/read_from_levels.php';
include '../../includes/read_from_categories.php';
	echo '<input type="submit" name="play" value="PLAY">';
echo '</form>';
include '../../includes/footer.php';