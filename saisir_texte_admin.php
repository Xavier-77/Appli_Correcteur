<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>PrintPage</title>
</head>
<body align="center" >
<div style=" background-color:grey; height: 150px; position: fixed;top: 0;width: 100%;">
        <h1 style="margin-top:2px"><u>Traitement de texte</u></h1>
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
            <button class="floating-button" onclick="window.location.href='charger_texte_admin.php'">
                <h2>Chargement</h2>
            </button>
        </div>
    </div><br>
    <div style="margin-top:141px">
        <form action="traitementTexte.php" method="post">
            <label for="texte"><h3>Veuillez saisir votre texte dans le rectangle ci-dessous</h3></label><br>
            <textarea name="texte" rows="17" cols="100"></textarea><br><br>
            <input id="monBouton" type="submit" value="Traiter" style="background-color: #370adb; cursor:pointer; border-radius: 15px; border: 5px; font-weight: bold;color: white; width: 120px;height: 50px;font-weight: bold">
        </form>
    </div>
    
</body><br><br>
<footer>
    <div bottom="0px">
        <strong><font color="red"><u>Remarque:</u></font></strong>
        <p style=" font-weight:bold">Votre texte peut prendre autant de caractères ou lettres que vous souhaitez !!!</p>
    </div>
    <div><a href="deconnexion.php">Se déconnecter</a></div>
    <p align="center">!!!!!!!</p>
</footer>

<script>
	const bouton = document.getElementById('monBouton');

	bouton.addEventListener('mouseover', () => {
		// Ajoutez ici le code pour le mouvement souhaité
		bouton.style.transform = 'scale(1.2)'; // Exemple : agrandir le bouton au survol
	});

	bouton.addEventListener('mouseout', () => {
		// Réinitialisez le bouton lorsque le curseur quitte le bouton
		bouton.style.transform = 'scale(1)';
	});
</script>

</html>

