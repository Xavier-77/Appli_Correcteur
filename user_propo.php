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
        <h1 style="margin-top:2px"><u>A propos des options Utilisateur</u></h1>
        <div style="display: flex; justify-content: space-between; margin-top:0px">
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
    </div><br><br>
    <div style="margin: 20px; margin-top:150px">
    <div>
            <h2 align="left">Traiter un texte</h2><hr color="blue" align="left" size="2" noshade width="45%">
            <p align="justify" style="margin-left:5px;font-size: 20px;">
                Ici, vous avez la possibilité de saisir ou de coller un texte dans l'espace de saisie de forme
				rectangulaire se trouvant dans la page de saisie et le traiter . Une fois que vous actionnez le
				bouton "Traiter" apres avoir saisi ou collé du texte, vous aurez le texte traite s'afficher.
            </p>
        </div>
        <div>
            <h2 align="left">Charger un texte</h2><hr color="blue" align="left" size="2" noshade width="45%">
            <p align="justify" style="margin-left:5px;font-size: 20px;">
                Ici, vous avez la possibilité de charger un fichier texte et le traiter. Pour charger un fichier
                vous devez cliquer sur le bouton "choisir un texte" , ce qui vous permettra de choisir un fichier et
                ensuite le traiter avec le bouton "executer".				
            </p>
        </div>
        <div>
            <h2 align="left">Historiques</h2><hr color="blue" align="left" size="2" noshade width="45%">
            <p align="justify" style="margin-left:5px;font-size: 20px;">
                Ici, vous avez la possibilité de visualiser l'historique de tous les textes que vous avez deja manipulé 
                avec cette plateforme.  
            </p>
        </div>
    </div><br><br><br><br>
    <div><a href="deconnexion.php">Se déconnecter</a></div>
    <p align="center">!!!!!!!</p>
</body>
</html>
