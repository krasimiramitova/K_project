<?php 
include 'includes/header.php';
?>

<form method="post" action="">
	<?php
			echo '<p>Enter new country </p>
			<input type="text" name="country">
			<input type="submit" name="submit" value="save">	
		</form>';
		

//var_dump($_POST['country']);
//1 
	if (isset($_POST['country']))
	{
		$data = $_POST['country'];

//2 insert_query
		$insert_query = "INSERT INTO `".$table_name."`(`name`) VALUES ('$data')";
//3
		$result = mysqli_query($conn, $insert_query);

//var_dump($result);
	if($result)
		{
		echo 'Succesfully added '.$data;
		}
 	else 
		{
		die('Query failed!' . mysqli_error($conn));
		}
	}
echo '<p></p><p><a href="index_countries.php" class="btn btn-warning">To base</a></p>';

include 'includes/footer.php';
?>