<?php
	include('../template.php');
	if( !empty($_GET['loginStudent']) && !empty($_GET['passWordStudent']) && !empty($_GET['idPerson']) ){
		$requete = $pdo->prepare("SELECT * FROM `Student` WHERE `login` LIKE :loginStudent AND `passWord` LIKE :passWordStudent");
		$requete->bindParam(':loginStudent', $_GET['loginStudent']);
		$requete->bindParam(':passWordStudent', $_GET['passWordStudent']);
		
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
