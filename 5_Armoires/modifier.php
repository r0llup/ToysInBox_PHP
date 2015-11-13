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
	<title>Modification d'armoires</title>
</head>
<body>
	<h1>Modification d'armoires</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="modifier.php">
		<fieldset>
			<legend>Veuillez encoder les informations de l'armoire à modifier :</legend>
			<label for="idArmoire">Identifiant :</label>

			<?php
				if(isset($_GET['idArmoire']))
				{
					echo "<input type='text' name='idArmoire' id='idArmoire' value='" .
						(int) $_GET['idArmoire'] . "' tabindex='10' /><br />";
					echo "<input type='hidden' name='idArmoire0' value='" .
						(int) $_GET['idArmoire'] . "' />";
				}

				else
				{
					echo "<input type='text' name='idArmoire' id='idArmoire'
						tabindex='10' /><br />";
				}
			?>

			<label for="description">Description :</label>

			<?php
				if(isset($_GET['description']))
				{
					echo "<input type='text' name='description' id='description' value='" .
						$_GET['description'] . "' tabindex='20' /><br />";
				}

				else
				{
					echo "<input type='text' name='description' id='description'
						tabindex='20' /><br />";
				}
			?>

			<label for="piece">Pièce :</label>

			<?php
				if(isset($_GET['piece']))
				{
					echo "<input type='text' name='piece' id='piece' value='" . $_GET['piece'] .
						"' tabindex='30' />";
				}

				else
				{
					echo "<input type='text' name='piece' id='piece' tabindex='30' />";
				}
			?>

		</fieldset>
		<p>
			<input type="submit" tabindex="40" />
			<input type="reset" tabindex="50" />
		</p>
	</form>

	<?php
		if(isset($_POST['idArmoire']) and isset($_POST['description']) and isset($_POST['piece'])
			and isset($_POST['idArmoire0']))
		{
			$query = $bdd->prepare("UPDATE TIB_ARMOIRES SET idArmoire=:idArmoire,
				description=:description, piece=:piece WHERE idArmoire=:idArmoire0");

			$retour = $query->execute(array('idArmoire' => (int) $_POST['idArmoire'],
				'description' => $_POST['description'], 'piece' => $_POST['piece'],
				'idArmoire0' => (int) $_POST['idArmoire0']));

			if($retour)
			{
				echo "<p>Modification effectuée.</p>";
			}

			else
			{
				echo "<p>Modification non effectuée.</p";
			}
		}
	?>

</body>
</html>