<?php

require_once('titre.php');
require_once('blocdroit.php');
require_once('footer.php');

// appel de la fonction principale.
// Génère la page d'accueil du site.
// Landing page.

//

$dTitre = "Bienvenue :)";
$dContenu = $dContenu;

require_once ("vue/template.php");

function contenu($donnees){
	// Affiche le contenu du bloc centrale
	// Les données sont transmit via un array
	// Exemple :
	// 	$donnees = array(
	// 		"INT ID" => array("titre" => "STR TITRE", "contenu" => "STR MESSAGE", "date" => "STR DATE", "numCommentaire" => "INT AGE")
	// 		);
	foreach($donnees as $i => $id){
		echo '<h1>'. $id["titre"] .'</h1>';
		echo '<p>'. $id["contenu"] .'</p>';
		echo '<p>Écrit le :'. $id["date"] .'. '. $id["numCommentaire"] .' commentaires.</p>';
		}
}
?>
