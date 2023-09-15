<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>HomePage</title>
</head>
<body align="center" style="background: url('image.png') no-repeat center center fixed; background-size: 500px 500px;">
    <h1>AFRIC CONSULTING GROUP!!!</h1><br>
    <h3>Bienvenue sur notre Plateforme de Traitement de Texte</h3><br>
    <p style="font-size: 20px; text-align: justify; margin-left: 20px; margin-right: 20px">
        Notre plateforme vous offre des options pour traiter vos textes et afficher les textes stockés. 
        Il faut dire que vous avez la possibilité de non seulement transformer les caractères spéciaux de vous
        mais de voir l'historique, de modifier et de supprimer des textes que vous avez déjà manipulé avec cette
        plateforme. Nous pensons pouvoir rendre votre travail encore plus interessant voir plus passionnant avec
        cette plateforme!!! . </p><br><br><br><br><br><br><br><br><br><br><br>
    
    <?php
    // Démarrer ou reprendre une session
    session_start();
    
    // Vérifier si l'utilisateur est déjà connecté
    if (isset($_SESSION['user_id'])) {
        // Rediriger vers la page d'historique ou toute autre page appropriée
        header("Location: deconnexion.php");
        exit();
    }
    ?>
	<form action="formulaireConnexion.php" method="get">
        <button id="monBouton" type="submit" style="background-color: rgb(11, 192, 87); color: rgb(5, 5, 5); width: 150px; height: 50px;cursor: pointer;border-radius: 5px;"><b>Connexion</b></button>
    </form>
    <br><br>	
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
</body>
</html>

