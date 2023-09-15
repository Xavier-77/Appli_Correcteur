<?php
require_once "config_db.php";
require_once "removeSpecial.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["nouveauTexteOriginal"])) {
    $id = $_POST["id"];
    $nouveauTexteOriginal = $_POST["nouveauTexteOriginal"];
    //$nouveauTexteTraite = $_POST["texteTraite"];
    
    // Traiter le nouveau texte original
    $nouveauTexteTraite = removeSpecialChars($nouveauTexteOriginal);
    
    // Mettre à jour l'enregistrement existant avec les nouvelles valeurs
    try {
        // Initialiser la connexion à la base de données
        $pdo_conn = db_config::init_DB();

        // Mettre à jour le texte en fonction de l'ID
        $update_sql = "UPDATE texte SET texteOriginal = :nouveauTexteOriginal, texteTraite = :nouveauTexteTraite WHERE id = :id";
        $update_statement = $pdo_conn->prepare($update_sql);
        $update_statement->bindParam(':nouveauTexteOriginal', $nouveauTexteOriginal);
        $update_statement->bindParam(':nouveauTexteTraite', $nouveauTexteTraite);
        $update_statement->bindParam(':id', $id);
        $update_result = $update_statement->execute();

        if ($update_result) {
            // Sélectionner le texte mis à jour
            $select_sql = "SELECT * FROM texte WHERE id = :id";
            $select_statement = $pdo_conn->prepare($select_sql);
            $select_statement->bindParam(':id', $id);
            $select_statement->execute();
            $texte = $select_statement->fetch(PDO::FETCH_ASSOC);

            if ($texte) {
                echo '<h1 align="center">Texte Modifié</h1>';
                echo '<div style="text-align: center;">';
                print('<br><div style="display: flex; justify-content: space-between;">');
                print('<div style="width: 48%;">');
                echo '<p><strong>Nouveau Texte Original</strong></p>';
                echo '<p>' . htmlentities($nouveauTexteOriginal) . '</p>';
                echo '</div>';
                echo'<div style="width: 48%;">';
                echo '<p><strong>Texte Traité</strong></p>';
                echo '<p>' . htmlentities($texte['texteTraite']) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div><br>';
                echo 'Texte mis a jour avec succes!!';
                // Rediriger vers la page d'affihage des textes après quelques secondes
                header("refresh:2;url=afficherTexte.php");
                exit();
            } else {
                echo 'Aucun texte trouvé avec cet ID.';
            }
        } else {
            echo 'Erreur lors de la modification du texte.';
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo 'Données de formulaire manquantes.';
}
?>
