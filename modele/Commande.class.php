<?php
require_once('sql.class.php');

class Commande
{
	private $_idCommande;
	private $_status;
	private $_prixTotal;
	private $_user;

	public function __construct()
	{
	}

	public function idCommande()
	{
		return $this->_idCommande;
	}
	public function user()
	{
		return $this->_user;
	}
	public function status()
	{
		return $this->_status;
	}
	public function prixTotal()
	{
		return $this->_prixTotal;
	}

	public function setIdCommande($val)
	{
		$this->_idCommande = $val;
	}
	public function setUser($val)
	{
		$this->_user = $val;
	}
	public function setStatus($val)
	{
		$this->_status = $val;
	}
	public function setPrixTotal($val)
	{
		$this->_prixTotal = $val;
	}

	public function getCommande($id)
	{
		$db = new PDOConfig();
		if(isset($id))
		{
			$sql = 'SELECT `id`, `status`, `prixTotal`, `user` FROM `commande` WHERE `id` = '. $id;
			foreach($db->query($sql) as $row)
			{
				if(isset($row))
				{
					$this->setIdCommande($row['id']);
					$this->setStatus($row['status']);
					$this->setPrixTotal($row['prixTotal']);
					$this->setUser($row['user']);
				}	
			}
		}
	}
		
	public function getUserCommande($id)
	{
		$db = new PDOConfig();
		if(isset($id))
		{
			$sql = 'SELECT `id`, `status`, `prixTotal`, `user` FROM `commande` WHERE `user` = '. $id;
			foreach($db->query($sql) as $row)
			{
				if(isset($row))
				{
					$this->setIdCommande($row['id']);
					$this->setStatus($row['status']);
					$this->setPrixTotal($row['prixTotal']);
					$this->setUser($row['user']);
				}	
			}
		}
	}

	public function getList($offset, $limit, $id)
	{
		$db = new PDOConfig();
		$offset = isset($offset) ? (int) $offset : 0;
		$limit = isset($limit) ? (int)$limit : 10;
		$id = isset($id) ? (int)$id : 0;
		$sql = 'SELECT `id`, `status`, `prixTotal`, `user` FROM `commande` ORDER BY `id` DESC LIMIT '. $offset .','. $limit;
		$result = $db->prepare($sql);
		$result->execute();
		$list = $result->fetchAll();
		return $list;
	}
	
	public function insert()
	{
	        $db = new PDOConfig();
	        $sql =  'INSERT INTO `commande`'
	                .'(status, PrixTotal, user)'
	                .' VALUES '
	                .'("'. $this->status() .'", '
	                .'"'. $this->prixTotal() .'", '
	                .'"'. $this->user() .'")';
	        $db->exec($sql);
	        $id = $db->lastInsertID();
	        return $id;
	}	

}
