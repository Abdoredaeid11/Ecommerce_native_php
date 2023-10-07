<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="eccommerce_native";

  $conn = mysqli_connect($servername, $username, $password,$dbname);
  // set the PDO error mode to exception
if(!$conn){
die('error');

}
?>