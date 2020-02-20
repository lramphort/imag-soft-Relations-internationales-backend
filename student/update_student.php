<?php
include('../template.php');

if( !empty($_GET['firstName'])
&& !empty($_GET['lastName'])
&& !empty($_GET['birthDate'])
&& !empty($_GET['emailAddress'])
&& !empty($_GET['phoneNumber'])
&& !empty($_GET['university'])
&& !empty($_GET['isEntrant'])
&& !empty($_GET['idPerson']) ) {
  $requete = $pdo->prepare("UPDATE `Student` SET `firstName` = :firstName , `lastName` = :lastName, `emailAddress` = :emailAddress, `birthDate` = :birthDate , `phoneNumber` = :phoneNumber , `university` = :university , `isEntrant` = :isEntrant WHERE `idPerson` = :idPerson;");
	$requete->bindParam(':firstName',  $_GET['firstName'] );
	$requete->bindParam(':lastName', $_GET['lastName'] );
	$requete->bindParam(':emailAddress', $_GET['emailAddress'] );
	$requete->bindParam(':birthDate', $_GET['birthDate'] );
	$requete->bindParam(':phoneNumber', $_GET['phoneNumber'] );
	$requete->bindParam(':university', $_GET['university'] );
	$requete->bindParam(':isEntrant', $_GET['isEntrant']);
  $requete->bindParam(':idPerson',  $_GET['idPerson'] );

  if ($requete->execute()) {
		$success = true;
		$msg = 'Un(e) étudiant(e) a bien été modifié(e)';
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
