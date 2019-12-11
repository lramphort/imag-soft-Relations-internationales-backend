<?php
include('../template.php');
include('../genPW.php');
include_once("Mail.php");
include_once("Mail/mime.php");

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_/.,;';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if( !empty($_GET['firstName'])
&& !empty($_GET['lastName'])
&& !empty($_GET['birthDate'])
&& !empty($_GET['emailAddress'])
&& !empty($_GET['phoneNumber'])
&& !empty($_GET['university'])
&& !empty($_GET['isEntrant'])
){
	$password = generateRandomString();
	$login = $_GET['firstName'] . $_GET['lastName'];

	/*
	Envoi du mail pour l'étudiant
	*/

    $requete = $pdo->prepare("INSERT INTO `Student` ( `firstName` , `lastName` , `emailAddress` , `birthDate` , `lastConnection` , `phoneNumber` , `university` , `isArchived` , `isEntrant` , `login` , `passWord`, `isLearningAgreementValid`, `dateLearningAgreementValid`) values ( :firstName, :lastName, :emailAddress, :birthDate , null , :phoneNumber , :university , 'false' , :isEntrant , :login , :passWord, 'false', NOW());");
	$requete->bindParam(':firstName',  $_GET['firstName'] );
	$requete->bindParam(':lastName', $_GET['lastName'] );
	$requete->bindParam(':emailAddress', $_GET['emailAddress'] );
	$requete->bindParam(':birthDate', $_GET['birthDate'] );
	$requete->bindParam(':phoneNumber', $_GET['phoneNumber'] );
	$requete->bindParam(':university', $_GET['university'] );
	$requete->bindParam(':isEntrant', $_GET['isEntrant']);
	$requete->bindParam(':login', $login );
	$requete->bindParam(':passWord', $password );

	if( $requete->execute() ){
		$requete2 = $pdo->prepare("SELECT * FROM `Student` WHERE `firstName` LIKE :firstName AND `lastName` LIKE :lastName AND `emailAddress` LIKE :emailAddress");
		$requete2->bindParam(':firstName', $_GET['firstName']);
		$requete2->bindParam(':lastName', $_GET['lastName'] );
		$requete2->bindParam(':emailAddress', $_GET['emailAddress'] );
		$requete2->execute();
		$resultats = $requete2->fetchAll();

		$success = true;
		$data['Student'] = $resultats;
		$msg = 'Un(e) étudiant(e) a bien été ajouté(e)';


    //D▒finition du mail
    $from = "no-reply@univ-grenoble-alpes.fr"; //Adresse de l'envoyeur (utiliser le no-reply)
    $to_name = $_GET['firstName'] .' '. $_GET['lastName']; //Nom du destinataire
    $to_address = $_GET['emailAddress']; //Adresse du destinataire
    $charset = "UTF-8"; //Utiliser le m▒me encodage que la BDD, pour conserver les accents
    $subject = "Sujet du mail"; //Sujet du mail
    $message = "
		Welcome ".$_GET['firstName'] ." ". $_GET['lastName'].", \n
		you can connect to this following address : http://im2ag-relations-internationales.univ-grenoble-alpes.fr/ with the credentials :\n
		username: ".$_GET['firstName'] . $_GET['lastName']." \n
		password: ".$password; //Corps du mail \n pour saut de ligne, mail en format texte, il faut s▒rement modifier les fonctions plus bas pour accepter du HTML (setTxtBody ?)

    //D▒finition des param▒tres sortants (pas besoin d'authentification sur le SMTP de l'UGA si on est depuis un hote autoris▒)
    $host = "mailhost.u-ga.fr";
    $username = "";
    $password = "";

    //Cr▒ation du mail
    $mime = new Mail_mime();
    $mime->setTxtBody($message);
    $to = "$to_name <$to_address>";
    $body = $mime->get(array('text_charset' => $charset));
    $headers = array (
            'From' => $from,
            'To' => $to,
            'Subject' => $subject
    );
    $headers = $mime->headers($headers);

    //Cr▒ation du l'objet d'envoi
    $smtp = @Mail::factory(
            'smtp',
            array (
                    'host' => $host,
                    'auth' => false,
                    'username' => $username,
                    'password' => $password
            )
    );

    //Envoi du mail
    $mail = @$smtp->send($to, $headers, $body);

    //Rapport d'erreur
    if (@PEAR::isError($mail))
            $error = $mail->getMessage();
    else
            $error = true;

	} else {
		$msg = "Une erreur s'est produite...";
	}
} else {
    $success = false;
	$msg = "Il manque des informations...";
}

reponse_json($success, $data, $msg);


/*

INSERT INTO `Student`( `firstName` , `lastName` , `emailAddress` , `birthDate` , `lastConnection` , `phoneNumber` , `university` , `isArchived` , `isEntrant` , `login` , `passWord`) values ( 'firstName' , 'lastName', 'emailAddress', null , null , 'phoneNumber' , 'university' , 0 , false , 'login' , '$5$rounds=5000$usesomesillystri$iUBue5J4jMxCbRFNOiDmfKGuRfbsoTNIY17DpmfMzu5');
*/
