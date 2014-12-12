<p>Vous allez faire une demande de partenariat avec <strong><?php echo BASE_URL; ?></strong>. Pour terminer la demande, merci
de remplir le formulaire ci-dessous :</p>
<?php if ($errors): ?>
	<div class="error">
		<p><strong><?php echo $i ?></strong> erreur(s) ont été trouvée(s) :
		<ol>
			<?php foreach ($errors as $key => $value): ?>
				<li><?php echo $value; ?></li>
			<?php endforeach ?>
		</ol>
			
	</div>
	
<?php endif ?>
<form action="?p=new" method="post">
	<input type="text" name="name" placeholder="Nom du site" /><br />
	<input type="text" name="link" placeholder="Lien vers votre site" /><br />
	<input type="text" name="logo" placeholder="Lien vers votre logo" /><br />
	<input type="text" name="description" placeholder="Description de votre site" /><br />
	<input type="submit" value="Devenir Partenaire !">
</form>