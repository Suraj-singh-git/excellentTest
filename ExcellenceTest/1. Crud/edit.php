<?php 
require 'connection.php';

$id = $_POST['id'];

$select = "SELECT * FROM test_form WHERE id='$id'";
$response = $conn->query($select);

 

 if($response){
 	$data = $response->fetch_assoc();
 	echo json_encode($data); 
 }
	



 ?>