<?php
include("menu.php");

$json = @file_get_contents('http://localhost:3000/films');
$filmovi = json_decode($json, true);

$json2 = @file_get_contents('http://localhost:3000/grades');
$ocene = json_decode($json2, true);



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-4 text-center bg-light">
            <h1 class="display-4">Top rated movies</h1>

            <div id="piechart_3d" style="width: 900px; height: 500px; margin: 0 auto !important;"></div>
        </div>

        <script>

            google.charts.load("current", {packages:["corechart"]});
                  google.charts.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Movies', 'Rated times'],
                      <?php for($x=0;$x<@count($filmovi);$x++){?>
                      ['<?php echo $filmovi[$x]["ImeFilma"] ?>',

                        <?php
                        $brojac = 0;
                        for($j=0; $j<@count($ocene);$j++){
                          if($filmovi[$x]["FilmId"] == $ocene[$j]["film"]["FilmId"]){
                            $brojac++;
                          }

                        }
                         echo $brojac;
                        ?>

                      ],
                      <?php } ?>
                    ]);

                    var options = {
                      is3D: true,
                      backgroundColor: 'transparent'
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                  }
        </script>

        <style>
            .piechart_3d {
                width: auto;
                margin: 0 auto !important;
            }
        </style>

        <script src="https://code.jquery.com/jquery-2.1.3.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <?php
        include("footer.php");
        ?>
    </body>
</html>
