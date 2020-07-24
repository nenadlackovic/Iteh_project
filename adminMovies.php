<?php
include("menu.php");

//forbidden access to all except admin 
if(empty($_SESSION['admin'])){
    header("Location: singin.php");
}


$json = @file_get_contents('http://localhost:3000/films');
$obj = json_decode($json, true); // ako ne vratim kao true vraca se kao objekat i pristupa se pomocu critica


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    </head>
    <body>
        
        <div class="position-relative overflow-hidden p-1 p-sm-5 m-md-4 text-center bg-light">
        <form name="form" action="" method="get">
        <table class="table table-fluid" id="myTable">
                <thead>
                    <tr>
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
                        
                            <input type="button" name="edit" id="edit" class="btn btn-info" value="Edit" 
                            data-toggle="modal" href="#exampleModal<?php echo $idd; ?>">
                            <?php include("modalEditMovies.php")?>

                            
                            <input type="button" name="save" id="save" class="btn btn-info" value="Save" 
                            onclick="save_film(<?php echo $idd; ?>);">
                           
                            
                            
                            <input type="button" name="delete" id="delete" class="btn btn-info" value="Delete" 
                            onclick="delete_film(<?php echo $idd; ?>);">
                        
                        </td>
                    </tr>
                <?php } ?>  
                </tbody>
            </table>
            </form>           
            <input onclick="location.reload(true);" type="image" src="img/restart.png" alt="Submit" width="100" height="100">
        </div>


        

        

        

        <script>
                        
        function delete_film(id){

            fetch("http://localhost:3000/films/"+id, {
            method: "DELETE",
            })
            .then(alert("Update to see, on R2D2 you must click!")); 
        }

        function save_film(id){
            

            var title = "<?php echo $_GET["title"] ?>";
            console.log(title);
            var date = parseInt('<?php echo $_GET["date"] ?>');
            console.log(date);
            var duration = parseInt('<?php echo $_GET["duration"] ?>');
            console.log(duration);
            var overview = "<?php echo $_GET["overview"] ?>";
            console.log(overview);

            var obj;
            fetch("http://localhost:3000/films/"+id, {
            method: "GET",
            })
            .then(res => res.json())
            .then(data => obj = data)
            .then(() => {
                
                fetch("http://localhost:3000/films/"+id, {
                method: "PUT",
                headers: {
                "Content-type": "application/json"
                },
                body: JSON.stringify({"ImeFilma":title, "GodinaProizvodnje":date,"Trajanje":duration,"Poster":obj.Poster,
                "Opis":overview})
                })
            })
            .then(alert("Update to see, on R2D2 you must click!"))
        }

   



        </script>
     

      



        <script>
            $(document).ready(function () {
                $("#myTable").DataTable();
            });
        </script>




</body>
</html>
