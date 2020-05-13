<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Biblioteca extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }

        $this->load->model('Biblioteca_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function index() {

        $this->load->view('biblioteca/gerenciar');
    }

    public function gerenciar() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mBiblioteca')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/dashboard');
        }

        $this->load->library('table');
        $this->load->library('pagination');

        $where_array = array();



        $config['base_url'] = base_url() . 'index.php/biblioteca/gerenciar';
        $config['total_rows'] = $this->Biblioteca_model->count('biblioteca');
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

        $this->data['status'] = $this->Biblioteca_model->getConfig('status_crm', 'idstatus,descricao,encerra', '');
        $this->data['usuarios'] = $this->Biblioteca_model->getConfig('usuarios', 'idusuarios,nome', '');
        $this->data['results'] = $this->Biblioteca_model->get('biblioteca', '*', $where_array, $config['per_page'], $this->uri->segment(3), '');
        $this->data['upload_path'] = './biblioteca/upload/';
        $this->load->view('biblioteca/gerenciarArquivo', $this->data);
    }

    public function add() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aBiblioteca')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar arquivos na biblioteca.');
            redirect(base_url() . 'index.php/dashboard');
        }
        $data['dadoslogin'] = $this->session->all_userdata();

        $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
        // $this->form_validation->set_rules('arquivo', 'Arquivo', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'pdf|png|jpeg';
            $config['max_size'] = 15000;
           // $config['max_width'] = 1024;
           // $config['max_height'] = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('arquivo')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('biblioteca/upload_form', $error);
            } else {
                $data = $this->upload->data();

                //$this->load->view('biblioteca/upload_success', $data);


                $dados['nome'] = $this->input->post('nome');
                $dados['descricao'] = $this->input->post('descricao');
                $dados['data'] = date('Y/m/d');
                $dados['usuario'] = $this->input->post('usuario');
                $dados['caminho'] = $data['orig_name'];

                $idBiblioteca = $this->Biblioteca_model->add('biblioteca', $dados);
                if ($idBiblioteca != 0) {
                    redirect(base_url() . 'index.php/biblioteca/gerenciar');
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }

        $this->load->view('biblioteca/adicionarArquivo', $data);
    }

    function excluir() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dBiblioteca')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir arquivos na biblioteca.');
            redirect(base_url() . 'index.php/dashboard');
        }
        $idbiblioteca = $this->input->post('idBibliotecaExcluir');
        $arquivo = $this->Biblioteca_model->getExcluir($idbiblioteca);

        if ($this->Biblioteca_model->delete('biblioteca', 'idbiblioteca', $idbiblioteca) == true) {
            $path ='./upload/';
            @unlink($path.$arquivo->caminho);

           redirect(base_url() . 'index.php/biblioteca/gerenciar');
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function do_upload() {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 15000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('arquivo')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('biblioteca/upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('biblioteca/upload_success', $data);
        }
    }

}
