<?php
/*
|-----------------------------------------------------------------------------------
| Auteur : Anthony VIOLET
| Date : 14/10/2014
| Commentaire : Page de configuration générale du script.
|-----------------------------------------------------------------------------------
*/


/********************************************************************

======== VOUS POUVEZ CONFIGURER LE SCRIPT ICI =============

*********************************************************************/

$sitename = "test"; // Nom de votre site (il utiliser lors du partage de votre logo/lien)
$site_url = "http://test.com"; // Lien de votre site
$dirname = "MyPartner_Dev"; // Nom du dossier dans le quel est le script "MyPartner"
$logo_link = "empty"; // Adresse pointant vers votre logo. Elle permet de pouvoir partager votre logo avec vos partenaires.

/********************************************************************

======== IMPORTANT NE PAS MODIFIER LE RESTE DE CETTE PAGE ===========

*********************************************************************/


require 'libs/lang.php';

define('BASE_URL', $site_url);
define('DIRNAME', $dirname);
define('MYLOGO', $logo_link);
define('SITENAME', $sitename);