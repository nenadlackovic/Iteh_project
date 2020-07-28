<?php
include("menu.php");

$json = @file_get_contents('http://localhost:3000/films');
$obj = json_decode($json, true);

$json2 = @file_get_contents('http://localhost:3000/grades');
$ocene = json_decode($json2, true);

$korisnikId = $_SESSION['userId'];
$filmovi = [];
for ($x = 0; $x < @count($ocene); $x++){
    if ( $korisnikId == $ocene[$x]["korisnik"]["KorisnikId"] ){
        array_push($filmovi,$ocene[$x]["film"]["FilmId"]);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.uikit.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    </head>
<body>


<div class="position-relative overflow-hidden p-3 p-md-5 m-md-4  text-center bg-light">

<h1 class="display-4">My movies</h1>

<br>

<div class="container">

<div class="card-columns">

<?php 
for( $x = 0; $x < @count($obj); $x++){
    for( $j = 0; $j < @count($filmovi); $j++){
        if ( $filmovi[$j] == $obj[$x]["FilmId"]){ 
?>
            
       


    
  <div class="card">
    <div class="card-block h-150">
    <img class="card-img-top"
            src="https://image.tmdb.org/t/p/w500<?php echo $obj[$x]["Poster"]; ?>"
            alt="Card image cap">
            
          <div class="card-body closed ">
            <h4 class="card-title"><?php echo $obj[$x]["ImeFilma"]; ?></h4>
            
            
              
            <?php 
            for( $m= 0; $m<@count($ocene); $m++){
                if ($ocene[$m]["film"]["FilmId"] == $obj[$x]["FilmId"] ){
                    $stars = $ocene[$m]["brojcanaOcena"];
                }
            }
            if ($stars == 5){ ?>
                <img src="img/star-on-big.png"/>
                <img src="img/star-on-big.png"/>
                <img src="img/star-on-big.png"/>
                <img src="img/star-on-big.png"/>
                <img src="img/star-on-big.png"/>
           <?php } 
            if ($stars == 4){ ?>
                <img src="img/star-on-big.png"/>
                <img src="img/star-on-big.png"/>
                <img src="img/star-on-big.png"/>
                <img src="img/star-on-big.png"/>
            <?php }  
            if ($stars == 3){ ?>
                <img src="img/star-on-big.png"/>
                <img src="img/star-on-big.png"/>
                <img src="img/star-on-big.png"/>
            <?php }  
            if ($stars == 2){ ?>
                <img src="img/star-on-big.png"/>
                <img src="img/star-on-big.png"/>
            <?php }  
            if ($stars == 1){ ?>
                <img src="img/star-on-big.png"/>
            <?php }  ?> 

            
    </div>
   </div>
   </div>
  
   <?php } ?>
   <?php } ?>
   <?php } ?>

   
 
</div>
</div>
    
<button type="button" class="btn btn-success" onclick="openPdf()">PDF</button>
</div>

<script>

function openPdf(){
    var poz0 = 50;
    var poz1 = 60;
    var poz2 = 70;
    var poz3 = 80;
    var brojac = 0;
    var brojacFilmova = 1;
    var doc = new jsPDF();
    doc.text('My movies', 90, 30);

    
        <?php for($x=0;$x<@count($ocene);$x++){
        if ( $korisnikId == $ocene[$x]["korisnik"]["KorisnikId"] ){?>

            doc.text(brojacFilmova+".", 20, poz0);
            poz0+=60;
            brojacFilmova++;
            doc.text('Movie:<?php echo $ocene[$x]["film"]["ImeFilma"]?>', 20, poz1);
            poz1+=60;
            doc.text('Rating:<?php echo $ocene[$x]["brojcanaOcena"]?>', 20, poz2);
            poz2+=60;
            doc.text('Comment:<?php echo $ocene[$x]["komentar"]?>', 20, poz3);
            poz3+=60;
            brojac++;
            if(brojac==4){
                poz0=50;
                poz1=60;
                poz2=70;
                poz3=80;
                doc.addPage("a4", "2");
                brojac = 0;
            }
            <?php } ?>
            <?php } ?>
            brojacFilmova = brojacFilmova - 1;
        doc.text("Total movies:"+brojacFilmova, 150, 280);
        

     

    doc.save('MyMovies.pdf');
}


</script>


<?php
include("footer.php");
?>
</body>
</html>