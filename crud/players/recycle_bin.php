<?php 
include 'includes/header.php';

//1
$read_query = "SELECT * FROM `".$table_name."` WHERE `date_deleted` IS NOT NULL";

$result = mysqli_query($conn, $read_query);

if(mysqli_num_rows($result )){
	
?>
<h2>Recycle Bin</h2>
	<table border="1">		
		<tr>
			<td>#</td>
			<td><?= $content;?></td>
			<td>Permanent Delete</td>
			<td>Restore</td>
		</tr>
		<?php 
		while( $row = mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td></td>
				<td><?= $row['name']?></td>
				<td><a href="delete.php?id=<?= $row['country_id']?>">Permanent Delete</a></td>
				<td><a href="restore.php?id=<?= $row['country_id']?>">Restore</a></td>
			</tr>
			<?php
		}

		?>
	</table>

<?php 

}
else {echo "Recycle bin is empty";}


include 'includes/footer.php'
?>
<p><a href="index_countries.php" class="btn btn-warning">Back To Countries</a></p>