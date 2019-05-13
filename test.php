<?php

function getOperator($term){
	$and = "and";
	$or = "or";
	$exclude = "\\";
	$operator = "";
	
	if(strpos($term, $and)){
		$operator = $and;
	}
	else if(strpos($term, $or)){
		$operator = $or;
	}
	else if(strpos($term, $exclude)){
		$operator = $exclude;
	}
	
	return $operator;
}

$br = "<br>";
$bigbr = "<br><br><br>";

$andString = "google and yahoo";
$orString = "google or yahoo";
$excludeString = "cnn \ video";

$bigbr;
echo getOperator($andString);
echo getOperator($orString);
echo getOperator($excludeString);



?>