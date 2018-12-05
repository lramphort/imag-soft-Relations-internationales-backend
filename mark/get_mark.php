<?php
include('../template.php');
if( !empty($_GET['idMark']) ){
	//Si le client a saisi une ville de depart, on filtre les données via MySQL
	$requete = $pdo->prepare("SELECT * FROM `Mark` WHERE `idMark` LIKE :idMark");
	$requete->bindParam(':idMark', $_GET['idMark']);
} elseif( !empty($_GET['idCourse']) && !empty($_GET['idPerson']) ) {
	$requete = $pdo->prepare("SELECT * FROM `Mark` WHERE `idCourse` LIKE :idCourse AND `idPerson` LIKE :idPerson");
	$requete->bindParam(':idPerson', $_GET['idPerson']);
	$requete->bindParam(':idCourse', $_GET['idCourse']);
} else {
	//Sinon on affiche tous les vols
	$requete = $pdo->prepare("SELECT * FROM `Mark`");
}
if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['Mark'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}
reponse_json($success, $data);