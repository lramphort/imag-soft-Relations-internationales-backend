<?php
include('../template.php');
if( !empty($_GET['loginAdministrator']) && !empty($_GET['passWordAdministrator']) ){
    $requete = $pdo->prepare("SELECT `idPerson` FROM `Administrator` WHERE `login` = :loginAdministrator AND `passWord` = :passWordAdministrator;");
	$requete->bindParam(':loginAdministrator', $_GET['loginAdministrator']);
	$requete->bindParam(':passWordAdministrator', $_GET['passWordAdministrator']);
	if( $requete->execute() ){
		$resultats = $requete->fetchAll();

		// $today = new DateTime();
		// $requeteUpdateLastConnection = $pdo->prepare("UPDATE `Administrator` SET `lastConnection` = :newTimestamp WHERE `idPerson` = :idPerson");
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
