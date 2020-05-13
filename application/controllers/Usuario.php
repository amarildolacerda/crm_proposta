<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
        $this->load->model('usuario_model');
    }

    public function index() {
        $this->load->view('usuario/gerenciarUsuario');
    }

    public function gerenciar() {


        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vUsuario')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar Usuários.');
            redirect(base_url() . 'index.php/dashboard');
        }

        $this->load->library('table');
        $this->load->library('pagination');


        $config['base_url'] = base_url() . 'index.php/usuario/gerenciar/';
        $config['total_rows'] = $this->usuario_model->count('usuarios');
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

        $this->data['results'] = $this->usuario_model->get('usuarios', 'idusuarios,nome,permissao,filial,status', '', $config['per_page'], $this->uri->segment(3));
        $this->data['dadoslogin'] = $this->session->all_userdata();
        
        
        $this->load->view('usuario/gerenciarUsuario', $this->data);
    }

    public function add() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aUsuario')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/dashboard');
        }

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {

            $dados['nome'] = $this->input->post('nome');
            $dados['email'] = $this->input->post('email');
            $dados['senha'] = $this->input->post('senha');
            $dados['status'] = $this->input->post('status');
            $dados['telefone'] = $this->input->post('telefone');
            $dados['filial'] = $this->input->post('filial');
            $dados['permissao'] = $this->input->post('permissao');

            $dados['senha'] = md5($dados['senha']);
            $existe = $this->usuario_model->exist($dados['email']); // acessa a função buscaPorEmailSenha do modelo

            if ($existe) {
                $data['formErrors'] = "E-mail já cadastrado em outro usuário";
            } else {
                if ($this->usuario_model->adicionar($dados) == TRUE) {
                    $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                    $data['formErrors'] = null;
                    redirect(base_url() . 'index.php/usuario/add/');
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }
        $data['permissao'] = $this->usuario_model->getPermissao('permissoes', 'idPermissao,nome');
        $this->load->view('usuario/adicionarUsuario', $data);
    }

    public function edit() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eUsuario')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/dashboard');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/usuario');
        }


        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['nome'] = $this->input->post('nome');
            $dados['email'] = $this->input->post('email');
            $dados['status'] = $this->input->post('status');
            $dados['telefone'] = $this->input->post('telefone');
            $dados['filial'] = $this->input->post('filial');
            $dados['permissao'] = $this->input->post('permissao');


            if ($this->usuario_model->edit('usuarios', $dados, 'idusuarios', $this->input->post('idusuarios')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/usuario/edit/' . $this->input->post('idusuarios'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['permissao'] = $this->usuario_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->usuario_model->getById($this->uri->segment(3));
        $this->load->view('usuario/alterarUsuario', $data);
    }

    public function alterarsenha() {
        
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eUsuario')) {
            if ($this->session->userdata('idusuarios')!= $this->uri->segment(3)){
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/dashboard');
            }
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/usuario');
        }

        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['senha'] = $this->input->post('senha');
            $dados['senha'] = md5($dados['senha']);

            if ($this->usuario_model->edit('usuarios', $dados, 'idusuarios', $this->input->post('idusuarios')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/usuario/alterarsenha/' . $this->input->post('idusuarios'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['permissao'] = $this->usuario_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->usuario_model->getById($this->uri->segment(3));
        $this->load->view('usuario/alterarSenhaUsuario', $data);
    }

}
