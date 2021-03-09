<?php

class Database {
    private $_pdo;
    private $_username_db = 'root';
    private $_password_db = '';

  
    function __construct() {

        $this->_pdo= new PDO(

            'mysql:dbname=loja;host=localhost;',

            $this->_username_db,

            $this->_password_db,

            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")

        );

    }



    function __destruct(){

        $this->CloseConn();

    }



    public function CloseConn(){

        if($this->_pdo){

            $this->_pdo = NULL;

        }

    }

	
  
	public function deleteCategoria($id)

    {

     $sql = "DELETE FROM `categoria` WHERE id = $id LIMIT 1";

        $this->_pdo->exec($sql);

    }

	

	public function getVender($page = 1, $limit = 80, $order = '', $direction = 'asc', $search = ''){
		$params = array();
		$sql = "SELECT u.id , u.nome , u.preco   FROM `produtos` r JOIN `produtos` u ON r.id = u.id";
		$res = $this->_pdo->prepare($sql);
		$res->execute($params);
		$total = $res->rowCount();
		if($order != '')
		{
			if($order == 'nome')

		{
		$direction = $direction == 'asc' ? 'desc' : 'asc';
	   	}
		$sql .= " ORDER BY u.$order $direction";
		}
		else
			{
			$sql .= " ORDER BY r.id, r.nome";
			}
		if ( $limit != 'all' ) {
			$sql .= " LIMIT " . ( ( $page - 1 ) * $limit ) . ", $limit";
		}
		$res = $this->_pdo->prepare($sql);

		$res->execute($params);
		/*$total = $res->rowCount();*/

		$rows = $res->fetchAll(PDO::FETCH_ASSOC);


		$result= new stdClass();

		$result->page = $page;

		$result->limit = $limit;

		$result->total = $total;

		$result->data = $rows;
		return $result;
	}
    public function getProdutos($page = 1, $limit = 80, $order = '', $direction = 'asc', $search = ''){
		$params = array();
		$sql = "SELECT u.id ,u.sku, u.nome , u.preco ,u.quantidade ,u.categoria, u.descricao  FROM `produtos` r JOIN `produtos` u ON r.id = u.id";
		$res = $this->_pdo->prepare($sql);
		$res->execute($params);
		$total = $res->rowCount();
		if($order != '')
		{
			if($order == 'nome')

		{
		$direction = $direction == 'asc' ? 'desc' : 'asc';
	   	}
		$sql .= " ORDER BY u.$order $direction";
		}
		else
			{
			$sql .= " ORDER BY r.id, r.nome";
			}
		if ( $limit != 'all' ) {
			$sql .= " LIMIT " . ( ( $page - 1 ) * $limit ) . ", $limit";
		}
		$res = $this->_pdo->prepare($sql);

		$res->execute($params);
		/*$total = $res->rowCount();*/

		$rows = $res->fetchAll(PDO::FETCH_ASSOC);


		$result= new stdClass();

		$result->page = $page;

		$result->limit = $limit;

		$result->total = $total;

		$result->data = $rows;
		return $result;
	}
    public function getCategoria($page = 1, $limit = 80, $order = '', $direction = 'asc', $search = ''){
		$params = array();
		$sql = "SELECT u.id ,u.cod, u.nome  FROM `categoria` r JOIN `categoria` u ON r.id = u.id";
		$res = $this->_pdo->prepare($sql);
		$res->execute($params);
		$total = $res->rowCount();
		if($order != '')
		{
			if($order == 'nome')

		{
		$direction = $direction == 'asc' ? 'desc' : 'asc';
	   	}
		$sql .= " ORDER BY u.$order $direction";
		}
		else
			{
			$sql .= " ORDER BY r.id, r.nome";
			}
		if ( $limit != 'all' ) {
			$sql .= " LIMIT " . ( ( $page - 1 ) * $limit ) . ", $limit";
		}
		$res = $this->_pdo->prepare($sql);
         $sql;

		$res->execute($params);
		/*$total = $res->rowCount();*/

		$rows = $res->fetchAll(PDO::FETCH_ASSOC);


		$result= new stdClass();

		$result->page = $page;

		$result->limit = $limit;

		$result->total = $total;

		$result->data = $rows;
		return $result;
	}

    public function deleteProdutos($id)

    {

        $sql = "DELETE FROM `produtos` WHERE id = $id LIMIT 1";

        $this->_pdo->exec($sql);

    }
	

}
