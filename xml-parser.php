<?php
function ParseXML($pathToXML) {
    $XMLFileContents = file_get_contents($pathToXML) or die("Error on reading XML file.");

    // $XMLFileContents = preg_replace('/[\n\r]/', '', $XMLFileContents);

    $XMLContentsArray = preg_split('/(<|>)/', $XMLFileContents);

    $XMLContentsArray = preg_grep('/^($|\n {0,}|\r {0,}|\r\n {0,})/', $XMLContentsArray, PREG_GREP_INVERT);

    $parsedXMLData = [];
    $arrayCurrentIndex = 0;

    foreach($XMLContentsArray as $element) {
        if(preg_match('/^section id="\w{1,}" visibility="[0|1]"/', $element)) {
            $match;

            preg_match('/id="\w{1,}"/', $element, $match);
            $parsedXMLData[$arrayCurrentIndex]['id'] = $match[1];
            preg_match('/visibility="[0|1]"/', $element, );
            $parsedXMLData[$arrayCurrentIndex]['visibility'] = $match[1];

            $arrayCurrentIndex++;
        }
    }

    var_dump($XMLContentsArray);

    echo "\n<br>";

    var_dump($parsedXMLData);

    return $XMLContentsArray;
}