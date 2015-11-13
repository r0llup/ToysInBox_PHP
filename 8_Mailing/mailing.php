<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<!-- Auteur : LECLER Quentin									       -->
<!-- Groupe : 2102													   -->
<!-- Application : toysInBox										   -->
<!-- Description : toysInBox										   -->
<!-- Date de dernière mise à jour : 15/05/10						   -->
<!--xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<title>Mailing</title>
</head>
<body>
	<h1>Mailing</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");
	?>

	<form method="post" action="mailing.php">
		<fieldset>
			<legend>Veuillez choisir parmis les fournisseurs suivants :</legend>

			<?php
				$compteur = 10;

				$query = $bdd->query("SELECT nom, adresseMail FROM TIB_FOURNISSEURS");

				if($query)
				{
					while($data = $query->fetch())
					{
						if($data['adresseMail'] !== '')
						{
							echo "<input type='checkbox' name='" . $compteur .
								"' id='" . $compteur . "' value='" . $data['adresseMail'] .
								"' tabindex='" . $compteur . "' />";
							echo "<label for='" . $compteur . "'>" . $data['nom'] . " (" .
								$data['adresseMail'] . ")</label><br />";
							$compteur = $compteur + 10;
						}
					}

					$query->closeCursor();
				}

				else
				{
					echo "<p>Aucun résultat.</p>";
				}
			?>

		</fieldset>
		<fieldset>
			<legend>Veuillez choisir parmis les éditeurs suivants :</legend>

			<?php
				$query = $bdd->query("SELECT nom, adresseMail FROM TIB_EDITEURS");

				if($query)
				{
					while($data = $query->fetch())
					{
						if($data['adresseMail'] !== '')
						{
							echo "<input type='checkbox' name='" . $compteur .
								"' id='" . $compteur . "' value='" . $data['adresseMail'] .
								"' tabindex='" . $compteur . "' />";
							echo "<label for='" . $compteur . "'>" . $data['nom'] . " (" .
								$data['adresseMail'] . ")</label><br />";
							$compteur = $compteur + 10;
						}
					}

					$query->closeCursor();
				}

				else
				{
					echo "<p>Aucun résultat.</p>";
				}
			?>

		</fieldset>
		<fieldset>
			<legend>Veuillez choisir parmis les joueurs suivants :</legend>

			<?php
				$query = $bdd->query("SELECT nom, prenom, adresseMail FROM TIB_JOUEURS");

				if($query)
				{
					while($data = $query->fetch())
					{
						if($data['adresseMail'] !== '')
						{
							echo "<input type='checkbox' name='" . $compteur .
								"' id='" . $compteur . "' value='" . $data['adresseMail'] .
								"' tabindex='" . $compteur . "' />";
							echo "<label for='" . $compteur . "'>" . $data['nom'] . " " .
								$data['prenom'] . "(" . $data['adresseMail'] . ")</label><br />";
							$compteur = $compteur + 10;
						}
					}

					$query->closeCursor();
				}

				else
				{
					echo "<p>Aucun résultat.</p>";
				}
			?>

		</fieldset>
		<fieldset>
			<legend>Veuillez encoder les informations du message :</legend>
			<label for="sujet">Sujet :</label>

			<?php
				echo "<input type='text' name='sujet' id='sujet' tabindex='" . $compteur .
					"' /><br />";
			?>

			<label for="message">Message :</label><br />

			<?php
				echo "<textarea name='message' id='message' tabindex='" . ($compteur+10) .
					"'></textarea>";
			?>

		</fieldset>
		<p>

			<?php
				echo "<input type='submit' tabindex='" . ($compteur+10) . "' />";
				echo "<input type='reset' tabindex='" . ($compteur + 10) . "' />";
			?>

		</p>
	</form>

	<?php
		$to = "";

		foreach($_POST as $attribut => $valeur)
		{
			if(isset($attribut))
			{
				if($attribut !== "sujet" and $attribut !== "message")
				{
					$to = $to . $valeur . ",";
				}

				else
				{
					if($attribut === "sujet")
					{
						$subject = $valeur;
					}

					else
					{
						$message = $valeur;
					}
				}
			}
		}

		if(isset($subject) and isset($message))
		{
			$retour = Mail($to, $subject, $message);
			
			if($retour)
			{
				echo "<p>Envoi effectué.</p>";
			}

			else
			{
				echo "<p>Envoi non effectué.</p>";
			}
		}
	?>

</body>
</html>