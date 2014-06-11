<?php
include_once ('modele/Commande.class.php');

class CommandeLineOrder extends Commande
{
	private $_idCommande;
	private $_idPoduit;
	
	public function getLineOrder($id)
	{
		$db = new PDOConfig();
		$sql = 'SELECT `idProduit` FROM `commandeLineOrder` WHERE `idCommande` = '. $id;
		$result = $db->prepare($sql);
		$result->execute();
		$list = $result->fetchAll();
		return $list;
        }

	function addItem($idProduit, $idCommande)
	{
		$db = new PDOConfig();
		$sql = 'INSERT INTO `commandeLineOrder`(`idCommande`, `idProduit`) VALUES ("'. $idCommande .'", "'. $idProduit .'")';
		$db->exec($sql);
	}
}
