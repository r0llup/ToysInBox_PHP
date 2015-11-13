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
	<title>Modification d'éditeurs</title>
</head>
<body>
	<h1>Modification d'éditeurs</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="modifier.php">
		<fieldset>
			<legend>Veuillez encoder les informations de l'éditeur à modifier :</legend>
			<label for="idEditeur">Identifiant :</label>

			<?php
				if(isset($_GET['idEditeur']))
				{
					echo "<input type='text' name='idEditeur' id='idEditeur' value='" .
						(int) $_GET['idEditeur'] . "' tabindex='10' /><br />";
					echo "<input type='hidden' name='idEditeur0' value='" .
						(int) $_GET['idEditeur'] . "' />";
				}

				else
				{
					echo "<input type='text' name='idEditeur' id='idEditeur'
						tabindex='10' /><br />";
				}
			?>

			<label for="nom">Nom :</label>

			<?php
				if(isset($_GET['nom']))
				{
					echo "<input type='text' name='nom' id='nom' value='" .
						$_GET['nom'] . "' tabindex='20' /><br />";
				}

				else
				{
					echo "<input type='text' name='nom' id='nom'
						tabindex='20' /><br />";
				}
			?>

			<label for="adresse">Adresse :</label>

			<?php
				if(isset($_GET['adresse']))
				{
					echo "<input type='text' name='adresse' id='adresse' value='" .
						$_GET['adresse'] . "' tabindex='30' /><br />";
				}

				else
				{
					echo "<input type='text' name='adresse' id='adresse' tabindex='30' /><br />";
				}
			?>

			<label for="codePostal">Code postal :</label>

			<?php
				if(isset($_GET['codePostal']))
				{
					echo "<input type='text' name='codePostal' id='codePostal' value='" .
						(int) $_GET['codePostal'] . "' tabindex='40' /><br />";
				}

				else
				{
					echo "<input type='text' name='codePostal' id='codePostal'
						tabindex='40' /><br />";
				}
			?>

			<label for="ville">Ville :</label>

			<?php
				if(isset($_GET['ville']))
				{
					echo "<input type='text' name='ville' id='ville' value='" . $_GET['ville'] .
						"' tabindex='50' /><br />";
				}

				else
				{
					echo "<input type='text' name='ville' id='ville' tabindex='50' /><br />";
				}
			?>

			<label for="pays">Pays :</label>

			<?php
				if(isset($_GET['pays']))
				{
					echo "<input type='text' name='pays' id='pays' value='" . $_GET['pays'] .
						"' tabindex='60' /><br />";
				}

				else
				{
					echo "<input type='text' name='pays' id='pays' tabindex='60' /><br />";
				}
			?>

			<label for="adresseMail">Adresse mail :</label>

			<?php
				if(isset($_GET['adresseMail']))
				{
					echo "<input type='text' name='adresseMail' id='adresseMail' value='" .
						$_GET['adresseMail'] . "' tabindex='70' /><br />";
				}

				else
				{
					echo "<input type='text' name='adresseMail' id='adresseMail'
						tabindex='70' /><br />";
				}
			?>

			<label for="adresseInternet">Adresse internet :</label>

			<?php
				if(isset($_GET['adresseInternet']))
				{
					echo "<input type='text' name='adresseInternet' id='adresseInternet' value='" .
						$_GET['adresseInternet'] . "' tabindex='80' />";
				}

				else
				{
					echo "<input type='text' name='adresseInternet' id='adresseInternet'
						tabindex='80' />";
				}
			?>

		</fieldset>
		<p>
			<input type="submit" tabindex="90" />
			<input type="reset" tabindex="100" />
		</p>
	</form>

	<?php
		if(isset($_POST['idEditeur']) and isset($_POST['nom']) and isset($_POST['adresse'])
			and isset($_POST['codePostal']) and isset($_POST['ville']) and isset($_POST['pays'])
			and isset($_POST['adresseMail']) and isset($_POST['adresseInternet'])
			and isset($_POST['idEditeur0']))
		{
			$query = $bdd->prepare("UPDATE TIB_EDITEURS SET idEditeur=:idEditeur,
				nom=:nom, adresse=:adresse, codePostal=:codePostal, ville=:ville, pays=:pays,
				adresseMail=:adresseMail, adresseInternet=:adresseInternet
				WHERE idEditeur=:idEditeur0");

			$retour = $query->execute(array('idEditeur' => $_POST['idEditeur'],
				'nom' => $_POST['nom'], 'adresse' => $_POST['adresse'],
				'codePostal' => $_POST['codePostal'], 'ville' => $_POST['ville'],
				'pays' => $_POST['pays'], 'adresseMail' => $_POST['adresseMail'],
				'adresseInternet' => $_POST['adresseInternet'],
				'idEditeur0' => $_POST['idEditeur0']));

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