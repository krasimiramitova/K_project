<?php
//include 'header.php';
include 'db_connect.php';
echo '<form action="" method="post">';
include 'read_from_levels.php';
include 'read_from_categories.php';
	echo '<input type="submit" name="play" value="PLAY">';
echo '</form>';
include 'read_from_words.php';
//include 'footer.php';