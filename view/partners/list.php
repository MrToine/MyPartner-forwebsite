<html lang="fr">
	<head>
		<title>Liste des Partenaires</title>
		<meta charset="utf8" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<p><center><a href="?p=new">Devenir partenaire</a><!-- - <a href="?p=manage">Espace partenaire</a>--></center></p>
		<table>
			<thead>
				<th>Logo</th>
				<th>Partenaire</th>
				<th>Entrées</th>
				<th>Sorties</th>
			</thead>
			<?php foreach ($partners as $partner): ?>
				<?php $partner = new Partner($partner); ?>
				<tr>
					<td><center><a href="?p=out&id=<?php echo $partner['id']; ?>"><img src="<?php echo $partner['logo']; ?>" alt="<?php echo $partner['name']; ?>" title="<?php echo $partner['name']; ?>" /></center></td>
					<td><a href="?p=out&id=<?php echo $partner['id']; ?>"><?php echo $partner['name']; ?></a><br /><small><?php echo $partner['description']; ?></small></td>
					<td><center><?php echo $partner['ups']; ?></center></td>
					<td><center><?php echo $partner['downs']; ?></center></td>
				</tr>
			<?php endforeach ?>
		</table>
	</body>
</html>