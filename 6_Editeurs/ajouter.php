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
	<title>Ajout d'éditeurs</title>
</head>
<body>
	<h1>Ajout d'éditeurs</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="ajouter.php">
		<fieldset>
			<legend>Veuillez encoder les informations de l'éditeur :</legend>
			<label for="idEditeur">Identifiant :</label>
			<input type="text" name="idEditeur" id="idEditeur" tabindex="10" /><br />
			<label for="nom">Nom :</label>
			<input type="text" name="nom" id="nom" tabindex="20" /><br />
			<label for="adresse">Adresse :</label>
			<input type="text" name="adresse" id="adresse" tabindex="30" /><br />
			<label for="codePostal">Code postal :</label>
			<input type="text" name="codePostal" id="codePostal" tabindex="40" /><br />
			<label for="ville">Ville :</label>
			<input type="text" name="ville" id="ville" tabindex="50" /><br />
			<label for="pays">Pays :</label>
			<input type="text" name="pays" id="pays" tabindex="60" /><br />
			<label for="adresseMail">Adresse mail :</label>
			<input type="text" name="adresseMail" id="adresseMail" tabindex="70" /><br />
			<label for="adresseInternet">Adresse internet :</label>
			<input type="text" name="adresseInternet" id="adresseInternet" tabindex="80" />
		</fieldset>
		<p>
			<input type="submit" tabindex="90" />
			<input type="reset" tabindex="100" />
		</p>
	</form>

	<?php
		if(isset($_POST['idEditeur']) and isset($_POST['nom']) and isset($_POST['adresse'])
			and isset($_POST['codePostal']) and isset($_POST['ville']) and isset($_POST['pays'])
			and isset($_POST['adresseMail']) and isset($_POST['adresseInternet']))
		{
			$query = $bdd->prepare("INSERT INTO TIB_EDITEURS VALUES (:idEditeur, :nom, :adresse,
				:codePostal, :ville, :pays, :adresseMail, :adresseInternet)");

			$retour = $query->execute(array('idEditeur' => (int) $_POST['idEditeur'],
				'nom' => $_POST['nom'], 'adresse' => $_POST['adresse'],
				'codePostal' => (int) $_POST['codePostal'], 'ville' => $_POST['ville'],
				'pays' => $_POST['pays'], 'adresseMail' => $_POST['adresseMail'],
				'adresseInternet' => $_POST['adresseInternet']));

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