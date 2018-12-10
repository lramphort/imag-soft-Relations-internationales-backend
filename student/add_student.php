<?php
include('../template.php');
if( !empty($_GET['idPerson']) 
&& !empty($_GET['firstName']) 
&& !empty($_GET['lastName']) 
&& !empty($_GET['birthDate']) 
&& !empty($_GET['emailAddress']) 
&& !empty($_GET['lastConnection']) 
&& !empty($_GET['phoneNumber']) 
&& !empty($_GET['university']) 
&& !empty($_GET['isEntrant']) 
&& !empty($_GET['isArchived'])
&& !empty($_GET['login'])
&& !empty($_GET['passWord']) ){
	//Si toutes les données sont saisie par le client
    //$requete = $pdo->prepare("INSERT INTO `Student`(`idStudent` , `university` , `isarchived` , `isEntrant`) values (1,'UGA',false,false);");

    $requete = $pdo->prepare("INSERT INTO `Student`(`idPerson` , `firstName` , `lastName` , `emailAddress` , `birthDate` , `lastConnection` , `phoneNumber` , `university` , `isArchived` , `isEntrant` , `login` , `passWord`) values (:idPerson , :firstName , :lastName, :emailAddress, :birthDate , :lastConnection , :phoneNumber , :university , :isArchived , :isEntrant , :loginStudent , :passWordStudent);");
    $requete->bindParam(':idPerson', "'" + $_GET['idPerson'] + "'");
	$requete->bindParam(':firstName', "'" + $_GET['firstName'] + "'");
	$requete->bindParam(':lastName', "'" + $_GET['lastName'] + "'");
	$requete->bindParam(':emailAddress', "'" + $_GET['emailAddress'] + "'");
	$requete->bindParam(':birthDate', "'" + $_GET['birthDate'] + "'");
	$requete->bindParam(':lastConnection', "'" + $_GET['lastConnection'] + "'");
	$requete->bindParam(':phoneNumber', "'" + $_GET['phoneNumber'] + "'");
	$requete->bindParam(':university', "'" + $_GET['university'] + "'");
	$requete->bindParam(':isEntrant', $_GET['isEntrant']);
	$requete->bindParam(':isArchived', $_GET['isArchived']);
	$requete->bindParam(':loginStudent', "'" + $_GET['login'] + "'");
	$requete->bindParam(':passWordStudent', "'" + $_GET['passWord'] + "'");
	if( $requete->execute() ){
		$success = true;
		$msg = 'Un(e) étudiant(e) a bien été ajouté(e)';
	} else {
		$msg = "Une erreur s'est produite...";
	}
} else {
    $success = false;
	$msg = "Il manque des informations...";
}
reponse_json([$success, $data, $msg]);
