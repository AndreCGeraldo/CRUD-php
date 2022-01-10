<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

  /**
   * Host de conexão com o Banco de Dados
   * @var string
   */
  const HOST = 'localhost';

  /**
   * Nome do Banco de Dados
   * @var string
   */
  const NAME = 'avaliacao';

  /**
   * Usuário Banco de Dados
   * @var string
   */
  const USER = 'root';

  /**
   * Senha Banco de Dados
   * @var string
   */
  const PASS = null;

  /**
   * Nome da tabela a ser manipulada
   * @var string
   */
  private $table;

  /**
   * Instancia de conexão com o Banco de Dados
   * @var PDO
   */
  private $connection;

  /**
   * Define a tabela e instancia e conexão
   * @param string $table
   */
  public function __construct($table = null){
    $this->table = $table;
    $this->setConnection();
  }

  /**
   * Método responsável por criar uma conexão com o Banco de Dados
   */
  private function setConnection(){
    try {
      $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die('ERROR: ' . $e->getMessage());
    }
  }

  /**
   * Método responsável por executar queries dentro do Banco de Dados
   * @param  string $query
   * @param  array  $params
   * @return PDOStatement
   */
  public function execute($query, $params = []){
    try {
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    } catch (PDOException $e) {
      die('ERROR: ' . $e->getMessage());
    }
  }

  /**
   * Método responsável por inserir Bados no Danco
   * @param  array $values [ field => value ]
   * @return integer ID inserido
   */
  public function insert($values){

    //DADOS DA QUERY
    $fields = array_keys($values);
    $binds  = array_pad([], count($fields), '?');

    //MONTA A QUERY
    $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

    //EXECUTA O INSERT
    $this->execute($query, array_values($values));

    //RETORNA O ID INSERIDO
    return $this->connection->lastInsertId();
  }

  /**
   * Método responsável por executar uma consulta no Banco de Dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @param  string $fields
   * @return PDOStatement
   */
  public function select($where = null, $order = null, $limit = null, $fields = '*'){
    //DADOS DA QUERY
    $where = strlen($where) ? 'WHERE ' . $where : '';
    $order = strlen($order) ? 'ORDER BY ' . $order : '';
    $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

    //MONTA A QUERY
    $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

    //EXECUTA A QUERY
    return $this->execute($query);
  }


  /**
   * Método responsável por excluir dados do banco
   * @param  string $where
   * @return boolean
   */
  public function delete($where){
    //MONTA A QUERY
    $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;

    //EXECUTA A QUERY
    $this->execute($query);

    //RETORNA SUCESSO
    return true;
  }


  /**
   * Método responsável por executar atualizações no banco de dados
   * @param  string $where
   * @param  array $values [ field => value ]
   * @return boolean
   */
  public function update($where, $values){
    //DADOS DA QUERY
    $fields = array_keys($values);

    //MONTA A QUERY
    $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;

    //EXECUTAR A QUERY
    $this->execute($query, array_values($values));

    //RETORNA SUCESSO
    return true;
  }
}
