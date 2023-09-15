<?php

class db_config {

    private static $pdo_conn;

    // Vérifie si la base de données existe en tentant de s'y connecter
    static public function db_exists(string $host, string $username, string $password, string $db_name): bool {
        try {
            $pdo_conn = new PDO('mysql:host='.$host.';dbname='.$db_name, $username, $password);
            return true; // La base de données existe
        } catch (\Throwable $th) {
            return false; // La connexion a échoué, donc la base de données n'existe pas
        }
    }

     // Vérifie si une table existe dans la base de données
     static public function table_exists($pdo_conn, string $table_name): bool {
        try {
            $pdo_statement = $pdo_conn->prepare("SELECT 1 from " . $table_name);
            $pdo_statement->execute();
            return true; // La table existe
        } catch (\Throwable $th) {
            return false; // La requête a échoué, donc la table n'existe pas
        }
    }

    // Initialise la base de données et les tables si elles n'existent pas
    static function init_DB() {
        //session_start();
        if (!isset(self::$pdo_conn)) {
            // Paramètres de connexion à la base de données
            $database_username = 'root';
            $database_password = '';
            $database_host = "localhost";
            $database_name = "textes";
            $texte_table = "texte";
            $utilisateurs_table = "utilisateurs";

            // Vérifie si la base de données existe, sinon la crée
            if (!db_config::db_exists($database_host, $database_username, $database_password, $database_name)) {
                try {
                    $dbh = new PDO("mysql:host=$database_host", $database_username, $database_password);
                    $dbh->exec("CREATE DATABASE `$database_name`;");
                    echo("\nbase de données crée<br>");
                } catch (PDOException $e) {
                    die("DB ERROR: " . $e->getMessage());
                }
            }

            // Crée une instance de connexion à la base de données
            self::$pdo_conn = new PDO('mysql:host=' . $database_host . ';dbname=' . $database_name, $database_username, $database_password);

            // Crée la table "texte" si elle n'existe pas
            if(!db_config::table_exists(self::$pdo_conn,$texte_table)){
                $sql = <<<EOSQL
                CREATE TABLE texte (
                    id INT AUTO_INCREMENT PRIMARY KEY, 
                    id_utilisateur INT NOT NULL, 
                    texteOriginal TEXT NOT NULL, 
                    texteTraite TEXT NOT NULL,
                    dateStockage DATETIME NOT NULL
                ) ENGINE=InnoDB
                EOSQL;
                self::$pdo_conn->exec($sql); 
                print("\n table ".$texte_table." crée<br>");
            }

            // Crée la table "utilisateurs" si elle n'existe pas
            if(!db_config::table_exists(self::$pdo_conn,$utilisateurs_table)){
                $sql = <<<EOSQL
                CREATE TABLE utilisateurs (
                    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
                    nom_utilisateur VARCHAR(255) NOT NULL,
                    mot_de_passe VARCHAR(255) NOT NULL,
                    occupation ENUM('utilisateur', 'administrateur') NOT NULL DEFAULT 'utilisateur'
                ) ENGINE=InnoDB
                EOSQL;
                self::$pdo_conn->exec($sql); 
                print("\n table ".$utilisateurs_table." crée<br>");

                // Insère le premier administrateur dans la table utilisateurs
                $admin_username = 'admin';
                $admin_password = 'admin';
                $admin_role = 'administrateur';

                $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe, occupation) VALUES (:username, :motDePasse, :occupation)";
                $stmt = self::$pdo_conn->prepare($sql);
                $stmt->bindParam(':username', $admin_username);
                $stmt->bindParam(':motDePasse', $hashed_password);
                $stmt->bindParam(':occupation', $admin_role);
                $stmt->execute();
            
                echo "\nPremier administrateur créé.";
            }            

            // on retourne une instance de connection a la base de donnees
            //print("\ninitialisation de la base de données terminée\n");
            return self::$pdo_conn;
     }
        
    }
    

// Récupère le nom d'utilisateur en fonction de l'ID de l'utilisateur
    static public function getNomUtilisateur($id_utilisateur){
        try{
            $pdo_conn = self::init_DB();
            $sql = "SELECT nom_utilisateur FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
            $pdo_statement = $pdo_conn->prepare($sql);
            $pdo_statement->bindParam(':id_utilisateur', $id_utilisateur);
            $pdo_statement->execute();
            $result = $pdo_statement->fetchColumn();
            return $result;
        } catch (PDOException $e){
            return false;
        }
    }
    

    // Récupère le mot de passe en fonction de l'ID de l'utilisateur
    static public function getMotDePasse($id_utilisateur) {
        try {
            $pdo_conn = self::init_DB();
            $sql = "SELECT mot_de_passe FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
            $pdo_statement = $pdo_conn->prepare($sql);
            $pdo_statement->bindParam(':id_utilisateur', $id_utilisateur);
            $pdo_statement->execute();
            $result = $pdo_statement->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }
    

    // Récupère le rôle de l'utilisateur en fonction de l'ID de l'utilisateur
    static public function getRoleUtilisateur($id_utilisateur) {
        try {
            $pdo_conn = self::init_DB();
            $sql = "SELECT occupation FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
            $pdo_statement = $pdo_conn->prepare($sql);
            $pdo_statement->bindParam(':id_utilisateur', $id_utilisateur);
            $pdo_statement->execute();
            $result = $pdo_statement->fetchColumn();
            return $result;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    
}
?>
