<?php

  
  $mysqli = mysqli_connect("localhost", "root", "", "movies");
  $mysqli2 = mysqli_connect("localhost", "root", "", "iteh1");

  
  session_start();
  if(!isset($_SESSION['user'])){
    $_SESSION['user'] = [];
  }


 ?>
