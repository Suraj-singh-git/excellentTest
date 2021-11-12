
<!DOCTYPE html>
<html>
<head>
   <title>CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script   src="main.js"></script>
</head>
<body>

	<?php
	error_reporting(0);
	require 'connection.php'; 

	if(isset($_GET['id']))
    {

        $select = "SELECT * FROM test_form Where id=".$_GET['id'];
        $response =$conn->query($select);
        if($response-> num_rows != 0)
        {
            foreach($response as $val)
            {
                $result = $val;
            }
        }
       
    }



	 ?>
	<div class="container">
		<h3 class="text-center">Registration From</h3>
		<div class="row">
			<div class="col-md-1">
				
			</div>
			<div class="col-md-10">
				<form class="test-form">
  <div class="form-row">
  	<div class="form-group col-md-6">
      <label>NAME</label>
      <input type="text" name="name" class="form-control required" value="<?php echo $result['name']; ?>" placeholder="NAME">
    </div>
    <div class="form-group col-md-6">
      <label>EMAIL</label>
      <input type="email" name="email" class="form-control required email-val" placeholder="EMAIL">
    </div>
    
  </div>
  <div class="form-group">
    <label>DESIGNATION</label>
    <input type="text" name="desig" class="form-control required" placeholder="DESIGNATION">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label>SALARY</label>
      <input type="number" name="salary" class="form-control required" placeholder="SALARY">
    </div>
    <div class="form-group col-md-6">
      <label>DATE</label>
      <input type="date" name="date" class="form-control required" placeholder="DATE">
  	
    </div>
    
  </div>
  
  <button type="submit" class="btn btn-primary submit">SUBMIT</button>

  <button type="submit" class="btn btn-primary update d-none">UPDATE</button>

</form>
			</div>
			<div class="col-md-1"></div>
			
		</div>

	</div>


	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12 table-responsive">
				<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">NAME</th>
		      <th scope="col">EMAIL</th>
		      <th scope="col">DESIGNATION</th>
		      <th scope="col">SALARY</th>
		      <th scope="col">DATE</th>

		    </tr>
		  </thead>
		  <tbody>
		   	<?php 

		   		require 'connection.php';

		   		$select = "SELECT * FROM test_form";

		   		$response = $conn->query($select);

		   		if($response -> num_rows != 0 )
				{
					foreach ($response as $value) {
						?>
							<tr>
								<td><?php echo $value['id']; ?></td>
								<td><?php echo $value['name']; ?></td>
								<td><?php echo $value['email']; ?></td>
								<td><?php echo $value['designation']; ?></td>
								<td><?php echo $value['salary']; ?></td>
								<td><?php echo $value['date']; ?></td>
								<td><button value="<?php echo $value['id']; ?>" class="btn btn-info edit">EDIT</button></td>
								<td><button value="<?php echo $value['id']; ?>" class="btn btn-danger delete">DELETE</button></td>
							</tr>
						<?php
					}
				}

		   	 ?>

		  </tbody>
		</table>
			</div>
		</div>
	</div>

	 
</body>



<!--Delete confirm modal -->



<div class="modal" id="confirm">

  <div class="modal-dialog modal-xl">
    
    <div class="modal-content delete-message">
      
      <div class="modal-header">
        <h3 class="modal-title">Edit Form</h3>
      </div>
      
      <div class="modal-body form-contain">
  
      </div>

      <div class="modal-footer">
        
        <button class="btn btn-primary" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>

<!--Delete confirm modal -->

</html>
