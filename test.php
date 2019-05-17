<?php
/*
1. remove all white spaces
2. check whether if operator is there
3. if operator is there, explode the string with operator as delimeter
4. 
*/

$terms;
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

// using operator as a delimeter, tokenize the given string
function getTerms($term){
    global $terms;
    $terms = explode(getOperator($term), $term);
}


$br = "<br>";
$bigbr = "<br><br><br>";

$andString = "google and yahoo";
$orString = "google or yahoo";
$excludeString = "cnn \ video";

getTerms($andString);

echo $bigbr;
echo "Original String: $andString $bigbr";
echo "Operator: " . getOperator($andString) . $br;
echo "First Term:" . $terms[0] . $br;
echo "Second Term: " . $terms[1] . $br;
// get multiple terms out of the string



?>