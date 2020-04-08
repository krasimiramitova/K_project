<?php
include 'header.php';
include 'db_connect.php';

//1 destinations
$read_query = "SELECT games.word, categories.category FROM `games` LEFT JOIN categories ON (games.category_id= categories.category_id)
WHERE categories.language_id=1";

$result = mysqli_query($conn, $read_query);

if( mysqli_num_rows($result) > 0 ){
	
?>
<!--
<table style="margin-left: 50px" class="table table-striped">
	<tr>
		<td>#</td>
		<td>word</td>>
		<td>category</td> 	
	</tr>-->
<?php
$num = 1;
	while($row = mysqli_fetch_assoc($result))
	{
//		echo '
//		<tr>
//			<td>'. 
			$num++
			;
//			.'</td>
//			<td>'. $row['word'] .'</td>	
//			<td>'. $row['category'] .'</td>		
//		</tr>';
	}
?>
<!--		<tr>
			<td></td>
			<td><a href="destinations\index_destinations.php">Edit Destinations</a></td>	
			<td><a href="countries\index_countries.php">Edit Countries</a></td>		
		</tr>'; 
</table>-->


<?php

} else {
	die('Query failed!' . mysqli_error($conn));
}

include 'footer.php';

			