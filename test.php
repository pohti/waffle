<?php
include("./classes/DomDocumentParser.php");

$startUrl = "https://www.reddit.com/";

function getDetails($url){
  $parser = new DomDocumentParser($url);

  $titleArray = $parser->getTitleTags();
  // checking if the title is empty
  if(sizeof($titleArray) == 0 || $titleArray->item(0) == NULL){
    return;
  }

  $title = $titleArray->item(0)->textContent;
  $title = str_replace("\n", "", $title);
  if($title == ""){
    return;
  }

  // default value for description and keywords
  $description = "";
  $keywords = "";

  $metaArray = $parser->getMetaTags();

  foreach($metaArray as $meta){
    if($meta->getAttribute("name") == "description"){
      $description = $meta->getAttribute("content");
    }

    if($meta->getAttribute("name") == "keywords"){
      $description = $meta->getAttribute("content");
    }

    $description = str_replace("\n", "", $description);
    $keywords = str_replace("\n", "", $keywords);
  }

  echo "URL: $url <br> Title: $title <br>";
  echo "Description: $description <br> Keywords: $keywords <br>";
}

getDetails($startUrl);
?>
