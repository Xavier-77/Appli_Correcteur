<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_role"] !== "administrateur") {
    header("Location: formulaireConnexion.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>OptionsAdmin</title>
</head>
<body align="center" style="background: url('image.png') no-repeat center center fixed; background-size: 500px 500px;">
    <div style=" background-color:grey; height: 150px; position: fixed;top: 0;width: 100%;">
        <h1 style="margin-top:2px"><u>Options Administrateur</u></h1>
        <div style="display: flex; justify-content: space-between; margin-top:0px">
            <button class="floating-button" onclick="window.location.href='admin_propo.php'">
                <h2>A propos</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='historique_adminFormulaire.php'">
                <h2>Historiques</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='creer_compte.php'">
                <h2>Comptes</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='afficherUtilisateur.php'">
                <h2>Utilisateurs</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='saisir_texte_admin.php'">
                <h2>Traitement</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='charger_texte_admin.php'">
                <h2>Chargement</h2>
            </button>
        </div>
    </div><br><br><br><br>
    <div style="margin-top:441px"><a href="deconnexion.php">Se déconnecter</a></div>
	<div style="margin-top:130px"><a href="maildev.php">Ecrire au réalisateur (BADO:65308072)</a></div>
</body>
</html>
