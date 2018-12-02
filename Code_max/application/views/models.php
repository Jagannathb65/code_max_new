<?php 
// echo "<pre>";
// print_r($dis_manufacturer);
// echo "</pre>"; exit();
  // echo "dfs"; exit();
// print_r($manufacturer); exit();
 ?>

<html>
<head>
  <title>Add and View Models</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Model</h2>
  <form  action="<?php echo base_url().'index.php/models/insert_model' ?>" method="post" enctype="multipart/form-data" id="form">
    <div class="form-inline">
    <div class="form-group">
      <label for="email">Model Name:</label>
      <input type="text" class="form-control val" placeholder="Enter Model" name="model_name" required="">
    </div>

    <div class="form-group">
      <label for="pwd">Choose Manufacture:</label>
     
      <select class="form-control val" name="choose_manu" required="" style="width:200px">
       <?php
        foreach ($manufacturer as $key => $value) {
          echo '<option value='.$value->id.'>'.$value->name.'</option>';
        }
       ?>
      </select>
    </div>
    </div>

    <div class="form-group">
      <label for="usr">Color:</label>
      <input type="text" class="form-control val" name="color" required="">
    </div>

    <div class="form-group">
      <label for="pwd">Manufacturing Number:</label>
      <input type="text" class="form-control val" name="manu_number" required="">
    </div>

     <div class="form-group">
      <label for="pwd">Registration Number:</label>
      <input type="text" class="form-control val" name="regi_number" required="">
    </div>

    <div class="form-inline">
      <label for="pwd">Image1:</label>
      <input type="file" class="form-control val" id="Image1" name="Image1" required="">
      <br />
      <input type="hidden" name="first_image" value="" id="first_image">
      <span id="uploaded_image1"></span>

    
      <label for="pwd">Image2:</label>
      <input type="file" class="form-control val" id="Image2" name="Image2" required="">
      <input type="hidden" name="second_image" value="" id="second_image">
      <span id="uploaded_image2"></span>
    </div>
    <br><br>
    <div class="form-group">
       <input type="submit" class="btn btn-info" value="Submit Button" id="submit_val">
    </div>
  </form>
</div>


<!--Show all models in table format -->
<div class="container">
  <h2>Models Details</h2>
    
  <table class="table table-condensed">
      <thead>
      <tr>
        <th>Sl No</th>
        <th>Manufacturer Name</th>
        <th>Model Name</th>
        <th class="hide">Manu id</th>
        <th>Count</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
          foreach ($dis_manufacturer as $key => $value) {       
        ?>
        <tr>
          <td><?=$key?></td>
          <td><?=$value['name']?></td>
          <td class="name"><?=$value['model_name']?></td>
          <td class="model_name hide"><?=$value['choose_manu']?></td>
          <td><?=$value['Total']?></td>
          <td>
            <button class="view_details">View Details</button> 
          </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    
  </table>
</div>


<!-- Modal Popup -->
<div class="modal fade" id="your-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>


</body>
</html>
<script>
$(document).ready(function(){
 $(document).on('change', '#Image1', function(){
  // alert(); return false;
  var name = document.getElementById("Image1").files[0].name;
  var form_data = new FormData();
  // console.log(form_data); return false;
   form_data.append("file", document.getElementById('Image1').files[0]);
   $.ajax({
    url:"<?php echo base_url().'index.php/models/temp_image_upload'?>",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image1').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image1').html(data);
     $('#first_image').val(data);
    }
   });
  
 });

 $(document).on('change', '#Image2', function(){
  // alert(); return false;
  var name = document.getElementById("Image2").files[0].name;
  var form_data = new FormData();
  // console.log(form_data); return false;
   form_data.append("file", document.getElementById('Image2').files[0]);
   $.ajax({
    url:"<?php echo base_url().'index.php/models/temp_image_upload'?>",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image2').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image2').html(data);
     $('#second_image').val(data);
    }
   });
  
 });

$('.view_details').click(function () {
        var name = $(this).parents('tr').find('.name').text();
        var model_name = $(this).parents('tr').find('.model_name').text();
        $.ajax({
            url: "<?php echo base_url().'index.php/models/get_details_model' ?>",
            type: "post",
            data: {model_name: name, choose_manu: model_name},
            success: function(d) {
                console.log(d); 
                $('.modal-body').html(d);
                $('#your-modal').modal('toggle');
            }
        });

});


});
</script>