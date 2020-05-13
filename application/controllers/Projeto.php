<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto extends CI_Controller {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->model('proposta_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function index() {
        $this->load->view('projeto/adicionar');
    }

    public function trello() {
        $this->load->view('projeto/adicionar');
    }

}
