<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_role"] !== "utilisateur") {
    header("Location: connexion.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Options Utilisateur</title>
</head>
<body align="center" style="background: url('image.png') no-repeat center center fixed; background-size: 500px 500px;">
    
    <div style=" background-color:grey; height: 150px; position: fixed;top: 0;width: 100%;">
        <h1 style="margin-top:2px"><u>Options Utilisateur</u></h1>
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
            <button class="floating-button" onclick="window.location.href='historique_Utilisateur.php'">
                <h2>Historique</h2>
            </button>
        </div>
    </div>    
    <div style="margin-top:600px"><a href="deconnexion.php">Se déconnecter</a></div>
</body>
</html>
