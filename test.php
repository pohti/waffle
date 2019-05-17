<?php
/*
1. remove all white spaces
2. check whether if operator is there
3. if operator is there, explode the string with operator as delimeter
4. 
*/


// to get the operator from the given string
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

echo $bigbr;
echo substr_replace(" ", "", $andString);
echo getOperator($andString) . $br;
echo getOperator($orString) . $br;
echo getOperator($excludeString) . $br;



?>