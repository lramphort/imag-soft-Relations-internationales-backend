<?php
include('../template.php');

if( !empty($_GET['isLearningAgreementValid'])
&& !empty($_GET['idPerson'])
){
    $requete = $pdo->prepare("UPDATE `Student` SET `isLearningAgreementValid` = :isLearningAgreementValid, `dateLearningAgreementValid` = NOW() WHERE `idPerson` = :idPerson;");
	$requete->bindParam(':isLearningAgreementValid',  $_GET['isLearningAgreementValid'] );
	$requete->bindParam(':idPerson',  $_GET['idPerson'] );

	if ($_GET['isLearningAgreementValid'] === 'true') {
    	$requeteCoursesState = $pdo->prepare("UPDATE `Course` SET `state` = 'accepted', `lastModification` = NOW() WHERE `state` = 'pending' AND `idPerson` = :idPerson;");
		$requeteCoursesState->bindParam(':idPerson',  $_GET['idPerson'] );
		$requeteCoursesState->execute();
	} else {
    	$requeteCoursesState = $pdo->prepare("UPDATE `Course` SET `state` = 'pending', `lastModification` = NOW() WHERE `state` = 'accepted' AND `idPerson` = :idPerson;");
		$requeteCoursesState->bindParam(':idPerson',  $_GET['idPerson'] );
		$requeteCoursesState->execute();
	}
	
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