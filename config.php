<?php
ob_start();

$localhost="localhost";
$mmo_home="192.168.174.171";

try {
  $con = new PDO("mysql:dbname=waffle;host=$mmo_home", "root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e){
  echo "Connection failed: " . $e->getMessage();
}
?>
