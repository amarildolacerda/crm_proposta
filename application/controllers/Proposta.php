<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proposta extends CI_Controller {

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
        $this->load->view('proposta/gerenciarProposta');
    }

    public function gerenciar() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vProposta')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/dashboard');
        }

        $this->load->library('table');
        $this->load->library('pagination');
        $dadoslogin = $this->session->all_userdata();


        $where_array = array();

        $fantasia = $this->input->get('pesquisa');
        $numpropostas = $this->input->get('pesquisa2');
        $status = $this->input->get('status');

        if ($fantasia) {
            $where_array['fantasia'] = $fantasia;
        }
        if ($numpropostas) {
            $where_array['numpropostas'] = $numpropostas;
        }
        if ($status) {
            $where_array['status'] = $status;
        }




        $config['base_url'] = base_url() . 'index.php/proposta/gerenciar';
        $config['total_rows'] = $this->proposta_model->count('propostas', $dadoslogin['idusuarios']);
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

        $this->data['results'] = $this->proposta_model->get('propostas', 'numpropostas,fantasia,contato,data,status', $dadoslogin['idusuarios'], $where_array, $config['per_page'], $this->uri->segment(3));

        $this->load->view('proposta/gerenciarProposta', $this->data);
    }

    public function add() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aProposta')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/proposta/gerenciar');
        }

        //$this->form_validation->set_rules('cnpj', 'Cnpj', 'trim|required');
        $this->form_validation->set_rules('fantasia', 'Fantasia', 'trim|required');
        //$this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email');


        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['fantasia'] = $this->input->post('fantasia');
            $dados['cnpj'] = $this->input->post('cnpj');
            $dados['endereco'] = $this->input->post('endereco');
            $dados['cidade'] = $this->input->post('cidade');
            $dados['estado'] = $this->input->post('estado');
            $dados['email'] = $this->input->post('email');
            $dados['contato'] = $this->input->post('contato');
            $dados['telefone'] = $this->input->post('telefone');
            $dados['data'] = date('d/m/Y');
            $dados['status'] = 1;
            $dados['fatdireto'] = 0;
            $dados['idLead_proposta'] = $this->input->post('idLead_proposta');
            $dados['usuario'] = $this->input->post('usuario');

            $numproposta = $this->proposta_model->adicionar($dados);
            if ($numproposta != 0) {
                redirect(base_url() . 'index.php/proposta/edit/' . $numproposta);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['dadoslogin'] = $this->session->all_userdata();
        $this->load->view('proposta/adicionarProposta', $data);
    }

    public function edit() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eProposta')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/dashboard');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect(base_url() . 'index.php/proposta/gerenciar');
        }

        // $this->form_validation->set_rules('cnpj', 'Cnpj', 'trim|required');
        $this->form_validation->set_rules('fantasia', 'Fantasia', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['fantasia'] = $this->input->post('fantasia');
            $dados['cnpj'] = $this->input->post('cnpj');
            $dados['endereco'] = $this->input->post('endereco');
            $dados['cidade'] = $this->input->post('cidade');
            $dados['estado'] = $this->input->post('estado');
            $dados['email'] = $this->input->post('email');
            $dados['contato'] = $this->input->post('contato');
            $dados['telefone'] = $this->input->post('telefone');
            $dados['prazopagamento'] = $this->input->post('prazo');
            $dados['validade'] = $this->input->post('validade');
            $dados['previsaoinst'] = $this->input->post('previsao');
            $dados['observacao'] = $this->input->post('observacao');
            $dados['fatdireto'] = $this->input->post('fatdireto');
            $dados['status'] = $this->input->post('status');

            if ($this->proposta_model->edit('propostas', $dados, 'numpropostas', $this->input->post('numpropostas')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro atualizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/proposta/edit/' . $this->input->post('numpropostas'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }

        $data['produtos'] = $this->proposta_model->getProdutos($this->uri->segment(3));
        $data['servicos'] = $this->proposta_model->getServicos($this->uri->segment(3));
        $data['modulos'] = $this->proposta_model->getModulos($this->uri->segment(3));
        $data['result'] = $this->proposta_model->getById($this->uri->segment(3));
        $this->load->view('proposta/alterarProposta', $data);
    }
    
    public function pesquisaProduto() {
        $produtopesq = $this->input->post('produtopesq');

            $response = file_get_contents('http://intranet1.wbagestao.com.br:7070/OData/OData.svc/produtos?select=nome&$filter=nome%20like%20(%27%%25' . $produtopesq . '%%25%27)');
//            $response = json_decode($response);

            $this->data['totalresultados'] = count($response->value);
            $this->data['produtopesq'] = $response;
     
            echo $this->data;
    }

    public function imprimir() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'iProposta')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/proposta/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/proposta');
        }


        $this->data['result'] = $this->proposta_model->getById($this->uri->segment(3));
        $this->data['count_prod'] = $this->proposta_model->count_impressao('produtos_proposta', $this->uri->segment(3));
        $this->data['count_serv'] = $this->proposta_model->count_impressao('servicos_proposta', $this->uri->segment(3));
        $this->data['count_mod'] = $this->proposta_model->count_impressao('modulos_proposta', $this->uri->segment(3));
        $this->data['produtos'] = $this->proposta_model->getProdutos($this->uri->segment(3));
        $this->data['servicos'] = $this->proposta_model->getServicos($this->uri->segment(3));
        $this->data['modulos'] = $this->proposta_model->getModulos($this->uri->segment(3));
        $this->data['dadoslogin'] = $this->session->all_userdata();


        $this->load->view('proposta/imprimirProposta', $this->data);
    }

    public function adicionarProduto() {
        $numpropostas = $this->input->post('numpropostas');
        $codigo = $this->input->post('codigo');
        $produto = $this->input->post('produto');
        $quantidade = $this->input->post('quantidade');
        $vlunitario = $this->input->post('vlunitario');
        $vltotal = $vlunitario * $quantidade;

        $data = array(
            'numpropostas' => $numpropostas,
            'codigo' => $codigo,
            'produto' => $produto,
            'quantidade' => $quantidade,
            'vlunitario' => $vlunitario,
            'vltotal' => $vltotal,
        );

        if ($this->proposta_model->add('produtos_proposta', $data) == true) {
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function adicionarServico() {
        $numpropostas = $this->input->post('numpropostas');
        $servico = $this->input->post('servico');
        $quantidade = $this->input->post('quantidadeserv');
        $vlunitario = $this->input->post('vlunitarioserv');
        $vltotal = $vlunitario * $quantidade;

        $data = array(
            'numpropostas' => $numpropostas,
            'servico' => $servico,
            'quantidade' => $quantidade,
            'vlunitario' => $vlunitario,
            'vltotal' => $vltotal,
        );

        if ($this->proposta_model->add('servicos_proposta', $data) == true) {
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function adicionarModulo() {
        $numpropostas = $this->input->post('numpropostas');
        $modulo = $this->input->post('modulo');
        $quantidade = $this->input->post('quantidademod');


        $data = array(
            'numpropostas' => $numpropostas,
            'modulo' => $modulo,
            'quantidade' => $quantidade,
        );

        if ($this->proposta_model->add('modulos_proposta', $data) == true) {
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function adicionarMensalidade() {
        $numpropostas = $this->input->post('numpropostas');
        $totalmensalidade = $this->input->post('totalmensalidade');

        $data = array(
            'numpropostas' => $numpropostas,
            'totalmensalidade' => $totalmensalidade,
        );

        if ($this->proposta_model->edit('propostas', $data, 'numpropostas', $this->input->post('numpropostas')) == TRUE) {
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }
    
    function excluirProposta() {

        $numpropostas = $this->input->post('numPropostasExcluir');
        
        if ($this->proposta_model->delete('propostas', 'numpropostas', $numpropostas) == true) {
            $this->proposta_model->delete('produtos_proposta', 'numpropostas', $numpropostas);
            $this->proposta_model->delete('modulos_proposta', 'numpropostas', $numpropostas);
            $this->proposta_model->delete('servicos_proposta', 'numpropostas', $numpropostas);
            
            redirect(base_url() . 'index.php/proposta/gerenciar');
        } else {
            echo json_encode(array('result' => false));
        }
    }

    function excluirProduto() {

        $ID = $this->input->post('idProduto_proposta');
        if ($this->proposta_model->delete('produtos_proposta', 'idProduto_proposta', $ID) == true) {

            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    function excluirServico() {

        $ID = $this->input->post('idServico_proposta');
        if ($this->proposta_model->delete('servicos_proposta', 'idServico_proposta', $ID) == true) {

            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    function excluirModulo() {

        $ID = $this->input->post('idModulo_proposta');
        if ($this->proposta_model->delete('modulos_proposta', 'idModulo_proposta', $ID) == true) {

            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    
}
