<?php
include('../template.php');

if( !empty($_GET['isArchived'])
&& !empty($_GET['idPerson']) 
){
	echo $_GET['isArchived'];
	echo $_GET['idPerson'];

    $requete = $pdo->prepare("UPDATE `Student` SET `isArchived` = :isArchived WHERE `idPerson` = :idPerson;");
	$requete->bindParam(':isArchived',  $_GET['isArchived'] );
	$requete->bindParam(':idPerson',  $_GET['idPerson'] );
	
	if( $requete->execute() ){
		$success = true;
		$msg = 'Un(e) étudiant(e) a bien été modifié(e)';
	} else {
		$success = false;
		$msg = "Une erreur s'est produite...";
	}
} else {
    $success = false;
	$msg = "Il manque des informations...";
}

reponse_json($success, $msg, $data);