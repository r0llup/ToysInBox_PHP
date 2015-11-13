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
	<title>Modification de joueurs</title>
</head>
<body>
	<h1>Modification de joueurs</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="modifier.php">
		<fieldset>
			<legend>Veuillez encoder les informations du joueur à modifier :</legend>
			<label for="idJoueur">Identifiant :</label>

			<?php
				if(isset($_GET['idJoueur']))
				{
					echo "<input type='text' name='idJoueur' id='idJoueur' value='" .
						(int) $_GET['idJoueur'] . "' tabindex='10' /><br />";
					echo "<input type='hidden' name='idJoueur0' value='" .
						(int) $_GET['idJoueur'] . "' />";
				}

				else
				{
					echo "<input type='text' name='idJoueur' id='idJoueur' tabindex='10' /><br />";
				}
			?>

			<label for="nom">Nom :</label>

			<?php
				if(isset($_GET['nom']))
				{
					echo "<input type='text' name='nom' id='nom' value='" . $_GET['nom'] .
						"' tabindex='20' /><br />";
				}

				else
				{
					echo "<input type='text' name='nom' id='nom' tabindex='20' /><br />";
				}
			?>

			<label for="prenom">Prénom :</label>

			<?php
				if(isset($_GET['prenom']))
				{
					echo "<input type='text' name='prenom' id='prenom' value='" . $_GET['prenom'] .
						"' tabindex='30' /><br />";
				}

				else
				{
					echo "<input type='text' name='prenom' id='prenom' tabindex='30' /><br />";
				}
			?>

			<label for="dateNaissance">Date de naissance :</label>

			<?php
				if(isset($_GET['dateNaissance']))
				{
					echo "<input type='text' name='dateNaissance' id='dateNaissance' value='" .
						$_GET['dateNaissance'] . "' tabindex='40' /><br />";
				}

				else
				{
					echo "<input type='text' name='dateNaissance' id='dateNaissance'
						tabindex='40' /><br />";
				}
			?>

			<label for="adresse">Adresse :</label>

			<?php
				if(isset($_GET['adresse']))
				{
					echo "<input type='text' name='adresse' id='adresse' value='" .
						$_GET['adresse'] . "' tabindex='50' /><br />";
				}

				else
				{
					echo "<input type='text' name='adresse' id='adresse' tabindex='50' /><br />";
				}
			?>

			<label for="codePostal">Code postal :</label>

			<?php
				if(isset($_GET['codePostal']))
				{
					echo "<input type='text' name='codePostal' id='codePostal' value='" .
						(int) $_GET['codePostal'] . "' tabindex='60' /><br />";
				}

				else
				{
					echo "<input type='text' name='codePostal' id='codePostal'
						tabindex='60' /><br />";
				}
			?>

			<label for="ville">Ville :</label>

			<?php
				if(isset($_GET['ville']))
				{
					echo "<input type='text' name='ville' id='ville' value='" . $_GET['ville'] .
						"' tabindex='70' /><br />";
				}

				else
				{
					echo "<input type='text' name='ville' id='ville' tabindex='70' /><br />";
				}
			?>

			<label for="pays">Pays :</label>

			<?php
				if(isset($_GET['pays']))
				{
					echo "<input type='text' name='pays' id='pays' value='" . $_GET['pays'] .
						"' tabindex='80' /><br />";
				}

				else
				{
					echo "<input type='text' name='pays' id='pays' tabindex='80' /><br />";
				}
			?>

			<label for="numTel">Numéro de téléphone :</label>

			<?php
				if(isset($_GET['numTel']))
				{
					echo "<input type='text' name='numTel' id='numTel' value='" . $_GET['numTel'] .
						"' tabindex='90' /><br />";
				}

				else
				{
					echo "<input type='text' name='numTel' id='numTel' tabindex='90' /><br />";
				}
			?>

			<label for="adresseMail">Adresse mail :</label>

			<?php
				if(isset($_GET['adresseMail']))
				{
					echo "<input type='text' name='adresseMail' id='adresseMail' value='" .
						$_GET['adresseMail'] . "' tabindex='100' />";
				}

				else
				{
					echo "<input type='text' name='adresseMail' id='adresseMail' tabindex='100' />";
				}
			?>

		</fieldset>
		<p>
			<input type="submit" tabindex="110" /> <input type="reset" tabindex="120" />
		</p>
	</form>

	<?php
		if(isset($_POST['idJoueur']) and isset($_POST['nom']) and isset($_POST['prenom'])
			and isset($_POST['dateNaissance']) and isset($_POST['adresse'])
			and isset($_POST['codePostal']) and isset($_POST['ville'])
			and isset($_POST['pays']) and isset($_POST['numTel'])
			and isset($_POST['adresseMail']) and isset($_POST['idJoueur0']))
		{
			$query = $bdd->prepare("UPDATE TIB_JOUEURS SET idJoueur=:idJoueur, nom=:nom,
				prenom=:prenom, dateNaissance=:dateNaissance, adresse=:adresse,
				codePostal=:codePostal, ville=:ville, pays=:pays, numTel=:numTel,
				adresseMail=:adresseMail WHERE idJoueur=:idJoueur0");

			$retour = $query->execute(array('idJoueur' => (int) $_POST['idJoueur'],
				'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'],
				'dateNaissance' => $_POST['dateNaissance'], 'adresse' => $_POST['adresse'],
				'codePostal' => (int) $_POST['codePostal'], 'ville' => $_POST['ville'],
				'pays' => $_POST['pays'], 'numTel' => $_POST['numTel'],
				'adresseMail' => $_POST['adresseMail'], 'idJoueur0' => (int) $_POST['idJoueur0']));

			if($retour)
			{
				echo "<p>Modification effectuée.</p>";
			}

			else
			{
				echo "<p>Modification non effectuée.</p";
			}

			$query->closeCursor();
		}
	?>

</body>
</html>