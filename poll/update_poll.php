<?php
include('../template.php');

if( !empty($_GET['answer'])
&& !empty($_GET['idPoll']) 
){
    $requete = $pdo->prepare("UPDATE `Poll` SET `answer` = :answer, `dateAnswer` = NOW(), `status` = 'answered' WHERE `idPoll` = :idPoll;");
	$requete->bindParam(':answer',  $_GET['answer'] );
	$requete->bindParam(':idPoll',  $_GET['idPoll'] );
	
	if( $requete->execute() ){
		$success = true;
		$msg = 'Un sondage a bien été modifié';
	} else {
		$success = false;
		$msg = "Une erreur s'est produite...";
	}
} else {
    $success = false;
	$msg = "Il manque des informations...";
}

reponse_json($success, $msg, $data);