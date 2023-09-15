<!-- supprimerTexte.php -->
<?php
require_once "config_db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    try {
        // Initialiser la connexion à la base de données
        $pdo_conn = db_config::init_DB();

        // Supprimer le texte en fonction de l'ID
        $delete_sql = "DELETE FROM texte WHERE id = :id";
        $delete_statement = $pdo_conn->prepare($delete_sql);
        $delete_statement->bindParam(':id', $id);
        $delete_result = $delete_statement->execute();

        if ($delete_result) {
            echo 'Le texte a été supprimé avec succès.';
            // Rediriger vers la page d'affihage des textes après quelques secondes
            header("refresh:2;url=afficherTexte.php");
            exit();
        } else {
            echo 'Erreur lors de la suppression du texte.';
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}


?>



