<?php
include('../template.php');
include('../genPW.php');

if( !empty($_GET['firstName']) 
&& !empty($_GET['lastName']) 
&& !empty($_GET['birthDate']) 
&& !empty($_GET['emailAddress']) 
&& !empty($_GET['phoneNumber']) 
&& !empty($_GET['university']) 
&& !empty($_GET['isEntrant']) 
&& !empty($_GET['login'])
&& !empty($_GET['passWord']) 
){
	$password = crypt($_GET['passWord'], '$5$rounds=5000$usesomesillystringforsalt$' );

    $requete = $pdo->prepare("INSERT INTO `Student` ( `firstName` , `lastName` , `emailAddress` , `birthDate` , `lastConnection` , `phoneNumber` , `university` , `isArchived` , `isEntrant` , `login` , `passWord`) values ( :firstName, :lastName, :emailAddress, :birthDate , null , :phoneNumber , :university , 'false' , :isEntrant , :login , :passWord);");
	$requete->bindParam(':firstName',  $_GET['firstName'] );
	$requete->bindParam(':lastName', $_GET['lastName'] );
	$requete->bindParam(':emailAddress', $_GET['emailAddress'] );
	$requete->bindParam(':birthDate', $_GET['birthDate'] );
	$requete->bindParam(':phoneNumber', $_GET['phoneNumber'] );
	$requete->bindParam(':university', $_GET['university'] );
	$requete->bindParam(':isEntrant', $_GET['isEntrant']);
	$requete->bindParam(':login', $_GET['login'] );
	$requete->bindParam(':passWord', $password );
	
	if( $requete->execute() ){
		$requete2 = $pdo->prepare("SELECT * FROM `Student` WHERE `firstName` LIKE :firstName AND `lastName` LIKE :lastName AND `emailAddress` LIKE :emailAddress");
		$requete2->bindParam(':firstName', $_GET['firstName']);
		$requete2->bindParam(':lastName', $_GET['lastName'] );
		$requete2->bindParam(':emailAddress', $_GET['emailAddress'] );
		$requete2->execute();
		$resultats = $requete2->fetchAll();
		
		$success = true;
		$data['Student'] = $resultats;
		$msg = 'Un(e) étudiant(e) a bien été ajouté(e)';
	} else {
		$msg = "Une erreur s'est produite...";
	}
} else {
    $success = false;
	$msg = "Il manque des informations...";
}

reponse_json($success, $data, $msg);

/*

INSERT INTO `Student`( `firstName` , `lastName` , `emailAddress` , `birthDate` , `lastConnection` , `phoneNumber` , `university` , `isArchived` , `isEntrant` , `login` , `passWord`) values ( 'firstName' , 'lastName', 'emailAddress', null , null , 'phoneNumber' , 'university' , 0 , false , 'login' , '$5$rounds=5000$usesomesillystri$iUBue5J4jMxCbRFNOiDmfKGuRfbsoTNIY17DpmfMzu5');
*/