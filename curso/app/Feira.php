<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use \app\Functions;

class Feira extends Model
{
    private $tipo;
    private $tema;
    private $local;
    private $data;
    private $obsercacao;
    
    function getTipo() {
        return $this->tipo;
    }

    function getTema() {
        return $this->tema;
    }

    function getLocal() {
        return $this->local;
    }

    function getData() {
        return $this->data;
    }

    function getObsercacao() {
        return $this->obsercacao;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setTema($tema) {
        $this->tema = $tema;
    }

    function setLocal($local) {
        $this->local = $local;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setObsercacao($obsercacao) {
        $this->obsercacao = $obsercacao;
    }
    
    public function mapeiaDados($dados){
        $this->setTipo($dados['tipo']);
        $this->setTema($dados['tema']);
        $this->setLocal($dados['local']);
        $this->setData($dados['data']);
        $this->setObsercacao($dados['observacao']);
    }
    
    public function insert()
    {
        
    }
    
    public function getFeira($id)
    {
        $dados = \DB::connection('mysql')->select(\DB::raw("SELECT *, date_format(data, '%d-%m-%Y %H:%i') as dataBR FROM feira WHERE id=$id"))[0];

//        $function = new Functions();
//        $dados->data = $function->convertDataToBR("2016-01-02");
        return $dados;
    }
}
