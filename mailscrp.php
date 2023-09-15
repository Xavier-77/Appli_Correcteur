<?php
session_start();

if (!isset($_SESSION["user_id"]) || $_SESSION["user_role"] !== "administrateur") {
    header("Location: formulaireConnexion.php");
    exit();
}
if($_SESSION["user_role"] !== "administrateur"){
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$destinataire = "xavier.bado@africconsultinggroup.com"; // Remplacez par l'adresse e-mail du développeur
			$expediteur = $_POST["expediteur"];
			$objet = $_POST["objet"];
			$message = $_POST["message"];

			// Envoyer l'e-mail
			 $headers = "From: $expediteur"; // Adresse e-mail de l'expéditeur
			if (mail($destinataire, $objet, $message, $headers)) {
				echo "L'e-mail a été envoyé avec succès au développeur.";
				header("Location: maildev.php");
			} else {
				echo "Erreur lors de l'envoi de l'e-mail.";
			}
		}
}else{
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$destinataire = "fatima.gansore@africconsultinggroup.com"; // Remplacez par l'adresse e-mail du développeur
			$expediteur = $_POST["expediteur"];
			$objet = $_POST["objet"];
			$message = $_POST["message"];

			// Envoyer l'e-mail
			 $headers = "From: $expediteur"; // Adresse e-mail de l'expéditeur
			if (mail($destinataire, $objet, $message, $headers)) {
				echo "L'e-mail a été envoyé avec succès au développeur.";
				header("Location: maildev.php");
			} else {
				echo "Erreur lors de l'envoi de l'e-mail.";
			}
		}
}
		
?>
