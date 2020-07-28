<?php

$ocenaId = $_GET['ocenaId'];
$comment = $_POST['komment'];
$rating = $_POST['rating'];
?>

<script>


                

        fetch("http://localhost:3000/grades/"+parseInt(<?php echo $ocenaId; ?>), {
                method: 'PUT',
                headers: {
                    "Content-type": "application/json"
                },
                body: JSON.stringify({"brojcanaOcena":parseInt(<?php echo $rating; ?>), "komentar":"<?php echo $comment; ?>" })
                })
                .then(res => res.json())
                .then(data => obj = data)
                .then( function asd(){
                if (obj.statusCode){
                    window.location.href = "user.php";
                }else{
                    window.location.href = "userMovies.php";
                    alert("Rate edited!");
                }
            } )
              
                    

</script>

