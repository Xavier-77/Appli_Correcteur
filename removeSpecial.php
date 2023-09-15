<?php
require_once "conversionMajuscule.php";
require_once "conversionMiniscule.php";

function removeSpecialChars($text) {
    // Transformer certains caracteres du texte
    $text = convertirEnAlphabetFrancaisMiniscule($text);
    $text = convertirEnAlphabetFrancaisMajuscule($text);
    //$text = convertirChiffreEtAutre($text);
    // Supprimer les apostrophes
    $text = str_replace("'", " ", $text);
    $text = str_replace("`", " ", $text);
    $text = str_replace("’", " ", $text);
    
    
    // Supprimer les caractères spéciaux
    //$text = preg_replace('/[^a-zA-Z0-9\s]/', '', $text);
    //$text = str_replace("\", "|", $text);
    
    return $text;
}