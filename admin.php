<?php
include("menu.php");

//forbidden access to all except admin 
if(empty($_SESSION['admin'])){
    header("Location: singin.php");
}

$movie =  @$_GET['subject']; 
$movie  =  preg_replace('/\s+/u', '+', $movie);
$json = @file_get_contents('http://api.themoviedb.org/3/search/movie?api_key=d8bf019d0cca372bd804735f172f67e8&query='.$movie);
$obj = json_decode($json);



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
        <div class="p-2 bg-light rounded rounded-pill shadow-lg ">
            <div class="input-group">
              <div class="input-group-prepend">
                <button id="button-addon2" type="submit" class="btn btn-link "><i class="fa fa-search"></i></button>
              </div>
              <input type="text" name="subject" id="subject" placeholder="Search for a movie" aria-describedby="button-addon2" class="form-control border-0 bg-light">
            </div>
          </div>
        </form>

        <br>
        
        <table class="table table-fluid" id="myTable">
                <thead>
                    <tr>
                        <th>Poster</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php for ($x = 0; $x < @count($obj->results); $x++){ ?>
                    <tr>
                        <td>
                        <img
                                alt = "Image not found!"
                                height="150px"
                                src="https://image.tmdb.org/t/p/w500<?php echo $obj->results[$x]->poster_path; ?>"
                            />
                        </td>
                        <td>
                            <?php echo $obj->results[$x]->title; ?>
                        </td>
                        <td>
                        <input type="button" class="btn btn-info" value="Select" onClick="window.location='admin2.php?var=<?php echo $obj->results[$x]->id; ?>'">
                        </td>
                    </tr>
                <?php } ?>  
                </tbody>
            </table>

        </div>


        <script>
            $(document).ready(function () {
                $("#myTable").DataTable();
            });
        </script>


</body>
</html>
