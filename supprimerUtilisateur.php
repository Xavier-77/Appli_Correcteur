<!-- supprimerTexte.php -->
<?php
require_once "config_db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_utilisateur = $_GET["id"];

    try {
        // Initialiser la connexion à la base de données
        $pdo_conn = db_config::init_DB();

        // Supprimer l'utilisateur en fonction de l'ID
        $delete_sql = "DELETE FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
        $delete_statement = $pdo_conn->prepare($delete_sql);
        $delete_statement->bindParam(':id_utilisateur', $id_utilisateur);
        $delete_result = $delete_statement->execute();

        if ($delete_result) {
            echo 'Utilisateur supprimé avec succès.';
            // Rediriger vers la page d'affihage des utilisateurs après quelques secondes
            header("refresh:2;url=afficherUtilisateur.php");
            exit();
        } else {
            echo 'Erreur lors de la suppression.';
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}


?>



