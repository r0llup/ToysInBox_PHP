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
	<title>Ajout de parties</title>
</head>
<body>
	<h1>Ajout de parties</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="ajouter.php">
		<fieldset>
			<legend>Veuillez encoder les informations de la partie :</legend>
			<label for="idJeux">Jeu :</label>
			<select name="idJeux" id="idJeux" tabindex="10">

			<?php
				$query = $bdd->query("SELECT idJeux, nom FROM TIB_JEUX");

				if($query)
				{
					while($data = $query->fetch())
					{
						echo "<option value='" . $data['idJeux'] . "'>" .
							$data['nom'] . "</option>";
					}

					$query->closeCursor();
				}
			?>

			</select><br />
			<label for="idJoueur">Joueur :</label>
			<select name="idJoueur" id="idJoueur" tabindex="20">

			<?php
				$query = $bdd->query("SELECT idJoueur, nom FROM TIB_JOUEURS");

				if($query)
				{
					while($data = $query->fetch())
					{
						echo "<option value='" . $data['idJoueur'] . "'>" .
							$data['nom'] . "</option>";
					}

					$query->closeCursor();
				}
			?>

			</select><br />
			<label for="date">Date :</label>
			<input type="text" name="date" id="date" tabindex="30" /><br />
			<label for="heure">Heure :</label>
			<select name="heure" id="heure" tabindex="40">

			<?php
				for($compteur = 0; $compteur < 24; $compteur++)
				{
					echo "<option value='" . $compteur . "'>" . $compteur . "</option>";
				}
			?>

			</select>
			<select name="minute" id="minute" tabindex="50">

			<?php
				for($compteur = 0; $compteur < 60; $compteur++)
				{
					echo "<option value='" . $compteur . "'>" . $compteur . "</option>";
				}
			?>

			</select><br />
			<label for="points">Points :</label>
			<input type="text" name="points" id="points" tabindex="60" />
		</fieldset>
		<p>
			<input type="submit" tabindex="70" />
			<input type="reset" tabindex="80" />
		</p>
	</form>

	<?php
		if(isset($_POST['idJeux']) and isset($_POST['idJoueur']) and isset($_POST['date'])
			and isset($_POST['points']))
		{
			$heure = "" . $_POST['heure'] . ":" . $_POST['minute'];

			$requete = $bdd->prepare("INSERT INTO TIB_PARTIES_JOUEES VALUES (:idJeux, :idJoueur,
				:date, :heure, :points)");

			$retour = $requete->execute(array('idJeux' => (int) $_POST['idJeux'],
				'idJoueur' => (int) $_POST['idJoueur'], 'date' => $_POST['date'],
				'heure' => $heure, 'points' => (int) $_POST['points']));

			if($retour)
			{
				echo "<p>Ajout effectué.</p>";
			}

			else
			{
				echo "<p>Ajout non effectué.</p";
			}
		}
	?>

</body>
</html>