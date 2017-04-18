<?php

/**
 * @return bool|resource
 */
function generateTarget() {
    $target = fopen("http://www.msn.com", 'r');
    return $target;
}

/**
 * @param $line
 * @param $lineCount
 * @return array
 */
function parseLine($line, $lineCount){
    $delimiters = ["<", ">"];
    
    foreach($delimiters as $delimiter){
        $parsedLines = explode($delimiter, $line);
    }

    foreach($parsedLines as $parsedLine) {
        echo $lineCount + "\n";
        echo $parsedLine;
    }
    return $parsedLines;
}

/**
 * @param $target
 * @return array|string
 */
function readTarget($target){
    if ($target) {
        $lineCount = 0;
        while (($line = fgets($target)) !== false) {
            $lineCount++;
            $parsedLine = parseLine($line, $lineCount);
        }
        fclose($target);
    } else {
        $parsedLine = ["error"];
        return $parsedLine;
    }
    return $parsedLine;
}


$target = generateTarget();
$targetData = readTarget($target);
