<link rel="stylesheet" type="text/css" href="css/rate.css">
<div class="modal fade" id="rate<?php echo $idd; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate</h5>
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
        <textarea class="form-control" id="comment" rows="2" placeholder="Add comment"></textarea>
        </div>

        <div class="input-group mb-3">
        <div class="rating" id="star" name='star'> 
        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> 
        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> 
        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> 
        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
        </div>
        </div>

      
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id ="save" class="btn btn-primary" 
        onclick="rate(<?php echo $idd; ?>, <?php echo $_SESSION['userId']; ?>);">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>




