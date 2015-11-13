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
	<title>Connexion</title>
</head>
<body>
	<h1>Connexion</h1>

	<?php
		require("../include/connexion.php");
		include("../include/menu.php");

		if((isset($_SESSION['connecte']) and $_SESSION['connecte'] == 0) or
			(!isset($_SESSION['connecte'])))
		{
			$_SESSION['connecte'] = 0;

			echo "<form method='post' action='connexion.php'>
				<fieldset>
					<legend>Veuiller saisir vos informations d'accès :</legend>
					<label for='login'>Identifiant :</label>
					<input type='text' name='login' id='login' tabindex='10' /><br />
					<label for='mdp'>Mot de passe :</label>
					<input type='password' name='mdp' id='mdp' tabindex='20' />
				</fieldset>
				<p>
					<input type='submit' tabindex='30' />
					<input type='reset' tabindex='40' />
				</p>
			</form>";

			if(isset($_POST['login']) and isset($_POST['mdp']))
			{
				$query = $bdd->prepare("SELECT * FROM php_user WHERE login=:login AND mdp=:mdp
					LIMIT 1");

				$retour = $query->execute(array('login' => $_POST['login'],
					'mdp' => md5($_POST['mdp'])));

				if($retour)
				{
					if($data = $query->fetch())
					{
						$_SESSION['connecte'] = 1;
						echo "<p>Connexion effectuée.</p>";
					}

					else
					{
						echo "<p>Les informations saisies sont invalides.</p>";
					}
				}

				else
				{
					echo "<p>Connexion non effectuée.</p>";
				}
			}
		}

		else
		{
			if(isset($_GET['connecte']))
			{
				if((int) $_GET['connecte'] === 0)
				{
					session_destroy();
				}
			}

			else
			{
				echo "<p><a href='connexion.php?connecte=0'>Déconnexion</a></p>";
			}
		}
	?>

</body>
</html>