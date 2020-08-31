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

    public function adicionarProposta() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aProposta')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/proposta/gerenciar');
        }

        $this->form_validation->set_rules('idNegocio', 'idNegocio', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['idEmpresas'] = $this->input->post('idEmpresas');
            $dados['idContatos'] = $this->input->post('idContatos');
            $dados['idNegocio'] = $this->input->post('idNegocio');
            $dados['prazoPagamento'] = $this->input->post('prazoPagamento');
            $dados['validade'] = $this->input->post('validade');
            $dados['previsaoInstalacao'] = $this->input->post('previsaoInstalacao');
            $dados['vendedor'] = $this->input->post('vendedor');
            $dados['dataCadastro'] = date('Y-m-d');
            $dados['dataAlteracao'] = date('Y-m-d');

            $idProposta = $this->proposta_model->adicionar($dados);
            if ($idProposta != 0) {
                redirect(base_url() . 'index.php/proposta/editarProposta/' . $idProposta);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
    }

    public function editarProposta() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eProposta')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/dashboard');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect(base_url() . 'index.php/proposta/gerenciar');
        }

        // $this->form_validation->set_rules('cnpj', 'Cnpj', 'trim|required');
        $this->form_validation->set_rules('idPropostas', 'idPropostas', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['idPropostas'] = $this->input->post('idPropostas');
            $dados['idEmpresas'] = $this->input->post('idEmpresas');
            $dados['idContatos'] = $this->input->post('idContatos');
            $dados['idNegocio'] = $this->input->post('idNegocio');
            $dados['prazoPagamento'] = $this->input->post('prazoPagamento');
            $dados['observacao'] = $this->input->post('observacao');
            $dados['validade'] = $this->input->post('validade');
            $dados['previsaoInstalacao'] = $this->input->post('previsaoInstalacao');
            $dados['vendedor'] = $this->input->post('vendedor');
            $dados['dataAlteracao'] = date('Y-m-d');

            if ($this->proposta_model->edit('propostas', $dados, 'idPropostas', $this->input->post('idPropostas')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro atualizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/proposta/editarProposta/' . $this->input->post('idPropostas'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }

        $data['produtos'] = $this->proposta_model->getProdutos($this->uri->segment(3));
        $data['servicos'] = $this->proposta_model->getServicos($this->uri->segment(3));
        $data['modulos'] = $this->proposta_model->getModulos($this->uri->segment(3));
        $data['modulosCadastrados'] = $this->proposta_model->getModulosCadastrados();
        $data['proposta'] = $this->proposta_model->getProposta('propostas.idPropostas,propostas.idEmpresas,propostas.idContatos,propostas.idNegocio,propostas.prazoPagamento,propostas.validade,propostas.previsaoInstalacao,propostas.observacao,propostas.vendedor,propostas.dataCadastro,propostas.dataAlteracao,propostas.mensalidade,propostas.totalProdutos,propostas.totalServicos,empresas.nomeEmpresa,empresas.cnpj,empresas.enderecoEmpresa,empresas.bairroEmpresa,empresas.cidadeEmpresa,contatos.emailContato,contatos.nomeContato,contatos.telefoneContato,contatos.whatsappContato', $this->uri->segment(3));
        $this->load->view('proposta/alterarProposta', $data);
    }

    public function mensalidadeProposta() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eProposta')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/dashboard');
        }
        $this->form_validation->set_rules('idPropostas', 'idPropostas', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['idPropostas'] = $this->input->post('idPropostas');
            $dados['mensalidade'] = $this->input->post('mensalidade');
            $dados['dataAlteracao'] = date('Y-m-d');

            if ($this->proposta_model->edit('propostas', $dados, 'idPropostas', $this->input->post('idPropostas')) == TRUE) {
                redirect(base_url() . 'index.php/proposta/editarProposta/' . $this->input->post('idPropostas'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
    }

    public function adicionarModulosProposta() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eProposta')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/dashboard');
        }
        $this->form_validation->set_rules('idPropostas', 'idPropostas', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $dados['formErrors'] = validation_errors();
        } else {
            $dados['idPropostas'] = $this->input->post('idPropostas');
            $dados['modulo'] = $this->input->post('idModulo');
            $dados['quantidade'] = $this->input->post('quantidade');

            if ($this->proposta_model->add('modulos_proposta', $dados) == TRUE) {
                echo json_encode(array('result' => true));
            } else {
                echo json_encode(array('result' => false));
            }
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

    function excluirProposta() {

        $idPropostas = $this->input->post('idPropostaExcluir');
        $idNegocio = $this->input->post('idNegocio');


        if ($this->proposta_model->delete('propostas', 'idPropostas', $idPropostas) == true) {
            $this->proposta_model->delete('produtos_proposta', 'idPropostas', $idPropostas);
            $this->proposta_model->delete('modulos_proposta', 'idPropostas', $idPropostas);
            $this->proposta_model->delete('servicos_proposta', 'idPropostas', $idPropostas);

            redirect(base_url() . 'index.php/crm/editNegocios/' . $idNegocio);
        } else {
            echo json_encode(array('result' => false));
        }
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
        $idPropostas = $this->input->post('idPropostas');
        $produto = $this->input->post('descricaoProduto');
        $quantidade = $this->input->post('quantidadeProduto');
        $vlunitario = $this->input->post('vlunitarioProduto');
        $vltotal = $vlunitario * $quantidade;

        $data = array(
            'idPropostas' => $idPropostas,
            'produto' => $produto,
            'quantidade' => $quantidade,
            'vlunitario' => $vlunitario,
            'vltotal' => $vltotal,
        );

        if ($this->proposta_model->add('produtos_proposta', $data) == true) {
            $data['result'] = $this->proposta_model->getById($idPropostas);
            $dados['totalProdutos'] = $data['result']->totalProdutos + $vltotal;
            if ($this->proposta_model->edit('propostas', $dados, 'idPropostas', $this->input->post('idPropostas')) == TRUE) {
                echo json_encode(array('result' => true));
            } else {
                echo json_encode(array('result' => false));
            }
        }
    }
    
    function excluirProduto() {
//recebe o id do serviço na tabela de produto proposta e o valor total desse serviço
        // recebe também a ID da proposta 
        $teste = $this->input->get('idProduto_proposta');
        $a = explode("-",$teste);
        $ID = $a[0];
        $idPropostas = $a[1];
        $vltotal = $a[2];
       //se retornar true para o delete desse serviço, então ele pega os dados e subtrai o total no total do serviço
        if ($this->proposta_model->delete('produtos_proposta', 'idProduto_proposta', $ID) == true) {
            $data['result'] = $this->proposta_model->getById($idPropostas);
            $dados['totalProdutos'] = $data['result']->totalProdutos - $vltotal;
            if ($this->proposta_model->edit('propostas', $dados, 'idPropostas', $idPropostas) == true) {
                echo json_encode(array('result' => true));
            } else {
                echo json_encode(array('result' => false));
            }
        }
    }

    public function adicionarServico() {
        $idPropostas = $this->input->post('idPropostas');
        $servico = $this->input->post('descricaoServico');
        $quantidade = $this->input->post('quantidadeServico');
        $vlunitario = $this->input->post('vlunitarioServico');
        $vltotal = $vlunitario * $quantidade;

        $data = array(
            'idPropostas' => $idPropostas,
            'servico' => $servico,
            'quantidade' => $quantidade,
            'vlunitario' => $vlunitario,
            'vltotal' => $vltotal,
        );

        if ($this->proposta_model->add('servicos_proposta', $data) == true) {
            $data['result'] = $this->proposta_model->getById($idPropostas);
            $dados['totalServicos'] = $data['result']->totalServicos + $vltotal;
            if ($this->proposta_model->edit('propostas', $dados, 'idPropostas', $this->input->post('idPropostas')) == TRUE) {
                echo json_encode(array('result' => true));
            } else {
                echo json_encode(array('result' => false));
            }
        }
    }

    function excluirServico() {
//recebe o id do serviço na tabela de produto proposta e o valor total desse serviço
        // recebe também a ID da proposta 
        $teste = $this->input->get('idServico_proposta');
        $a = explode("-",$teste);
        $ID = $a[0];
        $idPropostas = $a[1];
        $vltotal = $a[2];
       //se retornar true para o delete desse serviço, então ele pega os dados e subtrai o total no total do serviço
        if ($this->proposta_model->delete('servicos_proposta', 'idServico_proposta', $ID) == true) {
            $data['result'] = $this->proposta_model->getById($idPropostas);
            $dados['totalServicos'] = $data['result']->totalServicos - $vltotal;
            if ($this->proposta_model->edit('propostas', $dados, 'idPropostas', $idPropostas) == true) {
                echo json_encode(array('result' => true));
            } else {
                echo json_encode(array('result' => false));
            }
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
   
}
