<?php
require_once('modele/Produit.class.php');
require_once('modele/User.class.php');

$user = new User();
$user->getUser($_SESSION["user"]["id"]);



require ('vue/panier.php');

function liste($donnees)
{
var_dump($_SESSION["panier"]);
	foreach($_SESSION["panier"] as $id)
	{
		$produit = new Produit();
		$produit->getProduit($id);
		echo	'<div class="row">'
			.'	<div class="col-md-3">'
			.'		<img src="vue/image/produit/'. $produit->image() .'" alt="'. $produit->nom() .' class="img-thumbnail"/>'
			.'	</div>'
			.'	<div class="col-md-5">'
			.'		<div class="row">'
			.'			<div class="row">'
			.'				<div class="col-md-12">'
			.					$produit->nom()
			.'				</div>'
			.'			</div>'
			.'			<div class="row">'
			.'				<div class="col-md-12">'
			.					$produit->description()
			.'				</div>'
			.'			</div>'
			.'		</div>'
			.'	</div>'
			.'	<div class="col-md-1">'
			.		$produit->prix()
			.'	</div>'
			.'	<div class="col-md-1">'
			.'		× '. $id["nb"]
			.'	</div>'
			.'	<div class="col-md-2">'
			.'	 = '. $id["nb"] * $produit->prix() .'€'
			.'	</div>'
			.'</div>';
	}
}
?>
