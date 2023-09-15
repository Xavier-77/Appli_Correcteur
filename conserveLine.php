<?php
require_once "removeSpecial.php";
function processTextStructurePreserving($text) {
    $lines = explode("\n", $text);
    $processedLines = [];

    foreach ($lines as $line) {
        $characters = preg_split('/(?<!^)(?!$)/u', $line);
        //$characters = mb_str_split($line); // Convertir la chaîne en tableau de caractères
        $processedCharacters = array_map("removeSpecialChars", $characters); // Appliquer le traitement aux caractères
        $processedLines[] = implode("", $processedCharacters); // Reconstituer la ligne
    }

    return implode("\n", $processedLines);
}

//function mb_str_split($string) {
    //return preg_split('/(?<!^)(?!$)/u', $string);
//}
?>
