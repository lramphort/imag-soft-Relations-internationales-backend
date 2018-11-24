<?php
include('../template.php');
if( !empty($_GET['idPerson']) && !empty($_GET['mail']) && !empty($_GET['firstName']) && !empty($_GET['lastName']) && !empty($_GET['birthDate']) 
&& !empty($_GET['lastConnection']) && !empty($_GET['tel']) ){
	//Si toutes les données sont saisie par le client

    $requete = $pdo->prepare("INSERT INTO Person VALUES (:idPerson,:mail,:firstName, :lastName ,null,null,:tel);");
    $requete->bindParam(':idPerson', $_GET['idPerson']);
	$requete->bindParam(':mail', $_GET['mail']);
	$requete->bindParam(':firstName', $_GET['firstName']);
    $requete->bindParam(':lastName', $_GET['lastName']);
    $requete->bindParam(':birthDate', $_GET['birthDate']);
    $requete->bindParam(':lastConnection', $_GET['lastConnection']);
    $requete->bindParam(':tel', $_GET['tel']);
	
	if( $requete->execute() ){
		$success = true;
		$msg = 'Une personne a bien été ajoutée';
	} else {
		$msg = "Une erreur s'est produite...";
	}
} else {
    $success = false;
	$msg = "Il manque des informations...";
}
reponse_json($success, $data, $msg);
