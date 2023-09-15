<!DOCTYPE html>
<html>
<head>
    <title>displayUsers</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <script>
        function showEditForm(id_utilisateur) {
            var editForm = '<form action="modifierUser.php" method="post">';
            editForm += '<input type="hidden" name="id_utilisateur" value="' + id_utilisateur + '">';
            editForm += '<label for="nom_utilisateur"><strong>Ancien nom utilisateur :</strong></label><br>';
            editForm += '<p>' + htmlentities(getNomUtilisateur(id_utilisateur)) + '</p>';
            editForm += '<label for="nouveau_nom_utilisateur"><strong>Nouveau nom utilisateur :</strong></label><br>';
            editForm += '<input type="text" name="nouveau_nom_utilisateur" rows="1" cols="10"><br>';
            editForm += '<label for="mot_de_passe"><strong>Ancien mot de passe :</strong></label><br>';
            editForm += '<p>' + htmlentities(getMotDePasse(id_utilisateur)) + '</p>';
            editForm += '<label for="nouveau_mot_de_passe"><strong>Nouveau mot de passe :</strong></label><br>';
            editForm += '<input type="password" name="nouveau_mot_de_passe" rows="1" cols="10"><br>';
            editForm += '<label for="rôle"><strong>Ancien rôle :</strong></label><br>';
            editForm += '<p>' + htmlentities(getRoleUtilisateur(id_utilisateur)) + '</p>';
            editForm += '<label for="nouveau_role_utilisateur"><strong>Nouveau rôle :</strong></label><br>';
            editForm += '<select name="nouveau_rôle">';
            editForm += '<option value="utilisateur">Utilisateur</option>';
            editForm += '<option value="administrateur">Administrateur</option>';
            editForm += '</select><br><br>';
            editForm += '<input type="submit" value="Enregistrer les Modifications">';
            editForm += '</form>';

            // Replace the current row with the edit form
            var currentRow = document.getElementById('row-' + id_utilisateur);
            currentRow.innerHTML = editForm;
        }
    </script>

</head>
<body align="center">
<div style=" background-color:grey; height: 150px; position: fixed;top: 0;width: 100%;">
        <h1 style="margin-top:2px"><u>Liste des utilisateurs</u></h1>
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
            <button class="floating-button" onclick="window.location.href='saisir_texte_admin.php'">
                <h2>Traitement</h2>
            </button>
            <button class="floating-button" onclick="window.location.href='charger_texte_admin.php'">
                <h2>Chargement</h2>
            </button>
        </div>
    </div>
    <div style="margin-top:152px">

    <?php
    require_once "config_db.php";

    try {
        // Initialiser la connexion à la base de données
        $pdo_conn = db_config::init_DB();

        // Sélectionner tous les enregistrements de la table texte
        $sql = "SELECT * FROM utilisateurs";
        $pdo_statement = $pdo_conn->query($sql);
        $utilisateur = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);

        // Afficher les utilisateurs récupérés dans un tableau
        if (!empty($utilisateur)) {
            echo '<table border="2" align="center" width="100%">';
            echo '<tr><th>ID</th><th>Nom utilisateur</th><th>Rôle</th><th>Modification</th><th>Suppression</th></tr>';
            foreach ($utilisateur as $utilisateurs) {
                echo '<tr>';
                echo '<td>' . $utilisateurs['id_utilisateur'] . '</td>';
                echo '<td><p style="font-size: 15px; text-align: justify">' . htmlentities($utilisateurs['nom_utilisateur']) . '</p></td>';
                echo '<td><p style="font-size: 15px; text-align: justify">' . htmlentities($utilisateurs['occupation']) . '</p></td>';
                echo '<td color="blue" id="monBouton"><a href="formulaireModifierUser.php?id_utilisateur=' . $utilisateurs['id_utilisateur'] . '"><font color="blue">Modifier</font></a> </td> ';
                echo '<td color="red" id="monBouton"><a href="javascript:void(0);" onclick="confirmDelete(' . $utilisateurs['id_utilisateur'] . ')"><font color="red">Supprimer</font></a></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo 'Aucun utilisateur trouvé dans la base de données.';
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>
    </div>
    <script>
        function confirmDelete(id) {
            if (confirm('Veuillez confirmer la suppression')) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        // Mettre à jour le contenu de la page avec le résultat de la suppression
                        document.body.innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "supprimerUtilisateur.php?id=" + id, true);
                xhttp.send();
            }
        }
    </script>
    
    <br><div ><a href="deconnexion.php">Se déconnecter</a></div>
    <p align="center">!!!!!!!</p>
</body>
</html>
