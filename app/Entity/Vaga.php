<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Vaga
{

    /**
     * Identificador único do Controle
     * @var integer
     */
    public $id;

    /**
     * Nome do colaborador
     * @var string
     */
    public $nome;

    /**
     * setor do colaborador
     * @var string
     */
    public $setor;

    /**
     * Cargo do colaborador
     * @var string
     */
    public $cargo;


    /**
     * Método responsável por cadastrar uma nova vaga no banco
     * @return boolean
     */
    public function anexar(){

        //INSERIR A VAGA NO BANCO
        $obDatabase = new Database('colaborador');
        $this->id = $obDatabase->insert([
            'nome' => $this->nome,
            'setor' => $this->setor,
            'cargo' => $this->cargo
        ]);

        //RETORNAR SUCESSO
        return true;
    }

    /**
     * Método responsável por obter a vaga do Banco de Dados
     * @param  string $where
     * @param  string $order
     * @param  string $limit
     * @return array
     */
    public static function getVagas($where = null, $order = null, $limit = null){
        return (new Database('colaborador'))->select($where, $order, $limit)
                                            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

   



}
