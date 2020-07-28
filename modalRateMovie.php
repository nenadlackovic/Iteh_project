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
      
      

      
      <form method="POST" action="actionAddRating.php?filmId=<?php echo $idd; ?>&userId=<?php echo $_SESSION['userId']; ?>" enctype="multipart/form-data">
      <div class="modal-body text-dark">
      <p class="h5 text-muted">Comment</p>

        <div class="input-group mb-3">
        <input type="text" class="form-control" name="komentar" id="comentar1" rows="2" placeholder="Add comment">
        </div>
        

        <p class="h5 text-muted">Rating</p>
        <div class="input-group mb-3">
        <select class="form-control" name="rating" id="rating">
    
        <option value=5 >5</option>
        <option value=4 >4</option>
        <option value=3 >3</option>
        <option value=2 >2</option>
        <option value=1 >1</option>
        
      
        
        </select>
        </div>

      
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id ="save" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>







