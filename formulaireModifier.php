<!DOCTYPE html>
<html>
<head>
    <title>ModifyPage</title>
    <meta charset="UTF-8">
</head>
<body align="center">
    <?php
    require_once "config_db.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];

        try {
            // Initialiser la connexion à la base de données
            $pdo_conn = db_config::init_DB();

            // Sélectionner le texte à modifier en fonction de l'ID
            $sql = "SELECT * FROM texte WHERE id = :id";
            $pdo_statement = $pdo_conn->prepare($sql);
            $pdo_statement->bindParam(':id', $id);
            $pdo_statement->execute();
            $texte = $pdo_statement->fetch(PDO::FETCH_ASSOC);

            if ($texte) {
                echo '<h1>Modifier le Texte</h1><br>';
                echo '<form action="modifierTexte.php" method="post">';
                echo '<input type="hidden" name="id" value="' . $id . '">';
                echo '<label for="texteOriginal"><strong>Ancien Texte Original :</strong></label><br>';
                echo '<p>' . htmlentities($texte['texteOriginal']) . '</p>';
                echo '<label for="nouveauTexteOriginal"><strong>Nouveau Texte Original :</strong></label><br>';
                echo '<textarea name="nouveauTexteOriginal" rows="17" cols="100" style="background-color: gray; color: white; border:3"></textarea><br><br>';
                echo '<input type="submit" value="Enregistrer" style="background-color: #370adb; color: white; width: 100px; height: 50px; border: 5px; font-weight: bold;" > ';
                echo '</form>';
            } else {
                echo 'Aucun texte trouvé avec cet ID.';
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["nouveauTexteOriginal"])) {
        // Le code de mise à jour du texte peut rester tel quel
    } else {
        echo 'ID de texte manquant.';
    }
    ?>
</body>
</html>
