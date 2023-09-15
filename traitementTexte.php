<?php
require_once "conserveLine.php";
require_once "config_db.php";
session_start();

$resultMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["texte"])) {
        $texteOriginal = trim($_POST["texte"]); // Supprimer les espaces au début et à la fin
        if (!empty($texteOriginal)) { // Vérifier si le texte n'est pas vide
            $texteTraite = processTextStructurePreserving($texteOriginal);

            // Récupérer l'ID de l'utilisateur depuis la session
            $user_id = $_SESSION['user_id'];

            // Initialiser la connexion à la base de données
            $pdo_conn = db_config::init_DB();

            // Vérifier si le texte existe déjà dans la base de données
            $existingTextSql = "SELECT * FROM texte WHERE texteOriginal = :texteOriginal";
            $existingTextStatement = $pdo_conn->prepare($existingTextSql);
            $existingTextStatement->bindParam(':texteOriginal', $texteOriginal);
            $existingTextStatement->execute();
            $existingText = $existingTextStatement->fetch(PDO::FETCH_ASSOC);

            if ($existingText) {
                $resultMessage = "Ce texte existe déjà dans la base de données.";
            } else {
                print('<div style="text-align: center;">');
                print('<h1 align="center">Votre resultat:</h1>');
                print('<div>');
                print('<br><h3>Veuillez voir ci-dessous le resultat du traitement<h3>');
                print('</div>');
                print('<br><div style="display: flex; justify-content: space-between;">');
                print('<div style="width: 100%;">');
                print("<b>Texte traité :</b> <br>" . $texteTraite );
                print('<br><a href="download_processed_text.php?text=<?php echo urlencode('.$texteTraite.'); ?>" download>Télécharger le texte traité</a>');
                print('</div>');
                print('</div>');
                print('</div>');
				
                // Insérer les données dans la base de données
                $insertSql = "INSERT INTO texte (id_utilisateur, texteOriginal, texteTraite, dateStockage) VALUES (:id_utilisateur, :texteOriginal, :texteTraite, NOW())";
                $pdo_statement = $pdo_conn->prepare($insertSql);
                $pdo_statement->bindParam(':id_utilisateur', $user_id);
                $pdo_statement->bindParam(':texteOriginal', $texteOriginal);
                $pdo_statement->bindParam(':texteTraite', $texteTraite);
                $result = $pdo_statement->execute();

                if ($result) {
                    return 1;
                } else {
                    $resultMessage = "Erreur lors de l'insertion des données.";
                }
            }
        } else {
            $resultMessage = "Veuillez entrer du texte avant de traiter.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Traitement de Texte</title>
</head>
<body align="center" bgcolor="gray">
    <form action="traitementTexte.php" method="post">
        <label for="texte"><h1>Saisissez votre texte :</h1></label><br>
        <textarea name="texte" rows="17" cols="50"></textarea><br><br>
        <!-- Champ caché pour stocker l'ID de l'utilisateur -->
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <input type="submit" value="Traiter" style="background-color: #370adb; color: white;"><br><br>
    </form>
    <div style="text-align: center;">
        <?php echo $resultMessage; ?>
    </div>
</body>
<footer>
    <p></p>
</footer>
</html>

