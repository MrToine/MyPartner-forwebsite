<html lang="fr">
	<head>
		<title>Installation - Etape 1</title>
		<meta charset="utf8" />
	</head>
	<body>
		<h1>Etape 1</h1>
		<p>Avant de créer les fichiers de configuration, nous allons tester la connexion à votre base de données.</p>
		<form action="?step=1" method="post">
			<input type="text" name="host" placeholder="localhost" /> Le nom du serveur (locahost)<br />
			<input type="text" name="database" placeholder="database" /> Le nom de votre base de données<br />
			<input type="text" name="user" placeholder="root" /> Le nom d'utilisateur d'accès à la base de données (root)<br />
			<input type="text" name="password" placeholder="password" /> Mot de passe d'accès à la base de données (laissez vide si vous n'en utilisez pas)<br />
			<input type="submit" value="Tester la connexion" />
		</form>
		<?php if ($msg): ?>
			<u><?php echo $msg; ?></u><br />
		<?php endif ?>
		<?php if ($step2 == True): ?>
			<center><button><a href="?step2">étape 2</a></button></center>
		<?php endif ?>
		<?php require '/view/supp/licence.html'; ?>
	</body>
</html>
		