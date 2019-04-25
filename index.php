<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Waffle</title>
    <meta name="description" content="Search the web for sites and images">
    <meta name="keywords" content="Search engine, waffle, websites">
    <meta name="author" content="Min">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/waffle-favicon.png" />
</head>

<body>
    <div class="wrapper indexPage">
        <div class="mainSection">

            <div class="logoContainer">
                <img src="./assets/images/waffle-logo.png" alt="waffle-icon" title="Logo of Waffle">
            </div>

            <div class="searchContainer">
                <form action="search.php" method="GET">

                    <input type="text" class="searchBox" name="term">
                    <input type="submit" class="searchButton" value="Search">
                </form>

            </div>
        </div>
    </div>


</body>
</html>
