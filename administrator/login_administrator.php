<?php
include('../template.php');
if( !empty($_GET['loginAdministrator']) && !empty($_GET['passWordAdministrator']) ){
    $requete = $pdo->prepare("SELECT COUNT(`idPerson`) FROM `Administrator` WHERE `login` = :loginAdministrator AND `passWord` = :passWordAdministrator;");
	$requete->bindParam(':loginAdministrator', $_GET['loginAdministrator']);
	$requete->bindParam(':passWordAdministrator', $_GET['passWordAdministrator']);
	if( $requete->execute() ){
		$success = true;
		$msg = 'Administrator logged';
	} else {
		$success = false;
		$msg = 'Wrong logs';
	}
} else {
    $success = false;
	$msg = "Il manque des informations...";
}
reponse_json([$success, $data, $msg]);
