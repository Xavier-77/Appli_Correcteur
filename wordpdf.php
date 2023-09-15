
<?php

session_start();
require_once "composer.lock";
require_once "removeSpecial.php";
require_once "config_db.php";
//include "vendor/autoload.php";
$resultMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["fichierTexte"])) {
        $fichierTexte = $_FILES["fichierTexte"];
        if ($fichierTexte["error"] === 0) {
            $contenuTexte = file_get_contents($fichierTexte["tmp_name"]);

            // Vérifier si le contenu du fichier a déjà été traité et stocké
            $pdo_conn = db_config::init_DB();
            $existingTextSql = "SELECT * FROM texte WHERE texteOriginal = :texteOriginal";
            $existingTextStatement = $pdo_conn->prepare($existingTextSql);
            $existingTextStatement->bindParam(':texteOriginal', $contenuTexte);
            $existingTextStatement->execute();
            $existingText = $existingTextStatement->fetch(PDO::FETCH_ASSOC);

            if ($existingText) {
                $resultMessage = "Ce texte a déjà été traité et stocké.";
            } else {
                // Vérifier l'extension du fichier
                $fileExtension = strtolower(pathinfo($fichierTexte["name"], PATHINFO_EXTENSION));

                if ($fileExtension == "txt") {
                    // Le fichier est un texte brut (.txt)
                    $texteTraite = removeSpecialChars($contenuTexte);
                } elseif ($fileExtension == "docx") {
                    // Le fichier est au format Word (.docx)
                    require_once 'vendor/autoload.php'; // Inclure l'autoloader de PHPWord

                    // Charger le fichier Word
                    $phpWord = \PhpOffice\PhpWord\IOFactory::load($fichierTexte["tmp_name"]);

                    // Récupérer le texte du document Word
                    $texteDuDocument = '';
                    foreach ($phpWord->getSections() as $section) {
                        foreach ($section->getElements() as $element) {
                            if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                                foreach ($element->getElements() as $textRunElement) {
                                    if ($textRunElement instanceof \PhpOffice\PhpWord\Element\Text) {
                                        $texteDuDocument .= $textRunElement->getText();
                                    }
                                }
                            }
                        }
                    }

                    // Traiter le texte extrait du fichier Word
                    $texteTraite = removeSpecialChars($texteDuDocument);
                } elseif ($fileExtension == "pdf") {
                    //require_once 'vendor/autoload.php';
                    //parsage du fichier
                    //$parsr = new \Smalot\PdfParser\Parser();
                    // Le fichier est au format PDF (.pdf)
                    //$commande = "pdftotext \"" . $fichierTexte["tmp_name"] . "\" -"; // Le "-" signifie que la sortie est renvoyée à PHP
                    //$texteExtrait = shell_exec($commande);
                    require_once 'vendor/autoload.php';

                    // Créez une instance de PdfParser
                    $parser = new \Smalot\PdfParser\Parser();

                    // Chargez le fichier PDF
                    $pdf = $parser->parseFile($fichierTexte["tmp_name"]);

                    // Obtenez le texte du PDF
                    $texteExtrait = $pdf->getText();

                    // Traiter le texte extrait du fichier PDF
                    $texteTraite = removeSpecialChars($texteExtrait);

                    // Traiter le texte extrait du fichier PDF
                    //$texteTraite = removeSpecialChars($texteExtrait);

                } else {
                    $resultMessage = "Le format de fichier n'est pas pris en charge.";
                }

                if (!empty($texteTraite)) {
                    // Récupérer l'ID de l'utilisateur depuis la session
                    $user_id = $_SESSION['user_id'];

                    // Insérer les données dans la base de données
                    $insertSql = "INSERT INTO texte (id_utilisateur, texteOriginal, texteTraite, dateStockage) VALUES (:id_utilisateur, :texteOriginal, :texteTraite, NOW())";
                    $pdo_statement = $pdo_conn->prepare($insertSql);
                    $pdo_statement->bindParam(':id_utilisateur', $user_id);
                    $pdo_statement->bindParam(':texteOriginal', $contenuTexte);
                    $pdo_statement->bindParam(':texteTraite', $texteTraite);
                    $result = $pdo_statement->execute();

                    if ($result) {
                        $resultMessage = "Le fichier a été chargé, traité et stocké avec succès.";
                    } else {
                        $resultMessage = "Erreur lors de l'insertion des données dans la base de données.";
                    }
                } else {
                    $resultMessage = "Erreur lors du traitement du texte.";
                }
            }
        } else {
            $resultMessage = "Une erreur s'est produite lors du chargement du fichier.";
        }
    }
}
?>
<!-- Le reste du code HTML -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Charger un Texte</title>
</head>
<body align="center">
<div style=" background-color:grey; height: 150px; position: fixed;top: 0;width: 100%;">
        <h1 style="margin-top:2px"><u>Chargement de texte</u></h1>
        <div style="display: flex; justify-content: space-between; margin-top:0px">
            <button class="floating-button" onclick="window.location.href='admin_propo.php'">
                <h2>A propos</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='historique_adminFormulaire.php'">
                <h2>Historiques</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='creer_compte.php'">
                <h2>créer de comptes</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='afficherUtilisateur.php'">
                <h2>Les utilisateurs</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='saisir_texte_admin.php'">
                <h2>Traiter un texte</h2>
            </button>
            <!--<button class="floating-button" onclick="window.location.href='charger_texte_admin.php'">
                <h2>Chargement de texte</h2>
            </button>-->
        </div>
    </div>
    <div style="background: url('image.png') no-repeat  center fixed; background-size: 500px 500px;margin-top:155px;">
        <?php if (!empty($resultMessage)) { ?>
            <p><?php echo $resultMessage; ?></p>
        <?php } ?>
        <form action="wordpdf.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fichierTexte" accept=".txt, .docx, .pdf" style=" border: 5px; font-weight: bold;height:20px;cursor:pointer;">
            <br><br><br><br>
            <button type="submit" style="cursor:pointer;border-radius:10px" ><strong>Charger et Traiter le Texte</strong></button>
        </form>
        <br><br><br>
        <!--<a href="user_option.php">Retour aux options utilisateur</a><br><br><br>-->
        <p><b><u>NB:</u> </b><font color = "red">Les fichiers textes seuls sont acceptés.</font></p>
        <div ><a href="deconnexion.php">Se déconnecter</a></div>
        <p align="center">!!!!!!!</p>
        <strong><hr size="2" color="black" width="100%"></strong>
    </div>
    <div style="display: flex; justify-content: space-between;">
    <?php if (isset($contenuTexte) && isset($texteTraite)) { ?>
    
    <!--<div style="flex: 1; padding: 10px;">
        <h2>Contenu du fichier original :</h2>
        <div style="text-align: justify;">
            <pre><?php //echo htmlspecialchars($contenuTexte); ?></pre>
        </div>
    </div>-->
    <div style="flex: 1; padding: 10px;" align="center">
        <h2>Texte traité :</h2>
        <div style="text-align: justify;" align="center">
            <pre><?php echo htmlspecialchars($texteTraite); ?></pre>
        </div>
        <a href="download_processed_text.php?text=<?php echo urlencode($texteTraite); ?>" download>Télécharger le texte traité</a>
    </div>
    <?php } ?>
</div><br>
   
</body>
</html>

