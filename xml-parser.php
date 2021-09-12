<?php
function ParseXML($pathToXML) {
    $XMLFileContents = file_get_contents($pathToXML) or die("XML file not found.");

    $XMLContentsArray = preg_split('/(<|>)/', $XMLFileContents);

    $XMLContentsArray = preg_grep('/^($|\n {0,}|\r {0,}|\r\n {0,})/', $XMLContentsArray, PREG_GREP_INVERT);

    $parsedXMLData = [];
    $arrayCurrentIndex = 0;

    foreach($XMLContentsArray as $element) {
        if(preg_match('/^section id="\w{1,}" visibility="[0|1]"/', $element)) {
            $match;

            preg_match('/id="(\w{1,})"/', $element, $match, PREG_OFFSET_CAPTURE);
            $parsedXMLData[$arrayCurrentIndex]['id'] = $match[1][0];

            preg_match('/visibility="([0|1])"/', $element, $match, PREG_OFFSET_CAPTURE);
            $parsedXMLData[$arrayCurrentIndex]['visibility'] = $match[1][0];

            $arrayCurrentIndex++;
        }
    }

    return $parsedXMLData;
}