<!DOCTYPE html>
<html>
<head>
    <title>ModifyUserPage</title>
    <meta charset="UTF-8">
</head>
<body align="center">
    <?php
    require_once "config_db.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_utilisateur"])) {
        $id_utilisateur = $_GET["id_utilisateur"];

        try {
            // Initialiser la connexion à la base de données
            $pdo_conn = db_config::init_DB();

            // Sélectionner l'utilisateur à modifier en fonction de son id
            $sql = "SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
            $pdo_statement = $pdo_conn->prepare($sql);
            $pdo_statement->bindParam(':id_utilisateur', $id_utilisateur);
            $pdo_statement->execute();
            $utilisateur = $pdo_statement->fetch(PDO::FETCH_ASSOC);

            if ($utilisateur) {
                echo '<h1>Modifier utilisateur</h1><br>';
                echo '<form action="formulaireModifierUser.php" method="post">';
                echo '<input type="hidden" name="id_utilisateur" value="' . $id_utilisateur . '">';
                echo '<label for="nom_utilisateur"><strong>Ancien nom utilisateur :</strong></label><br>';
                echo '<p>' . htmlentities($utilisateur['nom_utilisateur']) . '</p>';
                echo '<label for="nouveau_nom_utilisateur"><strong>Nouveau nom utilisateur :</strong></label><br>';
                echo '<input type="text" name="nouveau_nom_utilisateur" rows="1" cols="10"><br><br>';
                echo '<label for="mot_de_passe"><strong>Ancien mot de passe :</strong></label><br>';
                echo '<p>' . htmlentities($utilisateur['mot_de_passe']) . '</p>';
                echo '<label for="nouveau_mot_de_passe"><strong>Nouveau mot de passe :</strong></label><br>';
                echo '<input type="password" name="nouveau_mot_de_passe" rows="1" cols="10"><br><br>';
                echo '<label for="occupation"><strong>Ancien rôle :</strong></label><br>';
                echo '<p>' . htmlentities($utilisateur['occupation']) . '</p>';
                echo '<label for="nouveau_role"><strong>Nouveau rôle :</strong></label><br>';
                echo '<select name="nouveau_role">
                        <option value="utilisateur">Utilisateur</option>
                        <option value="administrateur">Administrateur</option>
                      </select><br><br>';
                echo '<input type="submit" value="Enregistrer" style="background-color: #370adb; color: white; width: 100px; height: 50px; border: 5px; font-weight: bold;">';
                echo '</form>';

            } else {
                echo 'Cet utilisateur n\'existe pas.';
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_utilisateur"]) && isset($_POST["nouveau_nom_utilisateur"]) && isset($_POST["nouveau_mot_de_passe"]) && isset($_POST["nouveau_role"])) {
        // Récupérez les valeurs des champs de modification
        $id_utilisateur = $_POST["id_utilisateur"];
        $nouveau_nom_utilisateur = $_POST["nouveau_nom_utilisateur"];
        $nouveau_mot_de_passe = $_POST["nouveau_mot_de_passe"];
        $nouveau_role = $_POST["nouveau_role"];
        try {
            // Initialiser la connexion à la base de données
            $pdo_conn = db_config::init_DB();
    
            // Mettre à jour les informations de l'utilisateur dans la base de données
            $sql = "UPDATE utilisateurs SET nom_utilisateur = :nouveau_nom_utilisateur, mot_de_passe = :nouveau_mot_de_passe, occupation = :nouveau_role WHERE id_utilisateur = :id_utilisateur";
            $pdo_statement = $pdo_conn->prepare($sql);
            $pdo_statement->bindParam(':nouveau_nom_utilisateur', $nouveau_nom_utilisateur);
            $pdo_statement->bindParam(':nouveau_mot_de_passe', $nouveau_mot_de_passe);
            $pdo_statement->bindParam(':nouveau_role', $nouveau_role);
            $pdo_statement->bindParam(':id_utilisateur', $id_utilisateur);
            $pdo_statement->execute();
            echo 'Utilisateur mis à jour avec succès.';
            // Rediriger vers la page d'affihage des utilisateurs après quelques secondes
            header("refresh:2;url=affichertilisateur.php");
            exit();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo 'ID utilisateur manquant ou champs de modification non définis.';
    }
    ?>
    <br><a href="afficherUtilisateur.php">Liste utilisateurs</a>
</body>
</html>

