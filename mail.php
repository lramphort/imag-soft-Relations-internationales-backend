<?php
    include('genPW.php');

    //if( !empty($_POST['mailto'])){
        ini_set( 'display_errors', 1 );

        error_reporting( E_ALL );

        $from = "thomas.ruggiero1403@gmail.com";

        //$to = $_POST['mailto'];
        $to = "thomas.ruggiero1403@gmail.com";

        $subject = "Votre mot de passe a été changé";

        $passWord = chaine_aleatoire(10);

        $message = "voici votre nouveau mot de passe : " . $passWord;

        $headers = "From:" . $from;

        mail($to,$subject,$message, $headers);

        echo "L'email a été envoyé.";
    /*}
    else {
        echo "L'email n'a pas été envoyé.";
    }*/
?>