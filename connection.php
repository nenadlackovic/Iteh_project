<?php

  
  $mysqli = mysqli_connect("localhost", "root", "", "movies");

  
  session_start();
  if(!isset($_SESSION['user'])){
    $_SESSION['user'] = [];
  }


 ?>
