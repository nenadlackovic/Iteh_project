<?php
include("menu.php");
//forbidden access to all except admin 
if(empty($_SESSION['admin'])){
    header("Location: singin.php");
}

$id = $_GET['var'];
$json_string = @file_get_contents("https://api.themoviedb.org/3/movie/".$id."?api_key=953329996405fcf730fd2fd2dea895e7");
$parsed_json = json_decode($json_string, true);
$title = $parsed_json["title"];
$date = $parsed_json["release_date"];
$duration = $parsed_json["runtime"];
$overview = $parsed_json["overview"];
$img = $parsed_json["poster_path"];

$json_string2 = @file_get_contents("https://api.themoviedb.org/3/movie/".$id."/credits?api_key=953329996405fcf730fd2fd2dea895e7");
$parsed_json2 = json_decode($json_string2, true);
$elementCount  = count($parsed_json2["crew"]);
for ($i = 0;$i<$elementCount;$i++){
if($parsed_json2["crew"][$i]["job"] == 'Director'){
    $director = $parsed_json2["crew"][$i]["name"];
}
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
</head>
    </head>
    <body>
    
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-4 text-center bg-light">
        <div class="container">

            <div class="row">

                <div class="col-sm">

                    <img src="https://image.tmdb.org/t/p/w500<?php echo $img?>"" style="height:100%;" id="poster" alt="Waiting for movie..." class="img-thumbnail">

                </div>

                <div class="col-sm">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Title</label>
                        <input type="text" class="form-control" id="title" readonly value="<?php echo $title ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Duration</label>
                        <input type="text" class="form-control" id="duration" readonly value="<?php echo $duration ?>min">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Release date</label>
                        <input type="text" class="form-control" id="releaseDate" readonly value="<?php echo $date ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Genre</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <option selected>Choose...</option>
                        <?php  $result=$mysqli2->query("select * from zanr"); while($row=$result->fetch_assoc()){ ?>
                            <option value=" <?php echo $row['zanrId']; ?>"> <?php echo $row['imeZanra']; ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    

                </div>

            </div>

            <div class="row">

                <div class="col">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Director</label>
                        <input type="text" class="form-control" id="director" readonly value="<?php echo $director ?> ">
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Overview</label>
                        <textarea class="form-control" id="overview" readonly rows="3"><?php echo $overview ?></textarea>
                    </div>

                </div>
            
            </div>
            
            <br>

            <div class="row">

                <div class="col">   
                <div class="form-group form-button">  
                <input type="submit" name="signup" id="signup" class="form-submit" onclick="add_film(); " value="Register"/>
                </div>
                </div>
            
            </div>

            
            <div>

     

        </div>
</body>

<script>
function add_film(){

var title = document.getElementById("title").value;

var date = document.getElementById("releaseDate").value;
var dateString = date.toString();
dateString = dateString.match(/^[0-9]+/);
var dateInt = parseInt(dateString);

var duration = document.getElementById("duration").value;
duration = duration.match(/^[0-9]+/);
var durationInt = parseInt(duration);

var poster = "<?php echo $img ?>";

var overview = document.getElementById("overview").value;

var director = document.getElementById("director").value;
var directorFirstName = director.match(/^[a-zA-z]+/);
var directorLastName = director.match(/\s[^\s]+.*$/);


var obj;
var directorId;
fetch("http://localhost:3000/directors", {
  method: "POST",
  body: JSON.stringify({"imeRezisera":directorFirstName, "prezimeRezisera":directorLastName}),
  headers: {"content-type": "application/json"},
})
.then(res => res.json())
.then(data => obj = data)
.then(() => console.log(obj.ReziserId))
.then(() => 

fetch(`http://localhost:3000/films`, {
  method: 'post',
  headers: {
    "Content-type": "application/json"
  },
  body: JSON.stringify({"ImeFilma":title, "GodinaProizvodnje":dateInt, "Trajanje":durationInt, "Poster":poster,
  "Opis":overview, "reziser":{"reziserId":obj.ReziserId}}) 
})

)
};







// var obj;

// fetch(`http://localhost:3000/directors`, {
//   method: 'post',
//   headers: {
//     "Content-type": "application/json"
//   },
//   body: JSON.stringify({"imeRezisera":directorFirstName, "prezimeRezisera":directorLastName})   
// })
// .then(res => res.json())
// .then(data => obj = data)
// .then(() => alert(obj))
// ;






</script>


</script>



    <script src="https://code.jquery.com/jquery-2.1.3.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

</html>
