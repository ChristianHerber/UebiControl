<?php

class Site_model extends MY_Model {

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
    function Formatar($site){
      if($site){
        for($i = 0; $i < count($site); $i++){
          $site[$i]['editar_url'] = base_url('editar')."/".$site[$i]['id'];
          $site[$i]['excluir_url'] = base_url('excluir')."/".$site[$i]['id'];
        }
        return $site;
      } else {
        return false;
      }
    }


}