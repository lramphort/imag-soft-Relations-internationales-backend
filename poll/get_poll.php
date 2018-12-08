<?php
include('../template.php');
if( !empty($_GET['idPoll']) ){
	//Si le client a saisi une ville de depart, on filtre les données via MySQL
	$requete = $pdo->prepare("SELECT * FROM `Poll` WHERE `idPoll` LIKE :idPoll");
	$requete->bindParam(':idPoll', $_GET['idPoll']);
} elseif( !empty($_GET['idCourse']) && !empty($_GET['idPerson']) ) {
	$requete = $pdo->prepare("SELECT * FROM `Poll` WHERE `idCourse` LIKE :idCourse AND `idPerson` LIKE :idPerson");
	$requete->bindParam(':idPerson', $_GET['idPerson']);
	$requete->bindParam(':idCourse', $_GET['idCourse']);
} else {
	//Sinon on affiche tous les vols
	$requete = $pdo->prepare("SELECT * FROM `Poll`");
}
if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['Poll'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}
reponse_json($success, $data);