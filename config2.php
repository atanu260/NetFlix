<?php

$conn = mysqli_connect('localhost','root','','shop_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

?>