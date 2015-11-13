<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=user230', 'root');
	}
	catch(Exeption $e)
	{
		 die('Erreur : ' . $e->getMessage());
	}
?>