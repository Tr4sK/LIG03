<?php


// Test de session
	$dContenu = array (
		"1" => array("titre" => "kéké", "contenu" => "message description", "date" => "10/19/29", "numCommentaire" => "12"),
		"2" => array("titre" => "Kiki", "contenu" => "Caca", "date" => "10/32/2282", "numCommentaire" => "12")
		);


try {
	if (isset($_GET['page'])){ 			// Test $_GET
		// On récupère action=XX
		$action=strtolower($_GET['page']);
		require_once $action.'.php';
	}
	else{
		require_once 'main.php';			// $_GET vide
	}
}
catch (Exception $e) {
	erreur($e->getMessage());
	}
?>
