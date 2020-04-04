<?php 
include 'includes/header.php';

include 'includes/db_connect.php';
$id = $_GET['id'];

$read_query = "SELECT * FROM ".$table_name." WHERE country_id=".$id;

$result = mysqli_query($conn, $read_query);
if( $result ){
	$row = mysqli_fetch_assoc($result);

}
echo '<form method="post" action="">';
	echo '<p></p><p>Update country</p>
	<input type="text" name="name" value="'.$row['name'].'">
	<input type="hidden" name="id" value="='. $row['country_id'].'">';
	echo '<input type="submit" name="submit" value="save">	
		</form>';

	if (isset($_POST['name']))
	{	
		$id=$_POST['id'];
		$data = $_POST['name'];		
 //UPDATE `countries` SET `name` = 'Turkey' WHERE `countries`.`country_id` = 1;
	$update_query =  "UPDATE `".$table_name."` SET `name`='". $data ."' WHERE country_id ".$id;
	$update_res = mysqli_query($conn, $update_query);
	if( !$update_res )
		{
		echo 'Update failed!' . mysqli_error($conn);
		}
	else 
		{
		header("Location: index_countries.php");
		echo $data." Updated successfully!";
		}
	}

include 'includes/footer.php';
?>