<?php
// Démarrer ou reprendre une session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connexion.php");
    exit();
}

require_once "config_db.php";

try {
    // Initialiser la connexion à la base de données
    $pdo_conn = db_config::init_DB();

    // Récupérer l'ID de l'utilisateur connecté
    $user_id = $_SESSION['user_id'];

    // Sélectionner les textes de l'utilisateur actuel
    $sql = "SELECT * FROM texte WHERE id_utilisateur = :user_id";
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->bindParam(':user_id', $user_id);
    $pdo_statement->execute();
    $textes = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Historique</title>
</head>
<body align="center">
<div style=" background-color:grey; height: 150px; position: fixed;top: 0;width: 100%;">
        <h1 style="margin-top:2px"><u>Chargement de texte</u></h1>
        <div style="display: flex; justify-content: space-between; margin-top:0px">
            <button class="floating-button" onclick="window.location.href='user_propo.php'">
                <h2>A propos</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='saisir_texte.php'">
                <h2>Traitement</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='charger_texte.php'">
                <h2>Chargement</h2>
            </button>
        </div>
    </div><br><br><br><br><br><br><br><br><br>
    <?php
    if (!empty($textes)) {
        echo '<table border="1" align="center" width="100%">';
        echo '<tr><th>ID</th><th>Date de Stockage</th><th>Texte Original</th><th>Texte Traité</th><th>Telechargement</th></tr>';
        foreach ($textes as $texte) {
            echo '<tr>';
            echo '<td>' . $texte['id'] . '</td>';
            echo '<td>' . $texte['dateStockage'] . '</td>';
            echo '<td align="justify">' . htmlentities($texte['texteOriginal']) . '</td>';
            echo '<td align="justify">' . htmlentities($texte['texteTraite']) . '</td>';
            echo '<td><a href="download_processed_text.php?text='.$texte['texteTraite'].'" download><font color="green">Télécharger le texte traité</font></a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Aucun texte trouvé dans votre historique.';
    }
    ?><br><br>
   <div><a href="deconnexion.php">Se déconnecter</a></div>
    <br>
    <p align="center">!!!!!!!</p>
</body>
</html>
