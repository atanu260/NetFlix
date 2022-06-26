<?php 
echo "This is config file";
$server = "localhost";
$user = "root";
$pass = "";
$database = "netprime";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>