# imag-soft-Relations-internationales-backend
imag-soft-Relations-internationales back end with PHP


Configuration lamp pour tester l'api:

suivre les instructions  d'installation de lamp: 
  https://doc.ubuntu-fr.org/lamp
  
  pour modifier le dossier de lecture du serveur :
  remplacer dans les fichiers : 
  
  /etc/apache2/sites-available/000-default.conf 
  ligne12 : DocumentRoot /var/www/html -> par le path de notre dossier
  
  /etc/apache2/apache2.conf
  ligne170 : <Directory /var/www/> -> par le path de notre dossier
  
Ne pas oublier de modifier le fichier db.php avant d'utiliser l'api !!

Pour tester ses informations modifier le fichier index.php et l'executer dans un navigateur web : si la connection est réussite le message suivant devrait apparaitre : 
      {"success":true,"message":"Connection réussie"}
     
Problème possible : 
  aucun utilisatuer de connu sur mysql :
    Pour créer un nouvel utilisateur(login = non-root, et mdp = 123) :
    
    mysql
    CREATE USER 'non-root'@'localhost' IDENTIFIED BY '123';
    GRANT ALL PRIVILEGES ON * . * TO 'non-root'@'localhost';
    FLUSH PRIVILEGES;
  
exemple URI:

get all student :
http://[server_ip]/student/get_student.php

get student id = 1 :
http://[server_ip]/student/get_student.php?idStudent=1
