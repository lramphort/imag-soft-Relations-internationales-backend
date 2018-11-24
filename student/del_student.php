<?php
include('../template.php');
if( !empty($_GET['idStudent']) ){
	//Si le client a saisis un id
	$requete = $pdo->prepare("DELETE FROM `Student` WHERE `idStudent` LIKE :idStudent;");
	$requete->bindParam(':idStudent', $_GET['idStudent']);
	if( $requete->execute() ){
		$success = true;
		$msg = 'L etudiant est supprimé';
	} else {
		$msg = "Une erreur s'est produite";
	}
} else {
	$msg = "Il manque des informations";
}
reponse_json($success, $data, $msg);