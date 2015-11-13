<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<!-- Auteur : LECLER Quentin									       -->
<!-- Groupe : 2102													   -->
<!-- Application : toysInBox										   -->
<!-- Description : toysInBox										   -->
<!-- Date de dernière mise à jour : 14/05/10						   -->
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<title>Ajout d'armoires</title>
</head>
<body>
	<h1>Ajout d'armoires</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="ajouter.php">
		<fieldset>
			<legend>Veuillez encoder les informations de l'armoire :</legend>
			<label for="idArmoire">Identifiant :</label>
			<input type="text" name="idArmoire" id="idArmoire" tabindex="10" /><br />
			<label for="description">Description :</label>
			<input type="text" name="description" id="description" tabindex="20" /><br />
			<label for="piece">Pièce :</label>
			<input type="text" name="piece" id="piece" tabindex="30" />
		</fieldset>
		<p>
			<input type="submit" tabindex="40" />
			<input type="reset" tabindex="50" />
		</p>
	</form>

	<?php
		if(isset($_POST['idArmoire']) and isset($_POST['description']) and isset($_POST['piece']))
		{
			$query = $bdd->prepare("INSERT INTO TIB_ARMOIRES VALUES
				(:idArmoire, :description, :piece)");

			$retour = $query->execute(array('idArmoire' => (int) $_POST['idArmoire'],
				'description' => $_POST['description'], 'piece' => $_POST['piece']));

			if($retour)
			{
				echo "<p>Ajout effectué.</p>";
			}

			else
			{
				echo "<p>Ajout non effectué.</p";
			}

			$query->closeCursor();
		}
	?>

</body>
</html>