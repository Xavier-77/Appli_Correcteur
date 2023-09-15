<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
	<style>
			input:hover,
			textarea:hover,
			input[type="submit"]:hover {
				border: 2px solid #370adb; /* Couleur de la bordure au survol */
				transform: scale(1.2);/*translateY(-5px);*/ /* Déplace les éléments vers le haut */
				cursor: pointer; /* Curseur en forme de main pointer */
			}
		</style>
</head>
<body align="center" >
    <h1><u>Connexion</u></h1>

    <?php
    // Afficher les messages d'erreur s'il y en a
    if (isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
    ?>
    <p>Veuillez fournir les informations necessaires pour vous connecter!!!</p>
    <div align="center" style="margin:0%;">
        <div class="cent-div" style="background-color: rgb(0, 128, 126); width: 300px; border: 50px; height: 350px;  ">
            <br>
            <form action="connexion.php" method="post">
                <label for="username" ><strong style="color:white">Nom d'utilisateur :</strong></label><br><br>
                <input type="text" id="username" name="username" required style="height: 40px; width:90%;border-radius: 5px;"><br><br><br>
                
                <label for="motPasse"><strong style="color:white">Mot de passe :</strong></label><br><br>
                <input type="password" id="motPasse" name="motPasse" required style="height: 40px; width:90%; border-radius: 5px;"><br><br><br>

                <input type="submit" value="Se connecter" style="background-color: #370adb; color: white; width: 120px; cursor:pointer; height: 50px;border-radius: 15px; border: 5px; font-weight: bold;">
            </form>
        </div><br>
    </div>
    <a href="home.php" align="center">Rétour à la page d'accueil</a>
</body>
</html>
