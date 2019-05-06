<?php
include("../connection.php");

$linkId = $_POST["linkId"];

if(isset($linkId)){
	$query = $con->prepare("UPDATE sites SET clicks = clicks + 1 WHERE id=:id");
	$query->bindParam(":id", $linkId);
	
	$query->execute();
}
else{
	echo "No link passed to the page";
}


?>