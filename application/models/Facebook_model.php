<?php

class Facebook_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'cliente';
    }

    /**
    * Formata os contatos para exibição dos dados na home
    *
    * @param array $contatos Lista dos contatos a serem formatados
    *
    * @return array
    */
    function Formatar($facebook){
      if($facebook){
        for($i = 0; $i < count($facebook); $i++){
          $facebook[$i]['editar_url'] = base_url('editar')."/".$facebook[$i]['id'];
          $facebook[$i]['excluir_url'] = base_url('excluir')."/".$facebook[$i]['id'];
        }
        return $facebook;
      } else {
        return false;
      }
    }


}