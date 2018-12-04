<?php
include('../template.php');
if( !empty($_GET['idDailyTopic']) && !empty($_GET['idStudent']) ){
	//Si le client a saisi une ville de depart, on filtre les données via MySQL
	$requete = $pdo->prepare("SELECT * FROM `DailyTopic` WHERE `idDailyTopic` LIKE :idDailyTopic AND `idStudent` LIKE :idStudent");
	$requete->bindParam(':idDailyTopic', $_GET['idDailyTopic']);
	$requete->bindParam(':idStudent', $_GET['idStudent']);
} else {
	//Sinon on affiche tous les vols
	$requete = $pdo->prepare("SELECT * FROM `DailyTopic`");
}
if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['DailyTopic'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}
reponse_json($success, $data);