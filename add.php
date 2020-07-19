<?php
include('connection.php');


for($p = 1; $p <= 5; $p++){
    $json = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key=d8bf019d0cca372bd804735f172f67e8&page='.$p);
    $obj = json_decode($json);

    $count = 0;
    for ($x = 0; $x <= 18; $x++){
        $name =  $obj->results[$x]->title;
        $date =  $obj->results[$x]->release_date;
        $overview = $obj->results[$x]->overview;
        $img = $obj->results[$x]->poster_path;
        $id = $obj->results[$x]->id;
        $mysqli->query("insert into popularmovies (title,release_date,overview,poster_path,realId) values ('$name','$date','$overview','$img','$id')");
}
}


?>

<?php 
echo 'added'; 
?>