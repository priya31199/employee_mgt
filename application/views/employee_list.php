<!DOCTYPE html>
<html lang="en">
<head>
	<title>Employee Management System</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>

<body>

	<div class="container">
		<div class="row" style="padding: 25px;">
			<a href="<?php echo base_url(); ?>Welcome/add_employee" class="btn btn-primary" style="float:right;">Add Employee</a>
			<div class="col-md-12" style="padding-top: 20px;">
				<table id="example" class="table table-striped table-bordered" style="width:100%;">
				    <thead>
				      <tr>
				        <th>Id</th>
				        <th>Name</th>
				        <th>Mobile Number</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php $i=1; if($myJson){ foreach ($myJson as $values) {  ?>
					      <tr>
					        <td><?php echo $i; ?></td>
					        <td><?php echo $values->name ?></td>
					        <td><?php echo $values->mobile_number ?></td>
					        <td><a href="<?php echo base_url(); ?>Welcome/delete/<?php echo $values->id;?>" class="btn btn-primary delete_rec">Delete</button></td>
					      </tr>
				       <?php $i++; } } ?>
				    </tbody>
		  		</table>
		  	</div>
		  </div>

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
		} 
	);
	</script>

	
<script type="text/javascript">
    
 // $(document).ready(function(){  
   $(document).on('click', ".delete_rec ",function() {

     	$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>Welcome/delete",
				cache: false,
				success: function(resData) {
					 
				}
			});
      });   
</script>


</body>
</html>