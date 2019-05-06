<?php
ob_start();

$dbHostName = "127.0.0.1"; // 127.0.0.1 = localhost
$dbuserName = "root";
$dbPassword = "";
$dbName = "waffle";

try {
  $con = new PDO("mysql:dbname=$dbName;host=$dbHostName", "$dbuserName", "$dbPassword");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e){
  echo "Connection failed: " . $e->getMessage();
}
?>
