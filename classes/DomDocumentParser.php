<?php
//This class is used for extracting information from a given URL

class DomDocumentParser {

    private $doc;

	// constructor
    function __construct ($url){
        $options = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"User-Agent: waffleBot/0.1\n"
                )
            );
        $context = stream_context_create($options);

        $this->doc = new DomDocument();
        @$this->doc->loadHTML(file_get_contents($url, false, $context));
    }

	// to find and return value inside <a> tags
    public function getURLs() {
        return $this->doc->getElementsByTagName("a");
    }
	
	// to find and return value inside <title> tags
    public function getTitleTags() {
        return $this->doc->getElementsByTagName("title");
    }
	
	// to find and return value inside <meta> tags
    public function getMetaTags() {
        return $this->doc->getElementsByTagName("meta");
    }
}


?>
