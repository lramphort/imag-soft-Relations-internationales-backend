<?php
include('../template.php');

if(!empty($_GET['idPerson'])
&& !empty($_GET['description'])
&& !empty($_GET['name'])
&& !empty($_GET['ects'])
&& !empty($_GET['lastCommentary'])
&& !empty($_GET['teacherFullName'])
&& !empty($_GET['teacherEmail'])
 ){
    $requete = $pdo->prepare("INSERT INTO `Course` ( `idPerson` , `description` , `name` , `ects` , `lastCommentary` , `teacherFullName` , `teacherEmail`, `state`, `lastModification` ) values ( :idPerson , :description , :name , :ects , :lastCommentary , :teacherFullName , :teacherEmail, 'pending', NOW() );");
	$requete->bindParam(':idPerson', $_GET['idPerson'] );
	$requete->bindParam(':description',  $_GET['description']);
	$requete->bindParam(':name',  $_GET['name']);
	$requete->bindParam(':ects',  $_GET['ects']);
	$requete->bindParam(':lastCommentary',  $_GET['lastCommentary']);
	$requete->bindParam(':teacherFullName',  $_GET['teacherFullName']);
	$requete->bindParam(':teacherEmail',  $_GET['teacherEmail']);
   
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
