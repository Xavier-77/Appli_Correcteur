<?php
require_once "config_db.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST["username"];
    $password = $_POST["motPasse"];

    // Valider les informations de connexion
    if (empty($username) || empty($password)) {
        $error_message = "Veuillez remplir tous les champs.";
    } else {
        try {
            // Initialiser la connexion à la base de données
            $pdo_conn = db_config::init_DB();

            // Récupérer le hachage du mot de passe depuis la base de données
            $query = "SELECT id_utilisateur, occupation, mot_de_passe FROM utilisateurs WHERE nom_utilisateur = :username";
            $statement = $pdo_conn->prepare($query);
            $statement->bindParam(':username', $username);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user["mot_de_passe"])) {
                // L'utilisateur est connecté avec succès, stocker les informations de session
                session_start();
                $_SESSION["user_id"] = $user["id_utilisateur"];
                $_SESSION["user_role"] = $user["occupation"];

                // Rediriger en fonction du rôle de l'utilisateur
                if ($user["occupation"] == "administrateur") {
                    header("Location: admin_option.php");
                } else {
                    header("Location: user_option.php");
                }
                exit();
            } else {
                $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            $error_message = "Erreur : " . $e->getMessage();
        }
    }
}

?>


