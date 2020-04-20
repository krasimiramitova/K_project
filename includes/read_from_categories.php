<?php
	echo'<select name="category">';
	$category_query = "SELECT * FROM categories WHERE language_id=1";
	$category_result = mysqli_query($conn, $category_query); 
	if( mysqli_num_rows($category_result) > 0 )
		{
			while($category_row = mysqli_fetch_assoc($category_result))
				{echo '<option value="'.$category_row['category'].'">';
				echo $category_row['category'].'</option>';
				}
		}
		echo '</select>';

			