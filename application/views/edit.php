<!DOCTYPE html>
<html lang="en">
<head>
	<title>Employee Management System</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

	<div class="container">
		<div class="row" style="padding: 25px;">
			<div class="col-md-8" style="border: 1px solid #000;">
				<h4><center>Employee Form</center></h4>
				<form class="form-horizontal" id="form" method="POST">
				    <div class="form-group">
				      <input type="text" class="form-control" id="id" name="id">
				      <label class="control-label col-sm-4" for="name">Name:</label>
				      <div class="col-sm-8">
				        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-sm-4" for="name">Mobile Number:</label>
				      <div class="col-sm-8">
				        <input type="text" class="form-control" id="mobile_number" placeholder="Enter mobile number" name="mobile_number">
				      </div>
				    </div>
				    
				    <div class="form-group">        
				      <div class="col-sm-offset-4 col-sm-8">
							<input id="submit" class="btn btn-primary" type="submit" value="Submit">
				      </div>
				    </div>
		  		</form>
		  	</div>

		  	<div class="col-md-4">
				<center><a href="<?php echo base_url(); ?>" class="btn btn-primary">Employee List</a></center>
			</div>
		</div>


	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
	<script type="text/javascript">
  	
  	$('form').on('submit', function (e) {
        e.preventDefault();
		var name = document.getElementById("name").value;
		var mobile_number = document.getElementById("mobile_number").value;
		var dataString = 'name=' + name + 'mobile_number=' + mobile_number;
		
		if (name == '' || mobile_number == '') {
			alert("Please Fill All Fields");
		} else {

			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>Welcome/update",
				data: dataString,
				cache: false,
				success: function(resData) {
					alert("Record updated");
					 
				}
			});
		}
		return false;
	});
  		 

</script>


	
<script type="text/javascript">
    
 $(document).ready(function(){  
    var id = $(this).val();
     	$.ajax({
				type: "GET",
				url: "<?php echo base_url(); ?>Welcome/get_data",
				dataType: "json",
				data: {'id':id},
				cache: false,
				success: function(data) {
				  	var obj =  JSON.stringify(data);  
	              	console.log(data);
	              	console.log(obj);
					$('#id').val(obj[0]['id']);
					$('#name').val(obj[0]['name']);
					$('#mobile_number').val(obj[0]['mobile_number']);

				}
			});
      });   
</script>

</body>
</html>