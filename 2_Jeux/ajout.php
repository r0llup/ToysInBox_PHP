<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<title>Ajout de jeux</title>
</head>
<body>
	<h1>Ajout de jeux</h1>
	<?php
		include "../include/connexion.php";
		include "../include/menu.php";
	?>
	<form method="post" action="ajout.php">
		<fieldset>
			<legend>Veuillez encoder les informations :</legend>
			<p>
				<label for="idJeu">Identifiant du jeu</label> : <input type="text" name="idJeu" id="idJeu" />
			</p>
			
			<p>
				<label for="nom">Nom du jeu</label> : <input type="text" name="nom" id="nom" />
			</p>
			
			<p>
				Veuillez indiquer si le jeu peut-Ãªtre jouÃ© Ã  l'intÃ©rieur et/ ou Ã  l'extÃ©rieur :<br />
				<input type="checkbox" name="interieur" id="interieur" tabindex="10" />
				<label for="interieur">IntÃ©rieur</label>
				<input type="checkbox" name="exterieur
			<input type="radio" name="affichage_jeux" value="garantie_valide" id="garantie_valide" tabindex="20" />
			<label for="garantie_valide">N'afficher que les jeux toujours sous garantie.</label><br />
			<input type="radio" name="affichage_jeux" value="tous" id="tous" checked="checked" tabindex="30" />
			<label for="tous">Afficher tous les jeux.</label>
		</fieldset>
		<p>
			<input type="submit" tabindex="40" /> <input type="reset" tabindex="50" />
		</p>
	</form>

	<?php
		if(isset($_POST['affichage_jeux']))
		{
			if($_POST['affichage_jeux'] === "garantie_expire")
			{
				$requete = $bdd->query("SELECT * FROM TIB_JEUX WHERE ADD_YEARS(dateAchat, dureeGarantie) >= CURRENT_DATE");

				echo "<table border='1'>";
				echo "<tr>";
				echo "<th>IdJeu</th>";
				echo "<th>Nom</th>";
				echo "<th>Intérieur</th>";
				echo "<th>Extérieur</th>";
				echo "<th>AgeMin</th>";
				echo "<th>AgeMax</th>";
				echo "<th>NbJoueursMin</th>";
				echo "<th>NbJoueursMax</th>";
				echo "<th>DateAchat</th>";
				echo "<th>DuréeGarantie</th>";
				echo "</tr>";

				while($donnees = $requete->fetch())
				{
					echo "<tr>";
					echo "<td>" . $donnees['idJeu'] . "</td>";
					echo "<td>" . $donnees['nom'] . "</td>";
					echo "<td>" . $donnees['interieur'] . "</td>";
					echo "<td>" . $donnees['exterieur']	. "</td>";
					echo "<td>" . $donnees['ageMin'] . "</td>";
					echo "<td>" . $donnees['ageMax'] . "</td>";
					echo "<td>" . $donnees['joueurMin'] . "</td>";
					echo "<td>" . $donnees['joueurMax'] . "</td>";
					echo "<td>" . $donnees['dateAchat'] . "</td>";
					echo "<td>" . $donnees['dureeGarantie'] . "</td>";
					echo "</tr>";
				}

				echo "</table>";
			}

			else
			{
				if($_POST['affichage_jeux'] === "garantie_valide")
				{
					$requete = $bdd->query("SELECT * FROM TIB_JEUX WHERE ADD_YEARS(dateAchat, dureeGarantie) < CURRENT_DATE");

					echo "<table border='1'>";
					echo "<tr>";
					echo "<th>IdJeu</th>";
					echo "<th>Nom</th>";
					echo "<th>Intérieur</th>";
					echo "<th>Extérieur</th>";
					echo "<th>AgeMin</th>";
					echo "<th>AgeMax</th>";
					echo "<th>NbJoueursMin</th>";
					echo "<th>NbJoueursMax</th>";
					echo "<th>DateAchat</th>";
					echo "<th>DuréeGarantie</th>";
					echo "</tr>";

					while($donnees = $requete->fetch())
					{
						echo "<tr>";
						echo "<td>" . $donnees['idJeu'] . "</td>";
						echo "<td>" . $donnees['nom'] . "</td>";
						echo "<td>" . $donnees['interieur'] . "</td>";
						echo "<td>" . $donnees['exterieur']	. "</td>";
						echo "<td>" . $donnees['ageMin'] . "</td>";
						echo "<td>" . $donnees['ageMax'] . "</td>";
						echo "<td>" . $donnees['joueurMin'] . "</td>";
						echo "<td>" . $donnees['joueurMax'] . "</td>";
						echo "<td>" . $donnees['dateAchat'] . "</td>";
						echo "<td>" . $donnees['dureeGarantie'] . "</td>";
						echo "</tr>";
					}

					echo "</table>";
				}
				
				else
				{
					$requete = $bdd->query("SELECT * FROM TIB_JEUX");

					echo "<table border='1'>";
					echo "<tr>";
					echo "<th>IdJeu</th>";
					echo "<th>Nom</th>";
					echo "<th>Intérieur</th>";
					echo "<th>Extérieur</th>";
					echo "<th>AgeMin</th>";
					echo "<th>AgeMax</th>";
					echo "<th>NbJoueursMin</th>";
					echo "<th>NbJoueursMax</th>";
					echo "<th>DateAchat</th>";
					echo "<th>DuréeGarantie</th>";
					echo "</tr>";

					while($donnees = $requete->fetch())
					{
						echo "<tr>";
						echo "<td>" . $donnees['idJeu'] . "</td>";
						echo "<td>" . $donnees['nom'] . "</td>";
						echo "<td>" . $donnees['interieur'] . "</td>";
						echo "<td>" . $donnees['exterieur']	. "</td>";
						echo "<td>" . $donnees['ageMin'] . "</td>";
						echo "<td>" . $donnees['ageMax'] . "</td>";
						echo "<td>" . $donnees['joueurMin'] . "</td>";
						echo "<td>" . $donnees['joueurMax'] . "</td>";
						echo "<td>" . $donnees['dateAchat'] . "</td>";
						echo "<td>" . $donnees['dureeGarantie'] . "</td>";
						echo "</tr>";
					}

					echo "</table>";
				}
			}
		}
	?>
</body>
</html>