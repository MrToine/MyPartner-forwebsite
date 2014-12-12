<?php
/*
|-----------------------------------------------------------------------------------
| Auteur : Anthony VIOLET
| Date : 14/10/2014
| Commentaire : Page qui scan le script et qui retourne les erreurs rencontré. Il ne
| 				se pas rien si le scan n'a rien trouver d'anormal.
|-----------------------------------------------------------------------------------
*/

if(!file_exists('config/database.php')){

	die($lang['databaseNotConf']);

}

if(BASE_URL == ""){

	echo '<span style="color:red">Vous avez oublier d\'indiquer l\'adresse url de votre site dans le fichier <strong>config/config.php</strong></span><br />';
}

if(DIRNAME == ""){

	echo '<span style="color:red">Vous avez oublier d\'indiquer le nom du dossier de MyPartner <strong>config/config.php</strong></span><br />';
}

if(MYLOGO == ""){

	echo '<span style="color:red">Vous avez oublier d\'indiquer l\'adresse url de votre logo dans le fichier <strong>config/config.php</strong></span><br />';
}

if(SITENAME == ""){

	echo '<span style="color:red">Vous avez oublier d\'indiquer le nom de votre site dans le fichier <strong>config/config.php</strong></span><br />';
}

$num_version = "1.1";

require 'partner.class.php';
require 'manager.class.php';