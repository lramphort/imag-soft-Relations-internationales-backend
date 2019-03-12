<?php
include('../template.php');

if(!empty($_GET['idPerson'])
&& !empty($_GET['description'])
&& !empty($_GET['name'])
 ){
    $requete = $pdo->prepare("INSERT INTO `DailyTopic` ( `idPerson` , `dateDailyTopic` , `description` , `name`, `hasBeenSeen` ) values ( :idPerson , NOW() , :description  , :name, 'false' );");
	$requete->bindParam(':idPerson', $_GET['idPerson'] );
	$requete->bindParam(':description',  $_GET['description']);
	$requete->bindParam(':name',  $_GET['name']);
   
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
