<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="styles.css">
		<title>PrintPage</title>
		<style>
			input[type="email"]:hover,
			input[type="text"]:hover,
			textarea:hover,
			input[type="submit"]:hover {
				border: 2px solid #370adb; /* Couleur de la bordure au survol */
				transform: translateY(-5px); /* Déplace les éléments vers le haut */
				cursor: pointer; /* Curseur en forme de main pointer */
			}
		</style>
	</head>
	<body align="center" >
	    <div style=" background-color:grey; height: 150px; position: fixed;top: 0;width: 100%;">
			<h1 style="margin-top:2px"><u>*** Envoyer un e-mail au developpeur ***</u></h1>
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
		<div align="center" style="margin-top:77px" >
			<div  style="background-color:rgb(0, 128, 126);width:30%">
				<br><form method="post" action="mailscrp.php">
					<label for="expediteur"><strong>Votre adresse e-mail :</strong></label><br><br>
					<input type="email" name="expediteur"  style="height: 40px; width:70%; border-radius:10px;" required><br><br><br>
					<label for="objet"><strong>Objet :</strong></label><br><br>
					<input type="text" name="objet" style="height: 40px; width:70%; border-radius:10px;" required><br><br><br>
					<label for="message"><strong>Message :</strong></label><br><br>
					<textarea name="message" rows="4" cols="50" required></textarea><br><br><br>
					<input type="submit" value="Envoyer" style="height: 40px; width:30%;border-radius:10px;background-color:#370adb;color:white;font-size:15px">
				</form><br>
			</div> 
		</div>
		
	</body>
</html>

