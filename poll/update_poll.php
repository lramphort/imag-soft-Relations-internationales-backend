<?php
include('../template.php');

if( !empty($_POST['answer'])
&& !empty($_POST['idPoll']) 
){
    $requete = $pdo->prepare("UPDATE `Poll` SET `answer` = :answer AND `dateAnswer` = NOW() AND `status` = `answered` WHERE `idPoll` = :idPoll;");
	$requete->bindParam(':answer',  $_POST['answer'] );
	$requete->bindParam(':idPoll',  $_POST['idPoll'] );
	
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