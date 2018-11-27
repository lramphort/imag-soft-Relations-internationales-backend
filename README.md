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
  
  
exemple URI:

get all student :
http://[server_ip]/student/get_student.php

get student id = 1 :
http://[server_ip]/student/get_student.php?idStudent=1
