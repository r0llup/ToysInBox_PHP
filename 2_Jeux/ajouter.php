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
	<title>Ajout de jeux</title>
</head>
<body>
	<h1>Ajout de jeux</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="ajouter.php">
		<fieldset>
			<legend>Veuillez encoder les informations du jeu :</legend>
			<label for="idJeux">Identifiant :</label>
			<input type="text" name="idJeux" id="idJeux" tabindex="10" /><br />
			<label for="nom">Nom :</label>
			<input type="text" name="nom" id="nom" tabindex="20" /><br />
			<label for="interieur">Le jeu peut-il être joué à l'intérieur ?</label>
			<input type="checkbox" name="interieur" id="interieur" tabindex="30" /><br />
			<label for="interieur">Le jeu peut-il être joué à l'extérieur ?</label>
			<input type="checkbox" name="exterieur" id="exterieur" tabindex="40" /><br />
			<label for="ageMin">Age minimum :</label>
			<input type="text" name="ageMin" id="ageMin" tabindex="50" /><br />
			<label for="ageMax">Age maximum :</label>
			<input type="text" name="ageMax" id="ageMax" tabindex="60" /><br />
			<label for="joueurMin">Nombre de joueurs minimum :</label>
			<input type="text" name="joueurMin" id="joueurMin" tabindex="70" /><br />
			<label for="joueurMax">Nombre de joueurs maximum :</label>
			<input type="text" name="joueurMax" id="joueurMax" tabindex="80" /><br />
			<label for="dateAchat">Date d'achat :</label>
			<input type="text" name="dateAchat" id="dateAchat" tabindex="90" /><br />
			<label for="dureeGarantie">Durée de la garantie :</label>
			<input type="text" name="dureeGarantie" id="dureeGarantie" tabindex="100" /><br />
			<label for="idArmoire">Armoire :</label>
			<select name="idArmoire" id="idArmoire" tabindex="110">

			<?php
				$query = $bdd->query("SELECT idArmoire, piece FROM TIB_ARMOIRES");

				if($query)
				{
					while($data = $query->fetch())
					{
						echo "<option value='" . $data['idArmoire'] . "'>" .
							$data['piece'] . "</option>";
					}

					$query->closeCursor();
				}
			?>

			</select><br />
			<label for="idEditeur">Editeur : </label>
			<select name="idEditeur" id="idEditeur" tabindex="120">

			<?php
				$query = $bdd->query("SELECT idEditeur, nom FROM TIB_EDITEURS");

				if($query)
				{
					while($data = $query->fetch())
					{
						echo "<option value='" . $data['idEditeur'] . "'>" .
							$data['nom'] . "</option>";
					}

					$query->closeCursor();
				}
			?>

			</select><br />
			<label for="idFournisseur">Fournisseur : </label>
			<select name="idFournisseur" id="idFournisseur" tabindex="130">

			<?php
				$query = $bdd->query("SELECT idFournisseur, nom FROM TIB_FOURNISSEURS");

				if($query)
				{
					while($data = $query->fetch())
					{
						echo "<option value='" . $data['idFournisseur'] . "'>" .
							$data['nom'] . "</option>";
					}

					$query->closeCursor();
				}
			?>

			</select>
		</fieldset>
		<p>
			<input type="submit" tabindex="140" />
			<input type="reset" tabindex="150" />
		</p>
	</form>

	<?php
		if(!isset($_POST['interieur']))
		{
			$_POST['interieur'] = 'n';
		}

		else
		{
			if(!isset($_POST['exterieur']))
			{
				$_POST['exterieur'] = 'n';
			}
		}

		if(isset($_POST['idJeux']) and isset($_POST['nom']) and isset($_POST['ageMin'])
			and isset($_POST['ageMax']) and isset($_POST['joueurMin'])
			and isset($_POST['joueurMax']) and isset($_POST['dateAchat'])
			and isset($_POST['idArmoire']) and isset($_POST['idEditeur'])
			and isset($_POST['idFournisseur']))
		{
			$query = $bdd->prepare("INSERT INTO TIB_JEUX VALUES (:idJeux, :nom, :interieur,
				:exterieur, :ageMin, :ageMax, :joueurMin, :joueurMax, :dateAchat,
				:dureeGarantie, :idArmoire, :idEditeur, :idFournisseur)");

			$retour = $query->execute(array('idJeux' => $_POST['idJeux'], 'nom' => $_POST['nom'],
				'interieur' => $_POST['interieur'], 'exterieur' => $_POST['exterieur'],
				'ageMin' => $_POST['ageMin'], 'ageMax' => $_POST['ageMax'],
				'joueurMin' => $_POST['joueurMin'], 'joueurMax' => $_POST['joueurMax'],
				'dateAchat' => $_POST['dateAchat'], 'dureeGarantie' => $_POST['dureeGarantie'],
				'idArmoire' => $_POST['idArmoire'], 'idEditeur' => $_POST['idEditeur'],
				'idFournisseur' => $_POST['idFournisseur']));

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