<?php

class Mail_model extends MY_Model {

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
    function Formatar($mail){
      if($mail){
        for($i = 0; $i < count($mail); $i++){
          $mail[$i]['editar_url'] = base_url('editar')."/".$mail[$i]['id'];
          $mail[$i]['excluir_url'] = base_url('excluir')."/".$mail[$i]['id'];
        }
        return $mail;
      } else {
        return false;
      }
    }


}