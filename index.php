<?php
/*
|-----------------------------------------------------------------------------------
| Auteur : Anthony VIOLET
| Date : 14/10/2014
| Commentaire : Page index du script, elle affiche la liste des patenaires et permet
|				d'accèder à un espace perso si on est partenaire ou admin.
|-----------------------------------------------------------------------------------
*/

session_start();

header('content-type: text/html; charset=utf-8');

require_once 'config/config.php';

require_once 'libs/scan.php';

require_once 'config/database.php';

try{

	$db = new PDO('mysql:host='.$host.';dbname='.$database, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

}catch(PDOExeption $e){

	die('Erreur : '.$e->getMessage());

}

if(empty($_GET['p'])){

	$p = "partners";

}else{

	$p = $_GET['p'];

}

switch($p){

	case "partners":

		$manager = new Manager($db);
		$partners = $manager->get_list();

		include 'view/partners/list.php';

	break;

	case "new":

		$errors = null;
		$i = null;
		
		if($_POST){

			if(empty($_POST['name'])){

				$i++;
				$errors[$i] = "Vous devez indiquer le nom de votre site.";

			}

			if(empty($_POST['link'])){

				$i++;
				$errors[$i] = "Vous devez indiquer le lien vers votre site";

			}

			if(empty($_POST['logo'])){

				$i++;
				$errors[$i] = "Vous devez indiquer le lien vers le logo de votre site";

			}

			if(!empty($_POST['name']) || !empty($_POST['link']) || !empty($_POST['logo'])){

				$token = null;

				$possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
	 
			 	$longueur = 8;
			    $longueurMax = strlen($possible);
			 
			    if ($longueur > $longueurMax) {
			        $longueur = $longueurMax;
			    }
			 
			    $i = 0;
			 
			    while ($i < $longueur) {
			        $caractere = substr($possible, mt_rand(0, $longueurMax-1), 1);
			 
			        if (!strstr($token, $caractere)) {
			            $token .= $caractere;
			            $i++;
			        }
			    }

			    $password = md5($token);

			    $manager = new Manager($db);
			    $lastId = $manager->create($_POST['name'], $password, $_POST['link'], $_POST['description'], $_POST['logo'], $_SERVER['REMOTE_ADDR']);

			    echo '<span style="color:green; font-weight:bold">Vous avez bien été ajouter à la liste de nos partenaires. Un mot de passe à été créer pour que vous puissiez accèder à l\'administration de votre espace partenaire : </span><span style:color:black;"><strong>'.$token.'</strong>.</span>';
			    echo '<hr />Pour que votre site soit référencé dans le classement, vous devez ajouter ce code sur votre site. Il permet au classement de bien prendre en compte votre site. <span style="color:red">Attention : </span>Si vous modifier ce code ou que vous ne l\'utilisez pas, le site ne pourra pas prendre en compte le nombre de vsiteurs que vous lui envoyé.';
				
			    $link = '<a href="'.BASE_URL.'/'.DIRNAME.'/?p=in&id='.$lastId.'"><img src="'.MYLOGO.'" />'.SITENAME.'</a>';

				include 'view/partners/mylogo.php';

			}

		}

		include 'view/partners/new.php';
	break;

	case "manage":

		if($_SESSION['partner_name']){

			include 'view/partners/manage.php';

		}else{

			$error = null;

			if($_POST){

				if(empty($_POST['name']) || empty($_POST['password'])){

					$error = "Connexion refusé. Veuillez recommencer.";

				}else{

					$manager = new Manager($db);

					if($manager->verificate($_POST['name'], md5($_POST['password'])) == 0){

						echo 'Lien pas trouvé :/';

					}else{

						$_SESSION['partner_name'] = $_POST['name'];
						header('Location: '.BASE_URL.DIRNAME.'?p=manage');

					}

				}

			}

			include 'view/partners/connexion.php';

		}


	break;

	case "out":

		$id = (int) $_GET['id'];

		$manager = new Manager($db);

		$user = new Partner($manager->verificate_ip($id));

		if($user->ip() == $_SERVER['REMOTE_ADDR']){

			$partner = new Partner($manager->get($id));

			echo 'L\'adresse IP enegistré pour ce site est la même que la votre ('.$_SERVER['REMOTE_ADDR'].'). Vous allez être redirigier, mais le compteur de sortie de ce site n\'augmentera pas pour cette fois.';
			header("refresh:5;url=".$partner->link());
			exit();

		}else{

			$manager->out($id);

			if($manager != true){

				die('Error !');

			}else{

				$partner = new Partner($manager->get($id));
				header("Locaton : ".$partner->link());
				exit();

			}

		}
			

	break;

	case "in":

		$id = (int) $_GET['id'];

		$manager = new Manager($db);

		$user = new Partner($manager->verificate_ip($id));

		if($user->ip() == $_SERVER['REMOTE_ADDR']){

			echo 'L\'adresse IP enegistré pour ce site est la même que la votre ('.$_SERVER['REMOTE_ADDR'].'). Vous allez être redirigier, mais le compteur d\'entrée de ce site n\'augmentera pas pour cette fois.';
			header("refresh:5;url=".BASE_URL);
			exit();

		}else{

			$manager->in($id);

			if($manager != true){

				die('Error !');

			}else{

				$partner = new Partner($manager->get($id));
				header("refresh:0;url=".BASE_URL);
				exit();

			}

		}

	break;

	default;

		echo 'afficher les partenaires | Se connecter';

	break;

}
$linkversion = "http://violet.anthony.free.fr/MyPartner/version_mini.php";
echo '<center>';
@readfile($linkversion);
echo '</center>';