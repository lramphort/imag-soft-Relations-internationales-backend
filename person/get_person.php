<?php
include('../template.php');
if( !empty($_GET['idPerson']) ){
	//Si le client a saisi une ville de depart, on filtre les données via MySQL
	$requete = $pdo->prepare("SELECT * FROM `Person` WHERE `idPerson` LIKE :idPerson");
	$requete->bindParam(':idPerson', $_GET['idPerson']);
} else {
	//Sinon on affiche tous les vols
	$requete = $pdo->prepare("SELECT * FROM `Person`");
}
if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['Person'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}
reponse_json($success, $data);