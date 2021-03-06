<?php
include("connection.php");
include("classes/infoExtractor.php");

$term = "";
if(isset($_GET["term"])){
	$term = $_GET["term"];
}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Welcome to Waffle</title>
	
<!--	css-->
	<link rel="stylesheet" href="./assets/css/index.css">
	<link rel="shortcut icon" type="image/x-icon" href="./assets/images/waffle-favicon.png" />
	
<!--	jquery-->
	<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous">
	</script>
</head>

<body>

	<div class="wrapper">
		
		<!--header section-->
		<div class="headerDiv">
			<!--search bar-->
			<div class="searchDiv">
				<form action="index.php" method="GET">
					<div class="searchBarDiv">
						<input type="text" class="searchBox" name="term" value="<?php echo $term; ?>">
						<!--submit button-->
						<button class="searchButton">
							Search
						</button>
					</div>
				</form>
				<button class="clearSearch">
					<a href="index.php">Clear</a>
				</button>
			</div>
		</div>
<!--------------------------------------------------------------------->
		<!--main result section-->
		<div class="resultsSection">
		<?php
			$resultExtractor = new infoExtractor($con);
			
            

			if($term != ""){
                
			    $resultsCount = $resultExtractor->getResultsCount($term);
//                display the number of results found
				echo "<p class='resultsCount'>$resultsCount results found</p>";
//                display the results as html
				echo $resultExtractor->getResultAsHTML($term); 
			}
          
        ?>
		</div>
	</div>


	<script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>