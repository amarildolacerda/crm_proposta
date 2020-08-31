<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }

        $this->load->model('empresa_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function index() {

        $dadoslogin = $this->session->all_userdata();
        $this->data['dadoslogin'] = $dadoslogin;
        $this->load->view('empresa/adicionarEmpresa', $this->data);
    }

    public function gerenciar() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mCrm')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar empresas.');
            redirect(base_url() . 'index.php/dashboard');
        }
        $this->load->library('table');
        $this->load->library('pagination');

        $dadoslogin = $this->session->all_userdata();

        $where_array = array();
        $whereRazaoOuFantasia = array();
        $whereDataCadastro = array();
        $idEmpresas = $this->input->get('idEmpresas');
        $empresa = $this->input->get('empresa');
        $tipoEmpresa = $this->input->get('tipoEmpresa');
        $vendedor = $this->input->get('vendedor');
        $indicacao = $this->input->get('indicacao');
        $seguimento = $this->input->get('seguimento');

        $dataCadastro = $this->input->get('dataCadastro');
        $dataCadastroMenor = $this->input->get('dataCadastroMenor');
        $dataCadastroMaior = $this->input->get('dataCadastroMaior');



        if ($empresa) {
            $whereRazaoOuFantasia['nomeEmpresa'] = $empresa;
            $this->data['empresaget'] = $empresa;
        } else {
            $this->data['empresaget'] = '';
        }

        if ($tipoEmpresa) {
            $where_array['tipo'] = $tipoEmpresa;
            $this->data['tipoEmpresaget'] = $tipoEmpresa;
        } else {
            $this->data['tipoEmpresaget'] = '';
        }

        if ($vendedor) {
            $where_array['vendedor'] = $vendedor;
            $this->data['vendedorget'] = $vendedor;
        } else {
            $this->data['vendedorget'] = '';
        }

        if ($indicacao) {
            $where_array['fonteIndicacao'] = $indicacao;
            $this->data['indicacaoget'] = $indicacao;
        } else {
            $this->data['indicacaoget'] = '';
        }

        if ($seguimento) {
            $where_array['segmento'] = $seguimento;
            $this->data['seguimentoget'] = $seguimento;
        } else {
            $this->data['seguimentoget'] = '';
        }


        if ($dataCadastro) {
            $where_array['dataCadastro'] = $dataCadastro;
        }

        if ($dataCadastroMenor) {
            $where_array['dataCadastro <'] = $dataCadastroMenor;
        }

        if ($dataCadastroMaior) {
            $where_array['dataCadastro >'] = $dataCadastroMaior;
        }

        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'oLead')) {
            $where_array['vendedor'] = $dadoslogin['idusuarios'];
        }

        if ($vendedor) {
            $where_array['vendedor'] = $vendedor;
            $this->data['vendedorget'] = $vendedor;
        } else {
            $this->data['vendedorget'] = '';
        }

        $config['base_url'] = base_url() . 'index.php/empresa/gerenciar';
        $config['total_rows'] = $this->empresa_model->countGerenciar('empresas', $where_array, $whereRazaoOuFantasia);
        $config['per_page'] = 15;
        $config['reuse_query_string'] = TRUE;
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

        $this->data['segmento'] = $this->empresa_model->getConfig('seguimento_crm', 'idseguimento,descricao', '');
