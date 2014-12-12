<p>Vous allez installer le script manuellement. Tout d'abord, munissez vous des informations de connexion à votre base de données. Si vous n'y avez pas accès, contactez votre administrateur.</p>
<p>Ouvrez le répertoire du script et rendez-vous dans le dossier <strong>config</strong> et créer un fichier nommée <strong>database.php</strong>.</p>
<p>Entrez y le code suivant, et indiquez les informations de connexion entre le guillemets en vous aidant des commentaires. N'oubliez pas de rajouter la balise php <strong>< php</strong></p>
<?php 
$code = '
$host = ""; // Le nom du serveur (locahost)
$database = ""; // Le nom de votre base de données
$user = ""; // Le nom d\'utilisateur d\'accès à la base de données (root)
$password = ""; // Mot de passe d\'accès à la base de données (laissez vide si vous n\'en utilisez pas)
'; 
echo '<pre>';
print($code);
echo '</pre>';
?>
<p>Le script est maintenant configuré. <!--Pour vous connecter, utilsez les identifiants:</p>
<ul>
	<li>mot de passe : admin</li>
</ul>-->
<p>La connexion à la base de données est maintenant établie. Il faut maintenant créer les tables dans la base de données. Vous pouvez le faire manuellement en copiant/collant le contenu du fichier 
	<strong>config/tables.sql</strong> dans votre base de données. Si vous voulez, vous pouvez aussi le faire automatiqement en suivant le lien ci-dessous :</p>
<center><h2><a href="?step=create">Créer les tables dans la base de données</a></h2></center>
<p>Vous pouvez supprimer le fichier <strong>install.php</strong></p>