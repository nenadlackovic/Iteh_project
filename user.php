<?php
include("menu.php");

$json = @file_get_contents('http://localhost:3000/films');
$obj = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <!-- js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        
    <!--baza  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.uikit.min.css">
    
    <!-- quotes -->
    <script type="text/javascript" src="js/quotes.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@500&display=swap" rel="stylesheet">
</head>


<body>


<div class="position-relative overflow-hidden p-3 p-md-5 m-md-4  text-center bg-light">
<p class="h4 " id="quote"></p>


<br><br>
<form name="form" action="" method="get">
        <table class="uk-table uk-table-hover uk-table-striped" style="width:100%"   id="myTable">
                <thead>
                    <tr>
                        <th>Poster</th>
                        <th>Title</th>
                        <th>Duration</th>
                        <th>Release Date</th>
                        <th>Overview</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php for ($x = 0; $x < @count($obj); $x++){ ?>
                    <tr>
                        <td>
                            
                            <img   width="100%" height="100%"   class="img-thumbnail" src="https://image.tmdb.org/t/p/w500<?php echo $obj[$x]["Poster"]; ?>" id="poster" alt="Waiting for movie..." >
                        </td>
                        <td>
                            <?php echo $obj[$x]["ImeFilma"]; ?>
                        </td>
                        <td>
                         <?php echo $obj[$x]["Trajanje"]; ?>
                        </td>
        
                        <td>
                        <?php echo $obj[$x]["GodinaProizvodnje"]; ?>
                        </td>
                            
                        <td>
                        <?php echo $obj[$x]["Opis"]; ?>
                        </td>

                        <td style='white-space: nowrap'>
                        <?php $idd =  $obj[$x]["FilmId"];?>
                        
                        
                      <a href="#rate<?php echo $idd; ?>" data-toggle="modal" class="btn btn-warning">Rate</a>
											<?php include('modalRateMovie.php'); ?>
                        
                       
                                               

                    
                        </td>

                       
                    </tr>
                <?php } ?>  
                </tbody>
            </table>
            </form>           
      

</div>


        <script>
         
            var star;

            $(document).ready(function () {
                $("#myTable").DataTable();
            });

            

        

            function rate(filmId, korisnikId){
                
                var comment = document.getElementById("comment").value
                
                var radios = document.getElementsByName('rating');

                var star;

                for (var i = 0, length = radios.length; i < length; i++) {
                    if (radios[i].checked) {
                    // do whatever you want with the checked radio
                        star = radios[i].value;

                        // only one radio can be logically checked, don't check the rest
                         break;
                            }
                    }

                

                fetch(`http://localhost:3000/grades`, {
                method: 'POST',
                headers: {
                    "Content-type": "application/json"
                },
                body: JSON.stringify({"brojcanaOcena":parseInt(star), "komentar":comment, "korisnik":korisnikId, "film":filmId })
                })
                .then(res => res.json())
                .then(data => obj = data)
                .then( function asd(){
                if (obj.statusCode){
                    alert("Error, movie already rated!");
                }else{
                    alert("Movie rated!");
                }
            } )
                

                
            }
        </script>



<style>
    #quote{
      font-family: 'EB Garamond', serif;
    }
</style>

  
<?php
include("footer.php");
?>
</body>
</html>