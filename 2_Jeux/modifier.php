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
	<title>Modification de jeux</title>
</head>
<body>
	<h1>Modification de jeux</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="modifier.php">
		<fieldset>
			<legend>Veuillez encoder les informations du jeu à modifier :</legend>
			<label for="idJeux">Identifiant :</label>

			<?php
				if(isset($_GET['idJeux']))
				{
					echo "<input type='text' name='idJeux' id='idJeux' value='" .
						(int) $_GET['idJeux'] . "' tabindex='10' /><br />";
					echo "<input type='hidden' name='idJeux0' value='" .
						(int) $_GET['idJeux'] . "' />";
				}

				else
				{
					echo "<input type='text' name='idJeux' id='idJeux' tabindex='10' /><br />";
				}
			?>

			<label for="nom">Nom :</label>

			<?php
				if(isset($_GET['nom']))
				{
					echo "<input type='text' name='nom' id='nom' value='" . $_GET['nom'] .
						"' tabindex='20' /><br />";
				}

				else
				{
					echo "<input type='text' name='nom' id='nom' tabindex='20' /><br />";
				}
			?>

			<label for="interieur">Le jeu peut-il être joué à l'intérieur ?</label>

			<?php
				if(isset($_GET['interieur']))
				{
					echo "<input type='checkbox' name='interieur' id='interieur' checked='checked'
						tabindex='30' /><br />";
				}

				else
				{
					echo "<input type='checkbox' name='interieur' id='interieur'
						tabindex='30' /><br />";
				}
			?>

			<label for="interieur">Le jeu peut-il être joué à l'extérieur ?</label>

			<?php
				if(isset($_GET['exterieur']))
				{
					echo "<input type='checkbox' name='exterieur' id='exterieur' checked='checked'
						tabindex='40' /><br />";
				}

				else
				{
					echo "<input type='checkbox' name='exterieur' id='exterieur'
						tabindex='40' /><br />";
				}
			?>

			<label for="ageMin">Age minimum :</label>

			<?php
				if(isset($_GET['ageMin']))
				{
					echo "<input type='text' name='ageMin' id='ageMin' value='" .
						(int) $_GET['ageMin'] . "' tabindex='50' /><br />";
				}

				else
				{
					echo "<input type='text' name='ageMin' id='ageMin' tabindex='50' /><br />";
				}
			?>

			<label for="ageMax">Age maximum :</label>

			<?php
				if(isset($_GET['ageMax']))
				{
					echo "<input type='text' name='ageMax' id='ageMax' value='" .
						(int) $_GET['ageMax'] . "' tabindex='60' /><br />";
				}

				else
				{
					echo "<input type='text' name='ageMax' id='ageMax' tabindex='60' /><br />";
				}
			?>

			<label for="joueurMin">Nombre de joueurs minimum :</label>

			<?php
				if(isset($_GET['joueurMin']))
				{
					echo "<input type='text' name='joueurMin' id='joueurMin' value='" .
						(int) $_GET['joueurMin'] . "' tabindex='70' /><br />";
				}

				else
				{
					echo "<input type='text' name='joueurMin' id='joueurMin'
						tabindex='70' /><br />";
				}
			?>

			<label for="joueurMax">Nombre de joueurs maximum :</label>
			<?php
				if(isset($_GET['joueurMax']))
				{
					echo "<input type='text' name='joueurMax' id='joueurMax' value='" .
						(int) $_GET['joueurMax'] . "' tabindex='80' /><br />";
				}

				else
				{
					echo "<input type='text' name='joueurMax' id='joueurMax'
						tabindex='80' /><br />";
				}
			?>

			<label for="dateAchat">Date d'achat :</label>

			<?php
				if(isset($_GET['dateAchat']))
				{
					echo "<input type='text' name='dateAchat' id='dateAchat' value='" .
						$_GET['dateAchat'] . "' tabindex='90' /><br />";
				}

				else
				{
					echo "<input type='text' name='dateAchat' id='dateAchat'
						tabindex='90' /><br />";
				}
			?>

			<label for="dureeGarantie">Durée de la garantie :</label>

			<?php
				if(isset($_GET['dureeGarantie']))
				{
					echo "<input type='text' name='dureeGarantie' id='dureeGarantie' value='" .
						(int) $_GET['dureeGarantie'] . "' tabindex='100' /><br />";
				}

				else
				{
					echo "<input type='text' name='dureeGarantie' id='dureeGarantie'
						tabindex='100' /><br />";
				}
			?>

			<label for="idArmoire">Armoire :</label>
			<select name="idArmoire" id="idArmoire" tabindex="110">

			<?php
				$query = $bdd->query("SELECT idArmoire, piece FROM TIB_ARMOIRES");

				if($query)
				{
					if(isset($_GET['idArmoire']))
					{
						while($data = $query->fetch())
						{
							if($data['idArmoire'] === (int) $_GET['idArmoire'])
							{
								echo "<option value='" . $data['idArmoire'] .
									"' selected='selected'>" . $data['piece'] . "</option>";
							}

							else
							{
								echo "<option value='" . $data['idArmoire'] . "'>" .
									$data['piece'] . "</option>";
							}
						}
					}

					else
					{
						while($data = $query->fetch())
						{
							echo "<option value='" . $data['idArmoire'] . "'>" .
								$data['piece'] . "</option>";
						}
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
					if(isset($_GET['idEditeur']))
					{
						while($data = $query->fetch())
						{
							if($data['idEditeur'] === (int) $_GET['idEditeur'])
							{
								echo "<option value='" . $data['idEditeur'] .
									"' selected='selected'>" . $data['nom'] . "</option>";
							}

							else
							{
								echo "<option value='" . $data['idEditeur'] . "'>" .
									$data['nom'] . "</option>";
							}
						}
					}

					else
					{
						while($data = $query->fetch())
						{
							echo "<option value='" . $data['idEditeur'] . "'>" .
								$data['nom'] . "</option>";
						}
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
					if(isset($_GET['idFournisseur']))
					{
						while($data = $query->fetch())
						{
							if($data['idFournisseur'] === (int) $_GET['idFournisseur'])
							{
								echo "<option value='" . $data['idFournisseur'] .
									"' selected='selected'>" . $data['nom'] . "</option>";
							}

							else
							{
								echo "<option value='" . $data['idFournisseur'] . "'>" .
									$data['nom'] . "</option>";
							}
						}
					}

					else
					{
						while($data = $query->fetch())
						{
							echo "<option value='" . $data['idFournisseur'] . "'>" .
								$data['nom'] . "</option>";
						}
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
		if(isset($_POST['idJeux']) and isset($_POST['nom']) and isset($_POST['interieur'])
			and isset($_POST['exterieur']) and isset($_POST['ageMin'])
			and isset($_POST['ageMax']) and isset($_POST['joueurMin'])
			and isset($_POST['joueurMax']) and isset($_POST['dateAchat'])
			and isset($_POST['idArmoire']) and isset($_POST['idEditeur'])
			and isset($_POST['idFournisseur']) and isset($_POST['idJeux0']))
		{
			$query = $bdd->prepare("UPDATE TIB_JEUX SET idJeux=:idJeux, nom=:nom,
				interieur=:interieur, exterieur=:exterieur, ageMin=:ageMin, ageMax=:ageMax,
				joueurMin=:joueurMin, joueurMax=:joueurMax, dateAchat=:dateAchat,
				dureeGarantie=:dureeGarantie, idArmoire=:idArmoire, idEditeur=:idEditeur,
				idFournisseur=:idFournisseur WHERE idJeux=:idJeux0");

			$retour = $query->execute(array('idJeux' => $_POST['idJeux'], 'nom' => $_POST['nom'],
				'interieur' => $_POST['interieur'], 'exterieur' => $_POST['exterieur'],
				'ageMin' => $_POST['ageMin'], 'ageMax' => $_POST['ageMax'],
				'joueurMin' => $_POST['joueurMin'], 'joueurMax' => $_POST['joueurMax'],
				'dateAchat' => $_POST['dateAchat'], 'dureeGarantie' => $_POST['dureeGarantie'],
				'idArmoire' => $_POST['idArmoire'], 'idEditeur' => $_POST['idEditeur'],
				'idFournisseur' => $_POST['idFournisseur'], 'idJeux0' => $_POST['idJeux0']));

			if($retour)
			{
				echo "<p>Modification effectuée.</p>";
			}

			else
			{
				echo "<p>Modification non effectuée.</p";
			}
		}
	?>

</body>
</html>