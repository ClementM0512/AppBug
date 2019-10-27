<?php
	require ('params.php');
	function connexionBdd(){
		try
	{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.HOST.';dbname='.TABLENAME.';charset=utf8', LOGIN, PASSWORD, $pdo_options);
		//echo 'co etablie';
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
	return $bdd;
	}

?>
