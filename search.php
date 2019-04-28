<?php
include("config.php");
include("classes/SiteResultsProvider.php");

if(isset($_GET["term"])){
	$term = $_GET["term"];
}
else{
	exit("You must enter a search term");
}

$type = isset($_GET["type"]) ? $_GET["type"] : "sites";
$page = isset($_GET["page"]) ? $_GET["page"] : "1";
?>


<!DOCTYPE html>
<html>

<head>
    <title>Welcome to Waffle</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/waffle-favicon.png" />
    <script
	  src="https://code.jquery.com/jquery-3.4.0.min.js"
	  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
	  crossorigin="anonymous">
	</script>
</head>

<body>

    <div class="wrapper">

        <div class="header">

            <div class="headerContent">

                <div class="logoContainer">
                    <a href="./index.php">
                        <img src="./assets/images/waffle-logo.png">
                    </a>
                </div>

                <div class="searchContainer">
                    <form action="search.php" method="get">

                        <div class="searchBarContainer">
                            <input type="text" class="searchBox" name="term" value="<?php echo $term;?>">
                            <button class="searchButton">
                                <img src="./assets/images/icons/search.png" alt="">
                            </button>
                        </div>


                    </form>
                </div>

            </div>
            <div class="tabsContainer">
                <ul class="tabsList">
                    <li class="<?php echo $type == 'sites' ? 'active' : '' ?>">
                        <a href='<?php echo "search.php?term=$term&type=sites"; ?>'>
                            Sites
                        </a>
                    </li>
                    <li class="<?php echo $type == 'images' ? 'active' : '' ?>">
                        <a href='<?php echo "search.php?term=$term&type=images"; ?>'>
                            Images
                        </a>
                    </li>
                </ul>
            </div>


        </div>

        <div class="mainResultsSection">
            <?php
          $resultsProvider = new SiteResultsProvider($con);
          $pageLimit = 20;
            
          $numResults = $resultsProvider->getNumResults($term);
          echo "<p class='resultsCount'>$numResults results found</p>";

          echo $resultsProvider->getResultsHtml($page, $pageLimit, $term);
        ?>
        </div>
    </div>


	<script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>