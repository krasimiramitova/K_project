<?php
//include 'header.php';
//include 'db_connect.php';

$read_query = "SELECT categories.category_id, categories.category FROM categories WHERE language_id=1";
$result = mysqli_query($conn, $read_query);
if( $result )
	{$row = mysqli_fetch_assoc($result);}
$category_query = "SELECT * FROM categories WHERE language_id=1";
$category_result = mysqli_query($conn, $category_query); 
if( mysqli_num_rows($category_result) > 0 )
	{
	echo '<form action="" method="get">';
		echo'<select>';
			while($category_row = mysqli_fetch_assoc($category_result))
				{echo '<option value="'.$category_row['category'].'">';
				echo $category_row['category'].'</option>';
				}
		echo '</select>';
		echo '<input type="submit" name="play" value="PLAY">';
	echo '</form>';
	}
//include 'footer.php';

			