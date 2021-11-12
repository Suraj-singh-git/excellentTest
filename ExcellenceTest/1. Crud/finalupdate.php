<?php
    require 'connection.php';
    $name = $_POST['name'];
 	$email = $_POST['email'];
 	$designation = $_POST['desig'];
 	$salary = $_POST['salary'];
 	$date = $_POST['date'];  
    $curr_id = $_POST['curr_id'];

    $update_query = "UPDATE test_form 
                      SET name = '$name',
                      email ='$email',
                      designation ='$designation',
                      salary='$salary',
                      date = '$date' 
                      WHERE id = '$curr_id' 
                       ";
    $response = 	$conn->query($update_query);
    if($response){
    	echo "success";
    }                  
    else{
    	echo "failed update";
    } 

?>