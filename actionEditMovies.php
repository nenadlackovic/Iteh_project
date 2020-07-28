<script>

    var title = "<?php echo $_POST["title"] ?>";
    var date = parseInt('<?php echo $_POST["date"] ?>');
    var duration = parseInt('<?php echo $_POST["duration"] ?>');
    var overview = "<?php echo $_POST["overview"] ?>";
    var id = parseInt('<?php echo $_GET["filmId"] ?>');

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
    window.location.href = "adminMovies.php";
</script>
