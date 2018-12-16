<?php
include('../template.php');

if(!empty($_GET['idPerson'])
&& !empty($_GET['idCourse'])
&& !empty($_GET['typeMark'])
&& !empty($_GET['valueMark'])
 ){
    $requete = $pdo->prepare("INSERT INTO `Course` ( `idPerson` , `idCourse` , `typeMark` , `valueMark` ) values ( :idPerson , :idCourse , :typeMark , :valueMark );");
	$requete->bindParam(':idPerson', $_GET['idPerson'] );
	$requete->bindParam(':idCourse',  $_GET['idCourse']);
	$requete->bindParam(':typeMark',  $_GET['typeMark']);
	$requete->bindParam(':valueMark',  $_GET['valueMark']);

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