//        $this->data['indicacao'] = $this->empresa_model->getConfig('indicacao_crm', 'idindicacao,descricao', '');
//       $this->data['status'] = $this->empresa_model->getConfig('status_crm', 'idstatus,descricao,encerra', '');
        $this->data['usuarios'] = $this->empresa_model->getConfig('usuarios', 'idusuarios,nome', '');
        $this->data['tipoEmpresa'] = $this->empresa_model->getConfig('tipo_empresa', 'idTipoEmpresa,descricao', '');
        $this->data['count'] = $this->empresa_model->countGerenciar('empresas', $where_array, $whereRazaoOuFantasia);
        $this->data['results'] = $this->empresa_model->getGerenciar('empresas', 'idEmpresas,nomeEmpresa,telefone,tipo,vendedor,dataCadastro,segmento', $where_array, $config['per_page'], $this->uri->segment(3), '', 'idEmpresas', 'desc', $whereRazaoOuFantasia);
        $this->load->view('empresa/gerenciarEmpresa', $this->data);
    }

    public function add() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar Empresa.');
            redirect(base_url() . 'index.php/empresa/gerenciar');
        }
        $data['dadoslogin'] = $this->session->all_userdata();

        $this->form_validation->set_rules('nomeEmpresa', 'Empresa', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {


            $dadosEmpresa['contrato'] = 0;
            $dadosEmpresa['nomeEmpresa'] = $this->input->post('nomeEmpresa');
            $dadosEmpresa['cnpj'] = $this->input->post('cnpjEmpresa');
            $dadosEmpresa['telefone'] = $this->input->post('telefoneEmpresa');
            $dadosEmpresa['fonteIndicacao'] = $this->input->post('fonte');
            $dadosEmpresa['segmento'] = $this->input->post('segmentoEmpresa');
            $dadosEmpresa['numeroFuncionarios'] = $this->input->post('numeroFuncionarios');
            $dadosEmpresa['tipo'] = $this->input->post('tipoEmpresa');
            $dadosEmpresa['enderecoEmpresa'] = $this->input->post('enderecoEmpresa');
            $dadosEmpresa['complementoEmpresa'] = $this->input->post('complementoEmpresa');
            $dadosEmpresa['bairroEmpresa'] = $this->input->post('bairroEmpresa');
            $dadosEmpresa['cidadeEmpresa'] = $this->input->post('cidadeEmpresa');
            $dadosEmpresa['softwareAtual'] = $this->input->post('softwareAtual');
            $dadosEmpresa['site'] = $this->input->post('siteEmpresa');
            $dadosEmpresa['vendedor'] = $this->input->post('usuario');
            $dadosEmpresa['dataCadastro'] = date('Y/m/d');
            $dadosEmpresa['dataAlteracao'] = date('Y/m/d');


            $dadosContato['nomeContato'] = $this->input->post('nomeContato');
            $dadosContato['cargo'] = $this->input->post('cargo');
            $dadosContato['papelNaCompra'] = $this->input->post('papelNaCompra');
            $dadosContato['telefoneContato'] = $this->input->post('telefoneContato');
            $dadosContato['whatsappContato'] = $this->input->post('whatsappContato');
            $dadosContato['emailContato'] = $this->input->post('emailContato');
            $dadosContato['dataCadastro'] = date('Y/m/d');
            $dadosContato['dataAlteracao'] = date('Y/m/d');


            $idEmpresa = $this->empresa_model->add('empresas', $dadosEmpresa);
            if ($idEmpresa != 0) {
                $dadosContato['idEmpresas'] = $idEmpresa;
                $idContato = $this->empresa_model->add('contatos', $dadosContato);
                if ($idContato != 0) {
                    redirect(base_url() . 'index.php/empresa/edit/' . $idEmpresa);
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }

        $data['tipo'] = $this->empresa_model->getConfig('tipo_empresa', 'idTipoEmpresa,descricao', 'status=1');
        $data['segmento'] = $this->empresa_model->getConfig('seguimento_crm', 'idseguimento,descricao', 'status=1');
        $data['indicacao'] = $this->empresa_model->getConfig('indicacao_crm', 'idindicacao,descricao', 'status=1');
        $data['status'] = $this->empresa_model->getConfig('status_crm', 'idstatus,descricao', 'status=1');
        $this->load->view('empresa/adicionarEmpresa', $data);
        // $this->load->view('crm/adicionarLead', $data);
    }

    public function edit() {
        //checa se o usuário tem permissão de acessso a esta função
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eLead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/empresa/gerenciar');
        }

//       verifica se o codigo passado no endereço do navegador é de uma empresa existente
//        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
//            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
//            redirect('empresa/gerenciar');
//        }
        //faz a validação dos dados  que chegaram via post
        $this->form_validation->set_rules('nomeEmpresa', 'Empresa', 'trim|required');

        //se não passou na validação, devolve para a view os erros dos campos encontrados
        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();

            //se passou na validação, recebe os dados via post e atribui nas variáveis
        } else {

            $dadosEmpresa['nomeEmpresa'] = $this->input->post('nomeEmpresa');
            $dadosEmpresa['cnpj'] = $this->input->post('cnpjEmpresa');
            $dadosEmpresa['telefone'] = $this->input->post('telefoneEmpresa');
            $dadosEmpresa['fonteIndicacao'] = $this->input->post('fonte');
            $dadosEmpresa['segmento'] = $this->input->post('segmentoEmpresa');
            $dadosEmpresa['numeroFuncionarios'] = $this->input->post('numeroFuncionarios');
            $dadosEmpresa['tipo'] = $this->input->post('tipoEmpresa');
            $dadosEmpresa['enderecoEmpresa'] = $this->input->post('enderecoEmpresa');
            $dadosEmpresa['complementoEmpresa'] = $this->input->post('complementoEmpresa');
            $dadosEmpresa['bairroEmpresa'] = $this->input->post('bairroEmpresa');
            $dadosEmpresa['cidadeEmpresa'] = $this->input->post('cidadeEmpresa');
            $dadosEmpresa['softwareAtual'] = $this->input->post('softwareAtual');
            $dadosEmpresa['site'] = $this->input->post('siteEmpresa');
            $dadosEmpresa['vendedor'] = $this->input->post('usuario');
            $dadosEmpresa['dataAlteracao'] = date('Y/m/d');


            $dadosContato['nomeContato'] = $this->input->post('nomeContato');
            $dadosContato['cargo'] = $this->input->post('cargo');
            $dadosContato['papelNaCompra'] = $this->input->post('papelNaCompra');
            $dadosContato['telefoneContato'] = $this->input->post('telefoneContato');
            $dadosContato['whatsappContato'] = $this->input->post('whatsappContato');
            $dadosContato['emailContato'] = $this->input->post('emailContato');
            $dadosContato['dataAlteracao'] = date('Y/m/d');

            $idNegocios = $this->input->post('idNegocios');
            //depois de receber as variáveis no post e definir as outras variáveis nos testes anteriores, parte para o update na tabela
            if ($this->empresa_model->edit('empresas', $dadosEmpresa, 'idEmpresas', $this->input->post('idEmpresas')) == TRUE) {
                $this->empresa_model->edit('contatos', $dadosContato, 'idContatos', $this->input->post('idContatos'));
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');

                if($idNegocios !=0){
                redirect(base_url() . 'index.php/crm/editNegocios/' . $idNegocios);
            } else {
                redirect(base_url() . 'index.php/empresa/edit/' . $this->input->post('idEmpresas'));
            }
        } else {
            $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
        }
        }

//        $where_array3 = array();
//        $where_array3['idLead_proposta'] = $this->uri->segment(3);
       $whereEmpresa ['negocios.idEmpresas'] = $this->uri->segment(3);

        if ($this->uri->segment(4)) {
            $data['alterarNegocio'] = $this->uri->segment(4);
        }else{
            $data['alterarNegocio'] = 0;
        }
        $data['segmento'] = $this->empresa_model->getConfig('seguimento_crm', 'idseguimento,descricao', 'status=1');
        $data['indicacao'] = $this->empresa_model->getConfig('indicacao_crm', 'idindicacao,descricao', 'status=1');
        //$data['statusfunil'] = $this->empresa_model->getConfig('status_empresa', 'idstatus,descricao,encerra', $where_array);
        //$data['statusencerra'] = $this->empresa_model->getConfig('status_crm', 'idstatus,descricao', $where_array2);
        $data['timelineEmpresas'] = $this->empresa_model->getTimelineEmpresas($this->uri->segment(3));
        $data['dadoslogin'] = $this->session->all_userdata();
        $data['permissao'] = $this->empresa_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['usuarios'] = $this->empresa_model->getConfig('usuarios', 'idusuarios,nome', '');
        $data['empresa'] = $this->empresa_model->getById($this->uri->segment(3));
        $data['contato'] = $this->empresa_model->getByIdContato($this->uri->segment(3));
        $data['negocios'] = $this->empresa_model->getNegocios('negocios', 'negocios.idNegocio,negocios.idEmpresas,negocios.idContatos,negocios.valorDoNegocio,negocios.nomeDoNegocio,negocios.faseDoFunil,negocios.dataCadastro,negocios.dataFechamentoEsperada,empresas.nomeEmpresa,contatos.nomeContato,status_crm.descricao',$whereEmpresa ,'');
       // $data['agenda'] = $this->empresa_model->getConfig('calendario', 'id,title,color,start,end', $where_array3);, $this->uri->segment(3), '', 'idEmpresas', 'desc', $whereRazaoOuFantasia
        $data['tipo'] = $this->empresa_model->getConfig('tipo_empresa', 'idTipoEmpresa,descricao', 'status=1');
        $data['status'] = $this->empresa_model->getConfig('status_crm', 'idstatus,descricao,encerra', 'encerra=0');

        $this->load->view('empresa/alterarEmpresa', $data);
    }

    public function excluirCRM() {

        $idcrm = $this->input->post('idcrmExcluir');
        $where_idcrm['idLead_proposta'] = $idcrm;

        $where_proposta = $this->empresa_model->getPropostas('propostas', 'numpropostas', $where_idcrm, '');
//        var_dump($where_proposta);
        if ($this->empresa_model->delete('crm', 'idcrm', $idcrm) == true) {
            $this->empresa_model->delete('propostas', 'idLead_proposta', $idcrm);
            foreach ($where_proposta as $r) {
                $this->empresa_model->deleteProposta('produtos_proposta', $r->numpropostas);
                $this->empresa_model->deleteProposta('modulos_proposta', $r->numpropostas);
                $this->empresa_model->deleteProposta('servicos_proposta', $r->numpropostas);
            }
            $this->empresa_model->delete('calendario', 'idLead_Proposta', $idcrm);
            $this->empresa_model->delete('timeline_crm', 'idcrm', $idcrm);
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function atribuir() {
        $dados['atribuido'] = 1;
        $dados['usuario'] = $this->input->post('vendedoratribuir');

        if ($this->empresa_model->edit('crm', $dados, 'idcrm', $this->input->post('idcrm')) == true) {

            redirect(base_url() . 'index.php/crm/edit/' . $this->input->post('idcrm'));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function view() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vLead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('crm/gerenciar');
        }

        $where_array = array();
        $where_array['encerra'] = 0;
        $where_array['status'] = 1;

        $where_array2 = array();
        $where_array2['encerra'] = 1;
        $where_array2['status'] = 1;

        $where_array3 = array();
        $where_array3['idLead_proposta'] = $this->uri->segment(3);

        $data['seguimento'] = $this->empresa_model->getConfig('seguimento_crm', 'idseguimento,descricao', 'status=1');
        $data['indicacao'] = $this->empresa_model->getConfig('indicacao_crm', 'idindicacao,descricao', 'status=1');
        $data['statusfunil'] = $this->empresa_model->getConfig('status_crm', 'idstatus,descricao,encerra', $where_array);
        $data['statusencerra'] = $this->empresa_model->getConfig('status_crm', 'idstatus,descricao', $where_array2);
        $data['timeline'] = $this->empresa_model->getTimeline($this->uri->segment(3));
        $data['dadoslogin'] = $this->session->all_userdata();
        $data['permissao'] = $this->empresa_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->empresa_model->getById($this->uri->segment(3));
        $data['proposta'] = $this->empresa_model->getPropostas('propostas', 'numpropostas,fantasia,contato,data,status', $where_array3, '');

        $this->load->view('crm/visualizarLead', $data);
    }

    public function gerenciarTipo() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mStatuslead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'empresa/gerenciarTipo';
        $config['total_rows'] = $this->empresa_model->count('tipo_empresa');
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

        $this->data['results'] = $this->empresa_model->get('tipo_empresa', 'idTipoEmpresa,descricao,status', '', $config['per_page'], $this->uri->segment(3), '', 'idTipoEmpresa', '');

        $this->load->view('empresa/tipo/gerenciarTipo', $this->data);
    }

    public function addTipo() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aStatuslead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/empresa/gerenciar');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');

            $idTipo = $this->empresa_model->add('tipo_empresa', $dados);
            if ($idTipo != 0) {
                redirect(base_url() . 'index.php/empresa/editTipo/' . $idTipo);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['dadoslogin'] = $this->session->all_userdata();
        $this->load->view('empresa/tipo/adicionarTipo', $data);
    }

    public function editTipo() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eStatuslead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/empresa/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/usuario');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');


            if ($this->empresa_model->edit('tipo_empresa', $dados, 'idTipoEmpresa', $this->input->post('idTipo')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/empresa/gerenciarTipo');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['permissao'] = $this->empresa_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->empresa_model->getByIdTipo($this->uri->segment(3));
        $this->load->view('empresa/tipo/alterarTipo', $data);
    }

    public function sendgrid() {

        // require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
        require("localhost/proposta_ci/index.php/third_party/sendgrid/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("test@example.com", "Example User");
        $email->setSubject("Sending with SendGrid is Fun");
        $email->addTo("test@example.com", "Example User");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
                "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
        $sendgrid = new \SendGrid(getenv('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'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }

    public function atualizaClienteContrato() {
        $data = file_get_contents('http://localhost:8886/OData/OData.svc/contrato?$filter=inativo%20eq%20%22N%22');
        $data2 = json_decode($data);
        foreach ($data2->value as $r) {
            //echo "Codigo: ". $r->codigo. " - Nome: ".$r->nome . "<br>";
        }

        var_dump($data2->value);
    }

    public function adicionarTimeline() {
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d-m-Y H:i');
        $idEmpresas = $this->input->post('idEmpresas');
        $descricao = $this->input->post('descricao');
        $tipo = $this->input->post('tipo');
        $nome = $this->session->nome;




        $data = array(
            'idEmpresas' => $idEmpresas,
            'descricao' => $descricao,
            'nome' => $nome,
            'tipo' => $tipo,
            'data' => $data
        );

        if ($this->empresa_model->add('timeline_empresas', $data) == true) {
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    function excluirTimeline() {

        $ID = $this->input->post('idTimeline_empresas');
        if ($this->empresa_model->delete('timeline_empresas', 'idTimeline_empresas', $ID) == true) {

            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

}
