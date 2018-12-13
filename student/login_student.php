<?php
	include('../template.php');
	if( !empty($_GET['loginStudent']) && !empty($_GET['passWordStudent']) ){
		$requete = $pdo->prepare("SELECT `idPerson` FROM `Student` WHERE `login` = :loginStudent AND `passWord` = :passWordStudent");
		$requete->bindParam(':loginStudent', $_GET['loginStudent']);
		$requete->bindParam(':passWordStudent', $_GET['passWordStudent']);
		
		if( $requete->execute() ){
			$resultats = $requete->fetchAll();

			// $today = new DateTime();
			// $requeteUpdateLastConnection = $pdo->prepare("UPDATE `Student` SET `lastConnection` = :newTimestamp WHERE `idPerson` = :idPerson");
			// $requeteUpdateLastConnection->bindParam(':newTimestamp', $today->getTimestamp());
			// $rerequeteUpdateLastConnectionquete2->bindParam(':idPerson', $resultats[0]['idPerson']);
			// $requeteUpdateLastConnection->execute();
			
			$success = true;
			$data['result'] = $resultats[0]['idPerson'];
		} else {
			$success = false;
			$data['result'] = 0;
			$data['message'] = "Wrong logs";
		}
	} else {
		$success = false;
		$data['result'] = 0;
		$data['message'] = "Missing arguments";
	}
	reponse_json($success, $data);
