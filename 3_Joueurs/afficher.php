<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<!-- Auteur : LECLER Quentin									       -->
<!-- Groupe : 2102													   -->
<!-- Application : toysInBox										   -->
<!-- Description : toysInBox										   -->
<!-- Date de dernière mise à jour : 15/05/10						   -->
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<title>Affichage de joueurs</title>
</head>
<body>
	<h1>Affichage de joueurs</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="afficher.php">
		<fieldset>
			<legend>Veuillez choisir la restriction d'affichage des résultats :</legend>

			<?php
				if(isset($_POST["affichage_joueurs"]) and
					$_POST["affichage_joueurs"] === "joueur_majeur")
				{
					echo "<input type='radio' name='affichage_joueurs' value='joueur_majeur'
						id='joueur_majeur' checked='checked' tabindex='10' />";
				}

				else
				{
					echo "<input type='radio' name='affichage_joueurs' value='joueur_majeur'
						id='joueur_majeur' tabindex='10' />";
				}
			?>

			<label for="joueur_majeur">N'afficher que les joueurs majeurs.</label><br />

			<?php
				if(isset($_POST["affichage_joueurs"]) and $_POST["affichage_joueurs"] === "tous")
				{
					echo "<input type='radio' name='affichage_joueurs' value='tous' id='tous'
						checked='checked' tabindex='20' />";
				}

				else
				{
					if(!isset($_POST["affichage_joueurs"]))
					{
						echo "<input type='radio' name='affichage_joueurs' value='tous' id='tous'
							checked='checked' tabindex='20' />";
					}

					else
					{
						echo "<input type='radio' name='affichage_joueurs' value='tous' id='tous'
							tabindex='20' />";
					}
				}
			?>

			<label for="tous">Afficher tous les joueurs.</label>
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
		if(isset($_POST['affichage_joueurs']))
		{
			if($_POST['affichage_joueurs'] === "joueur_majeur")
			{
				$query = $bdd->query("SELECT * FROM TIB_JOUEURS WHERE
					(DATEDIFF(NOW(), dateNaissance) / 365) >= 18");

				if($query)
				{
					echo "<table border='1'><tr><th>Identifiant</th><th>Nom</th>
						<th>Prénom</th><th>Date de naissance</th><th>Adresse</th>
						<th>Code postal</th><th>Ville</th><th>Pays</th><th>Numéro de téléphone</th>
						<th>Adresse mail</th><th>Modification</th><th>Suppression</th></tr>";

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
							echo "<td><a href='supprimer.php?idJoueur=" . $data['idJoueur'] .
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
			}

			else
			{
				$query = $bdd->query("SELECT * FROM TIB_JOUEURS");

				if($query)
				{
					echo "<table border='1'><tr><th>Identifiant</th><th>Nom</th>
						<th>Prénom</th><th>Date de naissance</th><th>Adresse</th>
						<th>Code postal</th><th>Ville</th><th>Pays</th><th>Numéro de téléphone</th>
						<th>Adresse mail</th><th>Modification</th><th>Suppression</th></tr>";

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
							echo "<td><a href='supprimer.php?idJoueur=" . $data['idJoueur'] .
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
			}
		}
	?>

</body>
</html>