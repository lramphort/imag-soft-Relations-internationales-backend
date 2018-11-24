<?php
include('../template.php');
if( !empty($_GET['idStudent']) ){
	//Si le client a saisi une ville de depart, on filtre les données via MySQL
	$requete = $pdo->prepare("SELECT * FROM `Student` WHERE `idStudent` LIKE :idStudent");
	$requete->bindParam(':idStudent', $_GET['idStudent']);
} else {
	//Sinon on affiche tous les vols
	$requete = $pdo->prepare("SELECT * FROM `Student`");
}
if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['Student'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}
reponse_json($success, $data);