<?php
include('../template.php');

if(!empty($_GET['idCourse']) 
&& !empty($_GET['idPerson'])  
&& !empty($_GET['question']) 
 ){
    $requete = $pdo->prepare("INSERT INTO `Poll` ( `idCourse` , `idPerson` , `status` , `question` , `answer` , `dateAnswer` ) values ( :idCourse , :idPerson , 'Sent' , :question , null,null);");
	$requete->bindParam(':idCourse', $_GET['idCourse'] );
	$requete->bindParam(':idPerson',  $_GET['idPerson']);
	$requete->bindParam(':question',  $_GET['question'] );
   
	if( $requete->execute() ){

		$requete2 = $pdo->prepare("SELECT * FROM `Poll` WHERE `idCourse` = :idCourse AND `idPerson` = :idPerson AND `question` = :question");
		$requete2->bindParam(':idPerson', $_GET['idPerson']);
		$requete2->bindParam(':idCourse', $_GET['idCourse']);
		$requete2->bindParam(':question',  $_GET['question'] );

		$requete2->execute();
		$resultats = $requete2->fetchAll();

		$success = true;
		$data = $resultats;
		$msg = 'Un(e) étudiant(e) a bien été ajouté(e)';
	} else {
		$msg = "Une erreur s'est produite...";
	}

} else {
    $success = false;
	$msg = "Il manque des informations...";
}

reponse_json($success, $data, $msg);
