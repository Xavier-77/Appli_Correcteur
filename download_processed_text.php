<?php
if (isset($_GET['text'])) {
    $texteTraite = $_GET['text'];

    // Entête pour indiquer qu'il s'agit d'un fichier texte téléchargeable
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="texte_traite.txt"');

    // Écrire le contenu du texte traité dans la réponse HTTP
    echo $texteTraite;
} else {
    echo "Le texte traité n'est pas disponible.";
}
?>
