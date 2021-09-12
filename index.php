<?php

require_once "xml-parser.php";

$pathToFile = "./sample-file.xml";  

$parsedXMLData = ParseXML($pathToFile);

foreach($parsedXMLData as $element) {
    if($element['visibility'] == "1") {
        echo "<div id=\"{$element['id']}\">{$element['id']}</div>";
    }
}