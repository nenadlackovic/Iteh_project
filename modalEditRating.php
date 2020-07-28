<?php 

$jso2 = @file_get_contents('http://localhost:3000/grades');
$ocene = json_decode($jso2, true);

$korisnik = $_SESSION['userId'];

for ($k = 0; $k < @count($ocene); $k++){
  if ($ocene[$k]["korisnik"]["KorisnikId"] == $korisnik){
      if( $ocene[$k]["film"]["FilmId"] == $idd){ 

        $komentar = $ocene[$k]["komentar"];
        $brojcana = $ocene[$k]["brojcanaOcena"];
        $idOcene = $ocene[$k]["ocenaId"];
   } 
   } 
   } 

   
?>

<div class="modal fade" id="rateEdit<?php echo $idd; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<meta charset="UTF-8">  
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">    
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      

      <form method="POST" action="actionEditRating.php?ocenaId=<?php echo $idOcene; ?>" enctype="multipart/form-data">
     
      <div class="modal-body text-muted">
      <label for="exampleFormControlSelect1">Comment</label>
        <div class="input-group mb-3">
        
        <input type="text" class="form-control" id="komment" name="komment" rows="2" value="<?php echo $komentar; ?>">
        </div>

        <label for="exampleFormControlSelect2">Rating</label>
    <select class="form-control" name="rating" id="rating">
    
    <?php if ($brojcana == 5){?>
      <option selected value=5 >5</option>
      <option value=4 >4</option>
      <option value=3 >3</option>
      <option value=2 >2</option>
      <option value=1 >1</option>
    <?php } ?>

    <?php if ($brojcana == 4){?>
      <option value=5 >5</option>
      <option selected value=4 >4</option>
      <option value=3 >3</option>
      <option value=2 >2</option>
      <option value=1 >1</option>
    <?php } ?>

    <?php if ($brojcana == 3){?>
      <option value=5 >5</option>
      <option value=4 >4</option>
      <option selected value=3 >3</option>
      <option value=2 >2</option>
      <option value=1 >1</option>
    <?php } ?>

    <?php if ($brojcana == 2){?>
      <option value=5 >5</option>
      <option value=4 >4</option>
      <option value=3 >3</option>
      <option selected value=2 >2</option>
      <option value=1 >1</option>
    <?php } ?>

    <?php if ($brojcana == 1){?>
      <option value=5 >5</option>
      <option value=4 >4</option>
      <option value=3 >3</option>
      <option value=2 >2</option>
      <option selected value=1 >1</option>
    <?php } ?>
      
     
      
    </select>
  </div>

      
      
      
      <div class="modal-footer">
        <button type="submit" id ="save" class="btn btn-primary">Edit</button>
        <button type="submit" id ="dalete" class="btn btn-secondary"
        onclick="deleteRate(<?php echo $idOcene; ?>);">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>




