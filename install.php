<?php
/*
|-----------------------------------------------------------------------------------
| Auteur : Anthony VIOLET
| Date : 14/10/2014
| Commentaire : Page d'installation du script.
|-----------------------------------------------------------------------------------
*/

header('content-type: text/html; charset=utf-8');

if(empty($_GET['step'])){

	$step = null;

}else{

	$step = $_GET['step'];

}

$linkversion = "http://violet.anthony.free.fr/MyPartner/version.php";
@readfile($linkversion);

switch($step){
	case "manual":
		include 'view/install/manual.php';
	break;

	case "create":

		require 'config/database.php';

		$sql = "CREATE TABLE IF NOT EXISTS `partners` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(100) NOT NULL,
			  `password` varchar(155) NOT NULL,
			  `link` varchar(155) NOT NULL,
			  `description` text NOT NULL,
			  `logo` varchar(155) NOT NULL,
			  `ups` int(11) NOT NULL,
			  `downs` int(11) NOT NULL,
			  `ip` varchar(100) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";
	
		try
		{
			$db = new PDO('mysql:host='.$host.';dbname='.$database, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		}
		catch(PDOExeption $e)
		{
			die('Erreur : '.$e->getMessage());
		}

		$req = $db->exec($sql);

		echo '<p style="color:green; font-size:20pt;">Tables créer avec succès !</p><p>Vous pouvez supprimer le fichier <strong>install.php</strong></p>';

	break;

	case 1:
		if($_POST){

			echo '<pre>';
			print_r($_POST);
			echo '</pre>';

			$step2 = False;

			$host = trim($_POST['host']);
			$user = trim($_POST['user']);
			$password = trim($_POST['password']);
			$database = trim($_POST['database']);

			if(mysql_connect($host, $user, $password)){

				if(mysql_select_db($database)){

					$msg = '<span style="color:green">Connexion réussi. Vous pouvez maintenant cliquer sur "étape 2" pour poursuivre l\'installation.</span>';
				
				}else{

					$msg = '<span style="color:red">La connexion à réussi mais la base de donnés n\'est pas reconnu. Vérifiez que vous avez entré le bon nom de base de données. Si le problème persiste, contactez vote hébergeur. <br /></span>';

				}

			}else{

				
				$msg = '<span style="color:red">La connexion à la base de données à échouer. Vérifiez que vous avez correctement rempli le formulaire. Si le problème persiste, contactez votre hébergeur.<br />';

			}

		}
		include 'view/install/step1.php';
	break;

	default;
		include 'view/install/index.php';
	break;

}