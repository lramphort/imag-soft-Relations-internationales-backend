<?php
include('../template.php');

if(!empty($_GET['idPerson'])
&& !empty($_GET['emailAddress'])
&& !empty($_GET['firstName'])
&& !empty($_GET['lastName'])
&& !empty($_GET['phoneNumber'])
&& !empty($_GET['affiliation'])
&& !empty($_GET['description'])
 ){
    $requete = $pdo->prepare("INSERT INTO `Contact` ( `idPerson` , `emailAddress` , `firstName` , `lastName` , `phoneNumber` , `affiliation` , `description` ) values ( :idPerson , :emailAddress , :firstName , :lastName , :phoneNumber , :affiliation , :description );");
	$requete->bindParam(':idPerson', $_GET['idPerson'] );
	$requete->bindParam(':emailAddress',  $_GET['emailAddress']);
	$requete->bindParam(':firstName',  $_GET['firstName']);
	$requete->bindParam(':lastName',  $_GET['lastName']);
	$requete->bindParam(':phoneNumber',  $_GET['phoneNumber']);
	$requete->bindParam(':affiliation',  $_GET['affiliation']);
	$requete->bindParam(':description',  $_GET['description']);
   

	if( $requete->execute() ){
		$success = true;
		$msg = 'Un reponse a bien été ajoutée';
	} else {
		$msg = "Une erreur s'est produite...";
	}

} else {
    $success = false;
	$msg = "Il manque des informations...";
}

reponse_json([$success, $data, $msg]);
