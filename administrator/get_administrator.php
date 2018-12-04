<?php
include('../template.php');
if( !empty($_GET['idAdministrator']) ){
	//Si le client a saisi une ville de depart, on filtre les données via MySQL
	$requete = $pdo->prepare("SELECT * FROM `Administrator` WHERE `idAdministrator` LIKE :idAdministrator");
	$requete->bindParam(':idAdministrator', $_GET['idAdministrator']);
} else {
	//Sinon on affiche tous les vols
	$requete = $pdo->prepare("SELECT * FROM `Administrator`");
}
if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['Administrator'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}
reponse_json($success, $data);