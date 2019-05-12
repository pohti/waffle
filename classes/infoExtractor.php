<?php
class infoExtractor {
  	private $con;

	public function __construct($con){
		$this->con = $con;
	}

	public function getResultsCount($term){

		$query = $this->con->prepare("SELECT COUNT(*) as total
									  FROM sites WHERE title LIKE :term
									  OR url LIKE :term
									  OR keywords LIKE :term
									  OR description LIKE :term
									");

		$searchTerm = "%" . $term . "%" ;
		$query->bindParam(":term", $searchTerm);
		$query->execute();

		$row = $query->fetch(PDO::FETCH_ASSOC);
		return $row["total"];
	}

	public function getResultAsHTML($term) {



		$query = $this->con->prepare("SELECT * 
										 FROM sites WHERE title LIKE :term 
										 OR url LIKE :term 
										 OR keywords LIKE :term 
										 OR description LIKE :term
										 ORDER BY clicks DESC"
									);

		$searchTerm = "%". $term . "%";
		$query->bindParam(":term", $searchTerm);
		$query->execute();


		$htmlContent = "<div class='sitesDiv'>";


		while($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["id"];
			$url = $row["url"];
			$title = $row["title"];
			$description = $row["description"];
			
			$htmlContent .= "<div class='resultDiv'>

								<h3 class='title'>
									<a class='result' href='$url' data-linkId='$id'>
										$title
									</a>
								</h3>
								<span class='url'>$url</span>
								<span class='description'>$description</span>

							</div>";


		}


		$htmlContent .= "</div>";

		return $htmlContent;
	}
    
}
?>