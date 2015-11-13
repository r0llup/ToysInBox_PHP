<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<!-- Auteur : LECLER Quentin									       -->
<!-- Groupe : 2102													   -->
<!-- Application : toysInBox										   -->
<!-- Description : toysInBox										   -->
<!-- Date de dernière mise à jour : 14/05/10						   -->
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<title>Affichage d'armoires</title>
</head>
<body>
	<h1>Affichage d'armoires</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");

		if(isset($_SESSION['connecte']) and $_SESSION['connecte'] === 1)
		{
			echo "<p><a href='ajouter.php'>Ajouter</a></p>";
		}

		else
		{
			echo "<p>Ajouter</p>";
		}

		$query = $bdd->query("SELECT * FROM TIB_ARMOIRES");

		if($query)
		{
			echo "<table border='1'><tr><th>Identifiant</th><th>Description</th><th>Pièce</th>
				<th>Modification</th><th>Suppression</th>";

			while($data = $query->fetch(PDO::FETCH_ASSOC))
			{
				$url = "?";
				echo "<tr>";

				foreach($data as $attribut => $valeur)
				{
					echo "<td>" . $valeur . "</td>";
					$url = $url . $attribut . '=' . $valeur . '&';
				}

				if(isset($_SESSION['connecte']) and $_SESSION['connecte'] === 1)
				{
					echo "<td><a href='modifier.php" . $url . "'>Modifier</a>";
					echo "<td><a href='supprimer.php?idArmoire=" . $data['idArmoire'] .
						"'>Supprimer</a>";
				}

				else
				{
					echo "<td>Modifier</td>";
					echo "<td>Supprimer</td>";
				}
				echo "</tr>";
			}

			echo "</table>";
			$query->closeCursor();
		}

		else
		{
			echo "<p>Aucun résultat.</p>";
		}
	?>

</body>
</html>