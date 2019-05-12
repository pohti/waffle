<?php
include("connection.php");
include("crawlUtilities.php");
include("./classes/DomDocumentParser.php");


// get URL
if(isset($_GET["url"])){
	$startUrl = $_GET["url"];
	// validate URL

	if(filter_var($startUrl, FILTER_VALIDATE_URL)) {
		followLinks($startUrl);
	}
	else{
		echo "invalid url";
		exit;
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Enter URL to crawl</title>
	<link rel="stylesheet" href="./assets/css/crawler.css">
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<div class="formContainer">
				<form action="crawler.php" method="GET">
					<div class="inputContainer">
						<input type="text" class="urlBox" placeholder="Enter url to crawl" name="url">
						<input type="submit" class="submitButton" value="Submit">
					</div>
				</form>			
			</div>
		</div>
	</div>
</body>
</html>
