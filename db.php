
<?php
$hote = 'localhost';
$port = "8080";
$nom_bdd = 'localDataBase';
$utilisateur = 'rootuser';
$mot_de_passe ='rootpassword';
try {
	//On test la connexion à la base de donnée
    $pdo = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nom_bdd, $utilisateur, $mot_de_passe);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch(Exception $e) {
	//Si la connexion n'est pas établie, on stop le chargement de la page.
    reponse_json($success, $data, 'Echec de la connexion à la base de données');
    exit();
}

