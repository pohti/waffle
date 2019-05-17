<?php
// and
// or |
// exclude \


class infoExtractor {
  	private $con;
    private $terms;
    
	public function __construct($con){
		$this->con = $con;
	}

	// to extract operator from the search term
	private function getOperator($term){
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
    private function getTerms($term){
        $this->terms = explode($this->getOperator($term), $term);
        $this->terms[0] = trim($this->terms[0]);
        $this->terms[1] = trim($this->terms[1]);
    }
    
    // return the number of results found for the given term
    private function getCount($term){
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
    
    // get the total number of results found in the given term
	public function getResultsCount($term){
        $count = 0;
        
        if($this->getOperator($term) != ""){
            $this->getTerms($term);
            $count = $this->getCount($this->terms[0]);
            $count = ( $count + $this->getCount($this->terms[1]) );
        }
        else{
            $count = $this->getCount($term);
        }
        
        return $count;
	}

    private function getHtml($term){
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
    
	public function getResultAsHTML($term) {
        if($this->getOperator($term) != ""){
            $this->getTerms($term);
            $htmlContent = $this->getHtml($this->terms[0]);
            
            
            $htmlContent .= $this->getHtml($this->terms[1]);
            return $htmlContent;
            
        }
        else{
            return $this->getHtml($term);
        }
	}
    
}
?>