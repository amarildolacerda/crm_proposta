<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        $this->load->model('Relatorio_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function index() {
        
        $where_array = array();
        $encerra = "data_encerra IS NOT NULL";
        $this->data['convertidos'] = $this->Relatorio_model->count('crm', $where_array, $encerra);
        
        $where_array['seguimento'] = 1;
        $this->data['padarias'] = $this->Relatorio_model->count('crm', $where_array, '');
        
        $this->load->view('relatorio/relatorio',$this->data);
    }
    

    public function convertidos() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mCrm')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/dashboard');
        }

        $this->load->library('table');
        $this->load->library('pagination');


        $where_array = array();
        

        $config['base_url'] = base_url() . 'index.php/relatorio/convertidos';
        $config['total_rows'] = $this->Relatorio_model->count('crm', $where_array,'');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $this->data['status'] = $this->Relatorio_model->getConfig('status_crm', 'idstatus,descricao,encerra', '');
        $this->data['usuarios'] = $this->Relatorio_model->getConfig('usuarios', 'idusuarios,nome', '');
        $this->data['seguimento'] = $this->Relatorio_model->getConfig('seguimento_crm', 'idseguimento,descricao', '');
        $this->data['results'] = $this->Relatorio_model->get('crm', 'idcrm,empresa,nome,telefone,status,seguimento,data,usuario', $where_array, $config['per_page'], '', '', 'idcrm', 'desc');
        $this->load->view('relatorio/convertidos', $this->data);
    }

    public function filtro() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mCrm')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/dashboard');
        }
        $this->load->library('table');
        $this->load->library('pagination');
        
        $vendedor = $this->input->post('vendedor');
        $seguimento = $this->input->post('seguimento');
        $datainicial = $this->input->post('datainicial');
        $datafinal = $this->input->post('datafinal');

//       ESTAS VARIAVEIS SERVEM PARA MANTER O CAMPO SELECIONADO DEPOIS DA PESQUISA 
        $this->data['vendedorpost'] = $this->input->post('vendedor');
        $this->data['seguimentopost'] = $this->input->post('seguimento');

        if (isset($vendedor)and ! empty($vendedor) or isset($seguimento)and ! empty($seguimento) or isset($dataincial)and ! empty($datainicial) or isset($datafinal)and ! empty($datafinal)) {
            //$this->pagination->initialize($config);
            $this->data['status'] = $this->Relatorio_model->getConfig('status_crm', 'idstatus,descricao,encerra', '');
            $this->data['results'] = $this->Relatorio_model->filtro($vendedor, $seguimento, $datainicial, $datafinal);
            $this->data['seguimento'] = $this->Relatorio_model->getConfig('seguimento_crm', 'idseguimento,descricao', '');
            $this->data['indicacao'] = $this->Relatorio_model->getConfig('indicacao_crm', 'idindicacao,descricao', '');
            $this->data['usuarios'] = $this->Relatorio_model->getConfig('usuarios', 'idusuarios,nome', '');
            $this->load->view('relatorio/convertidos', $this->data);
        } else {
            redirect(base_url() . 'index.php/relatorio');
        }
    }
    
    public function seguimentos() {
        $where_array['atribuido'] = 1 ;
        print_r($this->Relatorio_model->teste()) ;
        
        //$this->load->view('relatorio/convertidos', $this->data);
        
    }

}
