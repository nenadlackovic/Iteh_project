<div class="modal fade" id="exampleModal<?php echo $idd; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      

      <form method="get" class="register-form" name="register-form" id="register-form">
      <?php  
      $json_string = @file_get_contents('http://localhost:3000/films/'.$idd);
      $parsed_json = json_decode($json_string, true);
      $title = $parsed_json["ImeFilma"];
      $date = $parsed_json["GodinaProizvodnje"];
      $duration = $parsed_json["Trajanje"];
      $overview = $parsed_json["Opis"];
      ?>
      <div class="modal-body">
        <div class="input-group mb-3">
			<div class="input-group-prepend"> <span class="input-group-text">Title</span> </div>
			<input type="text" id="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="title" value="<?php echo $title; ?>"> 
        </div>
        <div class="input-group mb-3">
			<div class="input-group-prepend"> <span class="input-group-text" >Duration</span> </div>
			<input type="text" id="duration" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="duration" value="<?php echo $duration; ?>"> 
        </div>
        <div class="input-group mb-3">
			<div class="input-group-prepend"> <span class="input-group-text" >Release date</span> </div>
			<input type="text" id="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="date" value="<?php echo $date; ?>"> 
        </div>
        <div class="input-group mb-3">
			<div class="input-group-prepend"> <span class="input-group-text" >Overview</span> </div>
			<input type="text" id="overview" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="overview" value="<?php echo $overview; ?>"> 
        </div>
      </div>
      <div id="result"></div>
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id ="save" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>




