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
	<title>Affichage de parties</title>
</head>
<body>
	<h1>Affichage de parties</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="afficher.php">
		<fieldset>
			<legend>Veuillez choisir la restriction d'affichage des résultats :</legend>
			<label for="date1">Date de début des parties :</label>
			<input type="text" name="date1" id="date1" tabindex="10" /><br />
			<label for="date2">Date de fin des parties :</label>
			<input type="text" name="date2" id="date2" tabindex="20" />
		</fieldset>
		<p>
			<input type="submit" tabindex="30" />
			<input type="reset" tabindex="40" />

			<?php
				if(isset($_SESSION['connecte']) and $_SESSION['connecte'] === 1)
				{
					echo "<a href='ajouter.php'>Ajouter</a>";
				}

				else
				{
					echo "Ajouter";
				}
			?>

		</p>
	</form>

	<?php
		if(isset($_POST['date1']) and $_POST['date1'] !== '' and isset($_POST['date2'])
			and $_POST['date2'] !== '')
		{
			$query = $bdd->prepare("SELECT * FROM TIB_PARTIES_JOUEES WHERE date BETWEEN ':date1'
				AND ':date2'");

			$retour = $query->execute(array('date1' => $_POST['date1'],
				'date2' => $_POST['date2']));

			if($retour)
			{
				echo "<table border='1'><tr><th>Identifiant du jeu</th>
					<th>Identifiant du joueur</th><th>Date</th><th>Heure</th><th>Points</th>";

				while($data = $query->fetch(PDO::FETCH_ASSOC))
				{
					echo "<tr>";

					foreach($data as $attribut => $valeur)
					{
						echo "<td>" . $valeur . "</td>";
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
		}

		else
		{
			$query = $bdd->query("SELECT * FROM TIB_PARTIES_JOUEES");

			if($query)
			{
				echo "<table border='1'><tr><th>Identifiant du jeu</th>
					<th>Identifiant du joueur</th><th>Date</th><th>Heure</th><th>Points</th>";

				while($data = $query->fetch(PDO::FETCH_ASSOC))
				{
					echo "<tr>";

					foreach($data as $attribut => $valeur)
					{
						echo "<td>" . $valeur . "</td>";
					}

					echo "</tr>";
				}

				echo "</table>";
			}

			else
			{
				echo "<p>Aucun résultat.</p>";
			}
		}
	?>

</body>
</html>