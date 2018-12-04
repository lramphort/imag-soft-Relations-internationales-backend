<?php
include('../template.php');
if( !empty($_GET['idContact']) && !empty($_GET['idStudent']) ){
	//Si le client a saisi une ville de depart, on filtre les données via MySQL
	$requete = $pdo->prepare("SELECT * FROM `Contact` WHERE `idContact` LIKE :idContact AND `idStudent` LIKE :idStudent");
	$requete->bindParam(':idContact', $_GET['idContact']);
	$requete->bindParam(':idStudent', $_GET['idStudent']);
} else {
	//Sinon on affiche tous les vols
	$requete = $pdo->prepare("SELECT * FROM `Contact`");
}
if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	//var_dump($resultats);
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['Contact'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}
reponse_json($success, $data);