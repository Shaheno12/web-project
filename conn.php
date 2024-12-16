<?php
$servername = "localhost";
$username = "root";
$password = "";
$port = 3308; // Specify the port number

try {
  $conn = new PDO("mysql:host=$servername;port=$port;dbname=Ecommerce", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>