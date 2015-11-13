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
	<title>Ajout de fournisseurs</title>
</head>
<body>
	<h1>Ajout de fournisseurs</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="ajouter.php">
		<fieldset>
			<legend>Veuillez encoder les informations du fournisseur :</legend>
			<label for="idFournisseur">Identifiant :</label>
			<input type="text" name="idFournisseur" id="idFournisseur" tabindex="10" /><br />
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
			<label for="numTel">Numéro de téléphone :</label>
			<input type="text" name="numTel" id="numTel" tabindex="70" /><br />
			<label for="adresseMail">Adresse mail :</label>
			<input type="text" name="adresseMail" id="adresseMail" tabindex="80" /><br />
			<label for="adresseInternet">Adresse internet :</label>
			<input type="text" name="adresseInternet" id="adresseInternet" tabindex="90" />
		</fieldset>
		<p>
			<input type="submit" tabindex="100" />
			<input type="reset" tabindex="110" />
		</p>
	</form>

	<?php
		if(isset($_POST['idFournisseur']) and isset($_POST['nom']) and isset($_POST['adresse'])
			and isset($_POST['codePostal']) and isset($_POST['ville']) and isset($_POST['pays'])
			and isset($_POST['numTel']) and isset($_POST['adresseMail'])
			and isset($_POST['adresseInternet']))
		{
			$query = $bdd->prepare("INSERT INTO TIB_FOURNISSEURS VALUES (:idFournisseur, :nom,
				:adresse, :codePostal, :ville, :pays, :numTel, :adresseMail, :adresseInternet)");

			$retour = $query->execute(array('idFournisseur' => (int) $_POST['idFournisseur'],
				'nom' => $_POST['nom'], 'adresse' => $_POST['adresse'],
				'codePostal' => (int) $_POST['codePostal'], 'ville' => $_POST['ville'],
				'pays' => $_POST['pays'], 'numTel' => $_POST['numTel'],
				'adresseMail' => $_POST['adresseMail'],
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