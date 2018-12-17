<?php
include('../template.php');

if( !empty($_GET['isLearningAgreementValid'])
&& !empty($_GET['idPerson']) 
){
	echo $_GET['isLearningAgreementValid'];
	echo $_GET['idPerson'];

    $requete = $pdo->prepare("UPDATE `Student` SET `isLearningAgreementValid` = :isLearningAgreementValid, `dateLearningAgreementValid` = NOW() WHERE `idPerson` = :idPerson;");
	$requete->bindParam(':isLearningAgreementValid',  $_GET['isLearningAgreementValid'] );
	$requete->bindParam(':idPerson',  $_GET['idPerson'] );
	
	if( $requete->execute() ){
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