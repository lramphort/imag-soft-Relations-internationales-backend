<?php
include('../template.php');

if(!empty($_GET['idPoll']) 
&& !empty($_GET['valuePossibleAnswer'])
 ){
    $requete = $pdo->prepare("INSERT INTO `PossibleAnswer` ( `idPoll` , `valuePossibleAnswer` ) values ( :idPoll , :valuePossibleAnswer );");
	$requete->bindParam(':idPoll', $_GET['idPoll'] );
	$requete->bindParam(':valuePossibleAnswer',  $_GET['valuePossibleAnswer']);
   

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
