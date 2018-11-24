<?php
include('../template.php');
if( !empty($_GET['idStudent']) && !empty($_GET['university']) && !empty($_GET['isArchived']) && !empty($_GET['isEntrant']) ){
	//Si toutes les données sont saisie par le client
    //$requete = $pdo->prepare("INSERT INTO `Student`(`idStudent` , `university` , `isarchived` , `isEntrant`) values (1,'UGA',false,false);");

    $requete = $pdo->prepare("INSERT INTO `Student`(`idStudent` , `university` , `isarchived` , `isEntrant`) values (:idStudent , :university , :isarchived , :isEntrant);");
    $requete->bindParam(':idStudent', $_GET['idStudent']);
	$requete->bindParam(':university', $_GET['university']);
	$requete->bindParam(':isArchived', $_GET['isArchived']);
	$requete->bindParam(':isEntrant', $_GET['isEntrant']);
	
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
reponse_json($success, $data, $msg);
