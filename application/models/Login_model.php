<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    /*
     * Modelo usuario_model. Efetua busca de usuario no banco
     * Autor Gabriel Grimello
     */

    function __construct() {
        parent::__construct();
    }

    function login($login, $senha) {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('login', $login);
        $this->db->where('senha', $senha);
        $usuario = $this->db->get()->row_array();
        return $usuario;
    }

    function exist($email, $senha) {
        $this->db->where("email", $email);
        $this->db->where("senha", $senha);
        $usuario = $this->db->get("usuarios")->row_array();
        return $usuario;
    }
}
