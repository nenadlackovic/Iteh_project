<?php

$filmId = $_GET['filmId'];
$userId = $_GET['userId'];
$comment = $_POST['komentar'];
$rating = $_POST['rating'];
?>

<script>



fetch(`http://localhost:3000/grades`, {
                method: 'POST',
                headers: {
                    "Content-type": "application/json"
                },
                body: JSON.stringify({"brojcanaOcena":parseInt(<?php echo $rating; ?>), "komentar":"<?php echo $comment; ?>"
                , "korisnik":parseInt(<?php echo $userId; ?>), "film":parseInt(<?php echo $filmId; ?>) })
                })
                .then(res => res.json())
                .then(data => obj = data)
                .then( function asd(){
                if (obj.statusCode){
                    
                    window.location.href = "user.php";
                    alert("Error!");
                }else{
                    
                    window.location.href = "userMovies.php";
                    alert("Movie rated!");
                }
            } )

                

              
                    

</script>

