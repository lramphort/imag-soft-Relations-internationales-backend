<?php
include('../template.php');

if( !empty($_GET['idContact']) ){
	$requete = $pdo->prepare("DELETE FROM `Contact` WHERE `idContact` LIKE :idContact;");
	$requete->bindParam(':idContact', $_GET['idContact']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le contact est supprimé';
	} else {
		$msg = "Une erreur s'est produite";
	}
	
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);