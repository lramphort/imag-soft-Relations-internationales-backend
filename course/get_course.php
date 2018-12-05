<?php
include('../template.php');
if( !empty($_GET['idCourse']) ){
	//Si le client a saisi une ville de depart, on filtre les données via MySQL
	$requete = $pdo->prepare("SELECT * FROM `Course` WHERE `idCourse` LIKE :idCourse");
	$requete->bindParam(':idCourse', $_GET['idCourse']);
} elseif( !empty($_GET['idPerson']) ) {
	$requete = $pdo->prepare("SELECT * FROM `Course` WHERE `idPerson` LIKE :idPerson");
	$requete->bindParam(':idPerson', $_GET['idPerson']);
} else {
	//Sinon on affiche tous les vols
	$requete = $pdo->prepare("SELECT * FROM `Course`");
}
if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['Course'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}
reponse_json($success, $data);