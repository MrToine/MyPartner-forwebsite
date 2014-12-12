<h2>Connexion à votre espace partenaire</h2>
<?php if (!$error): ?>
	<div class="error"><?php echo $error; ?></div>
<?php endif ?>
<form action="?p=manage" method="post">
	<input type="text" name="name" placeholder="Nom de votre site" /><br />
	<input type="password" name="password" placeholder="Mot de passe fournis." /><br />
	<input type="submit" value="Connexion" />
</form>