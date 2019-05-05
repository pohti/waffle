<?php

$searchTerm = "";
if(isset($_GET["searchTerm"])) {
	$searchTerm = $_GET("searchTerm");
	echo $searchTerm;
}


?>

<html>
<head>
	
</head>
<body>
	<form action="test.php" method="GET">
		<input type="text" name="searchTerm">
		<button>Submit</button>
	</form>
</body>
</html>