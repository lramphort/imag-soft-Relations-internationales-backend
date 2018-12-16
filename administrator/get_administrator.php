<?php
include('../template.php');

if( !empty($_GET['idPerson']) ){
	$requete = $pdo->prepare("SELECT * FROM `Administrator` WHERE `idPerson` LIKE :idPerson");
	$requete->bindParam(':idPerson', $_GET['idPerson']);
} else {
	$requete = $pdo->prepare("SELECT * FROM `Administrator`");
}

if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['Administrator'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);