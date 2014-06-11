<?php
require_once('modele/User.class.php');
require_once('modele/Commande.class.php');
require_once('modele/CommandeLineOrder.class.php');



$user = new User();
$user->getUser($_SESSION["user"]["id"]);

$type = "success";
$message = "Votre commande a bien été prise en compte";

$commande = new Commande();

$commande->setStatus("En attente");
$commande->setPrixTotal($_POST["prixtotal"]);
$commande->setUser($user->id());
$idcommande = $commande->insert();
var_dump($commande);
var_dump($idcommade);
if($idcommande > 0)
{
	foreach($_SESSION["panier"] as $key => $value)
	{
		$item = new CommandeLineOrder();
		$item->addItem($key, $idcommande);
	}


	require ('vue/message.php');
}
else
{
	require ('vue/message.php');
}

?>
