<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Créer un Compte Utilisateur</title>
	<style>
			input:hover,
			input[type="submit"]:hover {
				border: 2px solid #370adb; /* Couleur de la bordure au survol */
				transform: scale(1.2); /*translateY(-5px);*/ /* Déplace les éléments vers le haut */
				cursor: pointer; /* Curseur en forme de main pointer */
			}
			
		</style>
</head>
<body align="center" style="background: url('image.png') no-repeat center center fixed; background-size: 500px 500px;">
    <div style=" background-color:grey; height: 150px; position: fixed;top: 0;width: 100%;">
        <h1 style="margin-top:2px"><u>Création de compte</u></h1>
        <div style="display: flex; justify-content: space-between; margin-top:0px">
            <button class="floating-button" onclick="window.location.href='admin_propo.php'">
                <h2>A propos</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='historique_adminFormulaire.php'">
                <h2>Historiques</h2>
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
    </div>
    <div align="center" style="margin:0%;">
    <div  style="background-color: #3d0979; text-align:center; width: 300px; border: 50px; height: 370px; margin-top: 152px; ">
        <br>
        <form action="creer_compte.php" method="post">
            <label for="nom_utilisateur"><strong style="color:white">Nom d'utilisateur:</strong></label><br><br>
            <input type="text" name="nom_utilisateur" required style="height: 25px;border-radius: 5px;"><br><br><br>
            
            <label for="mot_de_passe"><strong style="color:white">Mot de passe:</strong></label><br><br>
            <input type="password" name="mot_de_passe" required style="height: 25px;border-radius: 5px;"><br><br><br>
            
            <label for="occupation"><strong style="color:white">Rôle:</strong></label><br><br>
            <select id="monBouton" name="occupation" required style="height: 25px;border-radius: 5px;">
                <option value="utilisateur">Utilisateur</option>
                <option value="administrateur">Administrateur</option>
            </select><br><br><br>
            
            <button id="monBouton" type="submit" style="background-color: green; cursor:pointer; width: 120px; border-radius: 15px; height: 35px; border: 5px; font-weight: bold;">Créer le Compte</button>
        </form>
    </div>
    <br>
    </div>
    <?php
    require_once "config_db.php";
    session_start();
    if (!isset($_SESSION["user_id"]) || $_SESSION["user_role"] !== "administrateur") {
        header("Location: connexion.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        

        $nom_utilisateur = $_POST["nom_utilisateur"];
        $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
        $occupation = $_POST["occupation"];

        try {
            // Initialiser la connexion à la base de données
            $pdo_conn = db_config::init_DB();

            // Insérer le nouvel utilisateur dans la table utilisateurs
            $sql = "INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe, occupation) VALUES (?, ?, ?)";
            $pdo_statement = $pdo_conn->prepare($sql);
            $pdo_statement->execute([$nom_utilisateur, $mot_de_passe, $occupation]);

            // Afficher un message de succès
            echo "Compte de " . $nom_utilisateur . " créé avec succès!";

            // Rediriger vers la page d'options administrateur après quelques secondes
            header("refresh:2;url=creer_compte.php");
            exit();
            
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    ?>
<div><a href="deconnexion.php">Se déconnecter</a></div>
<br><br><br><div align="center">!!!!!!!</div>

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
