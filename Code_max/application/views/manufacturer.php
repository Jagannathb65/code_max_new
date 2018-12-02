<!DOCTYPE html>
<html>
<head>
	<title>Add Manufacturer</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Manufacturer Details</h2>
  <div style="float: right;">
  	<input type="button" class="btn btn-info" value="Add Model" id="add_model">
  </div>
  	
	<table class="table table-condensed">
			<thead>
			<tr>
				<th>Sl No</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
				<?php
					foreach ($manufacturer as $key => $value) {				
				?>
				<tr>
					<td class ="id"><?=$value->id?></td>
					<td contenteditable="false" class="name" onchange="save()"><?=$value->name?></td>
					<td><button class="editbtn">Edit</button><br>
						<button class="deletebtn">Delete</button>	
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		
	</table>
</div>

<div class="container">
  <h2>Add Manufacturer</h2>
  <form action="<?php echo base_url().'index.php/manufacture/add_new'?>" method="post">
  	<div class="form-group">
	  <label for="usr">Name:</label>
	  <input type="text" class="form-control" required="required" name="manufacture">
	</div>
  	<input type="submit" class="btn btn-info" value="Submit Button">
  </form>
  
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function () {
          $('.editbtn').click(function () {

          	if($(this).html() == 'Edit'){
              var currentTD = $(this).parents('tr').find('td');
              // alert(currentTD); return false;
              if ($(this).html() == 'Edit') {
                  currentTD = $(this).parents('tr').find('td');
                  // alert(currentTD); return false;
                  $.each(currentTD, function () {
                      $(this).prop('contenteditable', true)
                      $('.name').focus()
                  });
              } else {
                 $.each(currentTD, function () {
                      $(this).prop('contenteditable', false)
                  });
              }
    		}
    		else if($(this).html() == 'Save'){
    			var currentTD = $(this).parents('tr').find('td');
                  // alert(currentTD); return false;
                  $.each(currentTD, function () {
                      $(this).prop('contenteditable', false)
                  });
                  var name = $(this).parents('tr').find('.name').text();
                  var id = $(this).parents('tr').find('.id').text();

                  $.ajax({
		                url: "<?php echo base_url().'index.php/manufacture/update_manufacture' ?>",
		                type: "post",
		                data: {name: name, id: id},
		                success: function(d) {
		                    if(d == 'true'){
		                    	window.location.reload(true);
		                    }
		                    else{
		                    	alert('Data is not been updated');
		                    }
		                }
		           });
                  console.log(id);
    		}
              $(this).html($(this).html() == 'Edit' ? 'Save' : 'Edit')
    
          });



          $('.deletebtn').click(function () {
                  var id = $(this).parents('tr').find('.id').text();
		           $.post("<?php echo base_url().'index.php/manufacture/delete_manufacture' ?>", {delete: id}, function(id){
				       window.location.reload(true);
				   });
    
          });


          $('#add_model').click(function(){
          		location.href = "<?php echo base_url().'index.php/models/add_models' ?>";
          });

    
      });
</script>