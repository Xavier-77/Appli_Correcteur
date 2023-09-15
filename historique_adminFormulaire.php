<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Historique des Textes</title>
</head>
<body align="center">
    
<div style=" background-color:grey; height: 150px; position: fixed;top: 0;width: 100%;">
        <h1 style="margin-top:2px"><u>Historique</u></h1>
        <div style="display: flex; justify-content: space-between; margin-top:0px">
            <button class="floating-button" onclick="window.location.href='admin_propo.php'">
                <h2>A propos</h2>
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
            <button class="floating-button" onclick="window.location.href='charger_texte_admin.php'">
                <h2>Charger un texte</h2>
            </button>
        </div>
    </div>
    <div style="margin-top:152px">
    <?php
        require_once "config_db.php";
        try {
            $pdo_conn = db_config::init_DB();
            $query = "SELECT texte.id, texte.texteOriginal, texte.texteTraite, texte.dateStockage, utilisateurs.nom_utilisateur FROM texte INNER JOIN utilisateurs ON texte.id_utilisateur = utilisateurs.id_utilisateur";
            $statement = $pdo_conn->prepare($query);
            $statement->execute();
            $textes = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($textes)) {
                echo '<table border="2" align="center" width="100%">';
                    echo '<tr>
                        <th>ID</th>
                        <th>Date&heure de Stockage</th>
                        <th>Enregistrateur</th>
                        <th>Texte Original</th>
                        <th>Texte Traité</th>
                        <th>Modification</th>
                        <th>Suppression</th>
                        <th>Telechargement</th>
                        </tr>';
                        foreach ($textes as $texte){
                            echo '<tr>';
                                echo'<td>'. $texte['id'].'</td>';
                                echo'<td>'. $texte['dateStockage'].'</td>';
                                echo'<td>'. $texte['nom_utilisateur'].'</td>';
                                echo'<td align="justify">'. htmlentities($texte['texteOriginal']).'</td>';
                                echo'<td align="justify">'. htmlentities($texte['texteTraite']).'</td>';
                                echo'<td><a href="formulaireModifier.php?id='. $texte['id'].'"><font color="blue">Modifier</font></a></td>';
                                echo'<td><a href="javascript:void(0);" onclick="confirmDelete('. $texte['id'].')"><font color="red">Supprimer</font></a></td>';
                                echo'<td><a href="download_processed_text.php?text='. $texte['texteTraite'].'" download><font color="green">Télécharger le texte traité</font></a></td>';
                            echo '</tr>';
                        }
                echo '</table>';
                }   else {
                    echo 'Aucun enregistrement trouvé dans la base de données.';
                }     
                    
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        ?>
        <script>
                function confirmDelete(id) {
                    if (confirm('Êtes-vous sûr de vouloir supprimer ce texte?')) {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState === 4 && this.status === 200) {
                                // Mettre à jour le contenu de la page avec le résultat de la suppression
                                document.body.innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "supprimerTexte.php?id=" + id, true);
                        xhttp.send();
                    }
                }
            </script>
    </div><br>
    <div><a href="deconnexion.php">Se déconnecter</a></div>
        <p align="center">!!!!!!!</p>
</body>
</html>

