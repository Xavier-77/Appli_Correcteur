<?php
require_once "config_db.php";
//require_once "removeSpecial.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_utilisateur"]) && isset($_POST["nouveau_nom_utilisateur"]) && isset($_POST["nouveau_mot_de_passe"]) && isset($_POST["nouveau_rôle"]) && isset($_POST["nouveauUtilisateur"])) {
    $id_utilisateur = $_POST["id_utilisateur"];
    $nouveau_nom_utilisateur = $_POST["nouveau_nom_utilisateur"];
    $nouveau_mot_de_passe = $_POST["nouveau_mot_de_passe"];
    $nouveau_role = $_POST["nouveau_role"];
    //$nouveauTexteTraite = $_POST["texteTraite"];
    
    // Traiter le nouveau utilisateur
    //$nouveauTexteTraite = removeSpecialChars($nouveauTexteOriginal);
    
    // Mettre à jour l'enregistrement existant avec les nouvelles valeurs
    try {
        // Initialiser la connexion à la base de données
        $pdo_conn = db_config::init_DB();

        // Mettre à jour l'utilisateur en fonction de l'ID
        $update_sql = "UPDATE utilisateurs SET nom_utilisateur = :nouveau_nom_utilisateur, mot_de_passe = :nouveau_mot_de_passe, occupation = :nouveau_rôle, WHERE id_utilisateur = :id_utilisateur";
        $update_statement = $pdo_conn->prepare($update_sql);
        $update_statement->bindParam(':nouveau_nom_utilisateur', $nouveau_nom_utilisateur);
        $update_statement->bindParam(':nouveau_mot_de_passe', $nouveau_mot_de_passe);
        $update_statement->bindParam(':nouveau_role', $nouveau_role);
        $update_statement->bindParam(':id_utilisateur', $id_utilisateur);
        $update_result = $update_statement->execute();

        if ($update_result) {
            // Sélectionner l'utilisateur mis à jour
            $select_sql = "SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
            $select_statement = $pdo_conn->prepare($select_sql);
            $select_statement->bindParam(':id_utilisateur', $id_utilisateur);
            $select_statement->execute();
            $user = $select_statement->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                echo '<h1 align="center">Utilisateur Modifié</h1>';
                echo '<div style="text-align: center;">';
                print('<br><div style="display: flex; justify-content: space-between;">');
                print('<div style="width: 30%;">');
                echo '<p><strong>Nouveau nom utilisateur</strong></p>';
                echo '<p>' . htmlentities($nouveau_nom_utilisateur) . '</p>';
                echo '</div>';
                echo'<div style="width: 30%;">';
                echo '<p><strong>Nouveau mot de passe</strong></p>';
                echo '<p>' . htmlentities($nouveau_mot_de_passe) . '</p>';
                echo '</div>';
                echo'<div style="width: 30%;">';
                echo '<p><strong>Nouveau rôle</strong></p>';
                echo '<p>' . htmlentities($nouveau_role) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo 'Cet utilisateur n\'existe pas.';
            }
        } else {
            echo 'Erreur lors de la modification de cet utilisateur.';
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo 'Données de formulaire manquantes.';
}
?>
