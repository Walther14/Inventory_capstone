<?php

// Create COnnection to DB
$data = mysqli_connect('localhost', 'root', '', 'prime');

// Check connection
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
  }
//   echo "Connected successfully";
  ?>
