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
	<title>Affichage de jeux</title>
</head>
<body>
	<h1>Affichage de jeux</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="afficher.php">
		<fieldset>
			<legend>Veuillez choisir la restriction d'affichage des résultats :</legend>

			<?php
				if(isset($_POST["affichage_jeux"]) and
					$_POST["affichage_jeux"] === "garantie_expire")
				{
					echo "<input type='radio' name='affichage_jeux' value='garantie_expire'
						id='garantie_expire' tabindex='10' checked='checked' />";
				}

				else
				{
					echo "<input type='radio' name='affichage_jeux' value='garantie_expire'
						id='garantie_expire' tabindex='10' />";
				}
			?>

			<label for="garantie_expire">N'afficher que les jeux dont la garantie est expirée.
				</label><br />

			<?php
				if(isset($_POST["affichage_jeux"]) and
					$_POST["affichage_jeux"] === "garantie_valide")
				{
					echo "<input type='radio' name='affichage_jeux' value='garantie_valide'
						id='garantie_valide' tabindex='20' checked='checked' />";
				}

				else
				{
					echo "<input type='radio' name='affichage_jeux' value='garantie_valide'
						id='garantie_valide' tabindex='20' />";
				}
			?>

			<label for="garantie_valide">N'afficher que les jeux toujours sous garantie.
			</label><br />

			<?php
				if(isset($_POST["affichage_jeux"]) and $_POST["affichage_jeux"] === "tous")
				{
					echo "<input type='radio' name='affichage_jeux' value='tous' id='tous'
						checked='checked' tabindex='30' />";
				}

				else
				{
					if(!isset($_POST["affichage_jeux"]))
					{
						echo "<input type='radio' name='affichage_jeux' value='tous' id='tous'
							checked='checked' tabindex='30' />";
					}

					else
					{
						echo "<input type='radio' name='affichage_jeux' value='tous' id='tous'
							tabindex='30' />";
					}
				}
			?>

			<label for="tous">Afficher tout les jeux.</label>
		</fieldset>
		<p>
			<input type="submit" tabindex="40" />
			<input type="reset" tabindex="50" />

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
		if(isset($_POST['affichage_jeux']))
		{
			if($_POST['affichage_jeux'] === "garantie_expire")
			{
				$query = $bdd->query("SELECT * FROM TIB_JEUX WHERE
					DATE_ADD(dateAchat, INTERVAL dureeGarantie YEAR) < CURDATE()");

				if($query)
				{
					echo "<table border='1'><tr><th>Identifiant</th><th>Nom</th>
						<th>Intérieur</th><th>Extérieur</th><th>Age minimum</th>
						<th>Age maximum</th><th>Nombre de joueurs minimum</th>
						<th>Nombre de joueurs maximum</th><th>Date d'achat</th>
						<th>Durée de la garantie</th><th>Identifiant armoire</th>
						<th>Identifiant éditeur</th><th>Identifiant fournisseur</th>
						<th>Modification</th><th>Suppression</th></tr>";

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
							echo "<td><a href='supprimer.php?idJeux=" . $data['idJeux'] .
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
				if($_POST['affichage_jeux'] === "garantie_valide")
				{
					$query = $bdd->query("SELECT * FROM TIB_JEUX WHERE
						DATE_ADD(dateAchat, INTERVAL dureeGarantie YEAR) >= CURDATE()");

					if($query)
					{
						echo "<table border='1'><tr><th>Identifiant</th><th>Nom</th>
							<th>Intérieur</th><th>Extérieur</th><th>Age minimum</th>
							<th>Age maximum</th><th>Nombre de joueurs minimum</th>
							<th>Nombre de joueurs maximum</th><th>Date d'achat</th>
							<th>Durée de la garantie</th><th>Identifiant armoire</th>
							<th>Identifiant éditeur</th><th>Identifiant fournisseur</th>
							<th>Modification</th><th>Suppression</th></tr>";

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
								echo "<td><a href='supprimer.php?idJeux=" . $data['idJeux'] .
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
					$query = $bdd->query("SELECT * FROM TIB_JEUX");

					if($query)
					{
						echo "<table border='1'><tr><th>Identifiant</th><th>Nom</th>
							<th>Intérieur</th><th>Extérieur</th><th>Age minimum</th>
							<th>Age maximum</th><th>Nombre de joueurs minimum</th>
							<th>Nombre de joueurs maximum</th><th>Date d'achat</th>
							<th>Durée de la garantie</th><th>Identifiant armoire</th>
							<th>Identifiant éditeur</th><th>Identifiant fournisseur</th>
							<th>Modification</th><th>Suppression</th></tr>";

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
								echo "<td><a href='supprimer.php?idJeux=" . $data['idJeux'] .
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
		}
	?>

</body>
</html>