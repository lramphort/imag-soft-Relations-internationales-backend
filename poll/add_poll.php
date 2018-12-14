<?php
include('../template.php');

if(!empty($_GET['idCourse']) 
&& !empty($_GET['idPerson'])  
&& !empty($_GET['question']) 
 ){

	//Si toutes les données sont saisie par le client

    $requete = $pdo->prepare("INSERT INTO `Poll` ( `idCourse` , `idPerson` , `status` , `question` , `answer` , `dateAnswer` , `etat` ) values ( :idCourse , :idPerson , 'Sent' , :question , null,null,null);");
	$requete->bindParam(':idCourse', $_GET['idCourse'] );
	$requete->bindParam(':idPerson',  $_GET['idPerson']);
	$requete->bindParam(':question',  $_GET['question'] );
   

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

reponse_json([$success, $data, $msg]);
