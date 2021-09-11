<?php
function ParseXML($pathToXML) {
    $XMLFileContents = file_get_contents($pathToXML) or die("Error on reading XML file.");

    // $XMLFileContents = preg_replace('/[\n\r]/', '', $XMLFileContents);

    $XMLContentsArray = preg_split('/(<|>)/', $XMLFileContents);

    $XMLContentsArray = preg_grep('/^($|\n {0,}|\r {0,}|\r\n {0,})/', $XMLContentsArray, PREG_GREP_INVERT);

    // $XMLContentsArray = array_diff($XMLContentsArray, ["", " ", "\r", "\n", "\r\n", "\r\n    ", "\r\n        "]);

    var_dump($XMLContentsArray);

    return $XMLContentsArray;
}