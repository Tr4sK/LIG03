<?php
require_once('sql.class.php');

class Categorie
{
	private $_db;
	private $_id;
	private $_nom;
	private $_contenu;
	private $_image;

	public function __construct()
	{
	}
	public function id()
	{
		return $this->_id;
	}
	public function nom()
	{
		return $this->_nom;
	}
	public function contenu()
	{
		return $this->_contenu;
	}
	public function image()
	{
		return $this->_image;
	}
	public function setId($id)
	{
		$id = (int) $id;

		if ($id > 0)
		{
			$this->_id = $id;
		}
	}
	public function setNom($nom)
	{
		$this->_nom = $nom;
	}
	public function setContenu($contenu)
	{
		$this->_contenu = $contenu;
	}
	public function setImage($image)
	{
		$this->_image = $image;
	}
	
	public function getCategorie($offset, $limit)
	{
		$db = new PDOConfig();
		$offset = isset($offset) ? (int) $offset : '0';
		$limit = isset($limit) ? (int) $limit : '10';
		$sql = 'SELECT id, nom, contenu, image FROM categorie ORDER BY id DESC LIMIT '. $offset .', '. $limit;
		$result = $db->prepare($sql);
		$result->execute();
		$list = $result->fetchAll();
		return $list;
	}
}
