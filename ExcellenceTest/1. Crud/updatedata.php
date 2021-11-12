    <?php 
require 'connection.php';

 $id = $_POST['id'];
 // $id = "5";
$select = "SELECT * FROM test_form WHERE id='$id'";
$response = $conn->query($select);

 

 if($response){
 	$data = $response->fetch_assoc();
 	// print_r($data);
  $id = $data['id'];
 	$name = $data['name'];
 	$email = $data['email'];
 	$designation = $data['designation'];
 	$salary = $data['salary'];
 	$date = $data['date'];  
 }
	
 ?>

<?php
  echo '<form class="update-form">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>NAME</label>
       <input type="text" class="d-none" value="'?><?php echo $id?> <?php echo '" name="curr_id">
      <input type="text" value="'?><?php echo $name ?> <?php echo '" name="name" class="form-control required"  placeholder="NAME">
    </div>
    <div class="form-group col-md-6">
      <label>EMAIL</label>
      <input type="email" value="'?><?php echo $email ?> <?php echo '"   name="email" class="form-control required email-val" placeholder="EMAIL">
    </div>
    
  </div>
  <div class="form-group">
    <label>DESIGNATION</label>
    <input type="text" name="desig" value="'?><?php echo $designation ?> <?php echo '"  class="form-control required" placeholder="DESIGNATION">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label>SALARY</label>
      <input type="text" name="salary" value="'?><?php echo $salary ?> <?php echo '" class="form-control required" placeholder="SALARY"    >
    </div>
    <div class="form-group col-md-6">
      <label>DATE</label>
      <input type="date" name="date" value="'?><?php echo $date?><?php echo '" class="form-control required" placeholder="DATE" >
    
    </div>
    
  </div>
  
  
<button type="submit" class="btn btn-danger update">UPDATE NOW</button>

</form>
        ';

?>