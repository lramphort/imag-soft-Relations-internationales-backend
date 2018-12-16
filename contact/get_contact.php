<?php
include('../template.php');

if( !empty($_GET['idContact']) ){
	$requete = $pdo->prepare("SELECT * FROM `Contact` WHERE `idContact` LIKE :idContact");
	$requete->bindParam(':idContact', $_GET['idContact']);
} elseif( !empty($_GET['idPerson']) ) {
	$requete = $pdo->prepare("SELECT * FROM `Contact` WHERE `idPerson` LIKE :idPerson");
	$requete->bindParam(':idPerson', $_GET['idPerson']);
} else {
	$requete = $pdo->prepare("SELECT * FROM `Contact`");
}

if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['Contact'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);