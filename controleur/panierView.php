<?php
require_once('modele/Produit.class.php');
require_once('modele/User.class.php');

$user = new User();
$user->getUser($_SESSION["user"]["id"]);



require_once ('vue/panier.php');

function liste($donnees)
{
	$prixTotal = 0;
	foreach($_SESSION["panier"] as $key => $value)
	{
		$produit = new Produit();
		$produit->getProduit($key);
		$prixTotal+=$value["nb"] * $produit->prix();

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
			.'		× '. $value["nb"]
			.'	</div>'
			.'	<div class="col-md-2">'
			.'	 = '. $value["nb"] * $produit->prix() .'€'
			.'	</div>'
			.'</div>';
	}
		echo	'<div class="row">'
			.'	<div class="col-md-8">'
			.'	</div>'
			.'	<div class="col-md-2">'
			.'		Sous-total = '
			.'	</div>'
			.'	<div class="col-md-2">'
			.		$prixTotal
			.'	<input type="hidden" name="prixtotal" value="'. $prixTotal .'">'
			.'	</div>'
			.'</div>';
}
?>
