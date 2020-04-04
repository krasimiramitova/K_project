  
<?php 
$name_db='travel';
$table_name='countries';
$content='country';

$conn = mysqli_connect('localhost', 'root', '', $name_db);

if( !$conn ){
	die('Connection failed' . mysqli_connect_error() . ' - '. mysqli_connect_errno());
} 
//else {
//	echo "Connected successfully!";}