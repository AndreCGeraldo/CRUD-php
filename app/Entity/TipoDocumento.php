<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class TipoDocumento{

    public $id;

    public $nome_doc;

    public $flag;

    public $data_criacao;

    public $data_modificado;

    public $id_criador;

    public $id_modificador;

    public function cadastrar(){
        try {
            $obDatabase = new Database('tipo_documento');
            $this->id = $obDatabase->insert([
                'nome_doc' => $this->nome_doc,
                'flag' => $this->flag,
                'data_criacao' => $this->data_criacao,
                'data_modificado' => $this->data_modificado,
                'id_criador' => $this->id_criador,
                'id_modificador' => $this->id_modificador,
            ]);

            //RETORNAR SUCESSO
            return true;
        } catch (\Exception $e) {

            print_r($e);

            return false;
        }
    }


    /**
     * Método responsável por atualizar o documento no banco
     * @return boolean
     */
    public function atualizar(){
        return (new Database('tipo_documento'))->update('id = ' . $this->id, [
            'nome_doc' => $this->nome_doc,
            'flag' => $this->flag,
            'data_criacao' => $this->data_criacao,
            'data_modificado' => $this->data_modificado,
            'id_criador' => $this->id_criador,
            'id_modificador' => $this->id_modificador
        ]);
    }


    /**
     * Método responsável por excluir o documento do banco
     * @return boolean
     */
    public function excluir(){
        return (new Database('tipo_documento'))->delete('id = ' . $this->id);
    }



    public static function getTipos($where = null, $order = null, $limit = null){
        return (new Database('tipo_documento'))
            ->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }


    /**
     * Método responsável por buscar o documento com base em seu ID
     * @param  integer $id
     * @return TipoDocumento
     */
    public static function getTipoDocumento($id){
        return (new Database('tipo_documento'))->select('id = ' . $id)
            ->fetchObject(self::class);
    }
}
