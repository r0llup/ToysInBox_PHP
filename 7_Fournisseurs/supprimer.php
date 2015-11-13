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
	<title>Suppression de fournisseurs</title>
</head>
<body>
	<h1>Suppression de fournisseurs</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");

		if(isset($_GET['idFournisseur']))
		{
			$query = $bdd->prepare("DELETE FROM TIB_FOURNISSEURS WHERE
				idFournisseur=:idFournisseur");
			$retour = $query->execute(array('idFournisseur' => (int) $_GET['idFournisseur']));
			$query->closeCursor();

			if($retour)
			{
				echo "<p>Suppression effectuée.</p>";
			}

			else
			{
				echo "<p>Suppression non effectuée.</p>";
			}
		}
	?>

</body>
</html>