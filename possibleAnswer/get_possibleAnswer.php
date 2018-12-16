<?php
include('../template.php');
if( !empty($_GET['idPoll']) ){
	$requete = $pdo->prepare("SELECT * FROM `PossibleAnswer` WHERE `idPoll` LIKE :idPoll");
	$requete->bindParam(':idPoll', $_GET['idPoll']);
} else {
	$requete = $pdo->prepare("SELECT * FROM `PossibleAnswer`");
}

if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['PossibleAnswer'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);