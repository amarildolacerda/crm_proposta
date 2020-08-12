<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Crm extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }

        $this->load->model('crm_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function index() {

        redirect(base_url() . 'index.php/crm/negociosKanban');
    }

    public function negociosKanban() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mCrm')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/dashboard');
        }

        // preciso pegar todos os crms,atribuidos separados por usuario e status

        $dadoslogin = $this->session->all_userdata();
        $whereNegocios_array = array();
        $whereNegocios_array['negocios.vendedor'] = $dadoslogin['idusuarios'];

//        $whereNegocios_array['crm.status'] = 1;
//        $whereNegocios_array['crm.situacao'] = "novo";
//        $this->data['oportunidade'] = $this->crm_model->get('crm', 'idcrm,empresa,nome,whatsapp,telefone,status,usuario', $whereNegocios_array, 0, 0, '', 'idcrm', 'desc');
//        $this->data['oportunidadeNegocios'] = $this->crm_model->getNegocios('crm', 'crm.idcrm,crm.empresa,crm.nome,crm.whatsapp,crm.telefone,crm.status,crm.usuario,propostas.idLead_proposta,propostas.numpropostas,propostas.usuario,propostas.totalequip, propostas.totalservico, propostas.totalmensalidade', $whereNegocios_array, 0, 0, '', 'idcrm', 'desc');
//        $this->data['countOportunidade'] = $this->crm_model->countNegocios('crm', $whereNegocios_array);

        $whereNegocios_array['negocios.faseDoFunil'] = 1;
        $whereNegocios_array['negocios.situacao'] = "aberto";
        $this->data['oportunidade'] = $this->crm_model->getNegocios('negocios', 'negocios.idNegocio,negocios.idEmpresas,negocios.idContatos,negocios.faseDoFunil,negocios.vendedor,negocios.valorDoNegocio,negocios.nomeDoNegocio,negocios.totalProdutos,negocios.totalServicos,negocios.mensalidade,empresas.nomeEmpresa', $whereNegocios_array, 0, 0, '', 'negocios.dataCadastro', 'desc');
        $this->data['countOportunidade'] = $this->crm_model->countNegocios('negocios', $whereNegocios_array);
        $this->data['valorTotalOportunidade'] = $this->crm_model->valorTotalNegocios('negocios', $whereNegocios_array);

        $whereNegocios_array['negocios.faseDoFunil'] = 2;
        $whereNegocios_array['negocios.situacao'] = "aberto";
        $this->data['demoagendada'] = $this->crm_model->getNegocios('negocios', 'negocios.idNegocio,negocios.idEmpresas,negocios.idContatos,negocios.faseDoFunil,negocios.vendedor,negocios.valorDoNegocio,negocios.nomeDoNegocio,negocios.totalProdutos,negocios.totalServicos,negocios.mensalidade,empresas.nomeEmpresa', $whereNegocios_array, 0, 0, '', 'negocios.dataCadastro', 'desc');
        $this->data['countDemoagendada'] = $this->crm_model->countNegocios('negocios', $whereNegocios_array);
        $this->data['valorTotalDemoagendada'] = $this->crm_model->valorTotalNegocios('negocios', $whereNegocios_array);

        $whereNegocios_array['negocios.faseDoFunil'] = 3;
        $whereNegocios_array['negocios.situacao'] = "aberto";
        $this->data['propostaentregue'] = $this->crm_model->getNegocios('negocios', 'negocios.idNegocio,negocios.idEmpresas,negocios.idContatos,negocios.faseDoFunil,negocios.vendedor,negocios.valorDoNegocio,negocios.nomeDoNegocio,negocios.totalProdutos,negocios.totalServicos,negocios.mensalidade,empresas.nomeEmpresa', $whereNegocios_array, 0, 0, '', 'negocios.dataCadastro', 'desc');
        $this->data['countPropostaentregue'] = $this->crm_model->countNegocios('negocios', $whereNegocios_array);
        $this->data['valorTotalPropostaentregue'] = $this->crm_model->valorTotalNegocios('negocios', $whereNegocios_array);

        $whereNegocios_array['negocios.faseDoFunil'] = 4;
        $whereNegocios_array['negocios.situacao'] = "aberto";
        $this->data['emnegociacao'] = $this->crm_model->getNegocios('negocios', 'negocios.idNegocio,negocios.idEmpresas,negocios.idContatos,negocios.faseDoFunil,negocios.vendedor,negocios.valorDoNegocio,negocios.nomeDoNegocio,negocios.totalProdutos,negocios.totalServicos,negocios.mensalidade,empresas.nomeEmpresa', $whereNegocios_array, 0, 0, '', 'negocios.dataCadastro', 'desc');
        $this->data['countEmnegociacao'] = $this->crm_model->countNegocios('negocios', $whereNegocios_array);
        $this->data['valorTotalEmnegociacao'] = $this->crm_model->valorTotalNegocios('negocios', $whereNegocios_array);

        $whereGanho_array['situacao'] = "ganho";
        $this->data['ganho'] = $this->crm_model->getNegocios('negocios', 'negocios.idNegocio,negocios.idEmpresas,negocios.idContatos,negocios.faseDoFunil,negocios.vendedor,negocios.valorDoNegocio,negocios.nomeDoNegocio,negocios.totalProdutos,negocios.totalServicos,negocios.mensalidade,empresas.nomeEmpresa', $whereGanho_array, 0, 0, '', 'negocios.dataCadastro', 'desc');
        $this->data['countGanho'] = $this->crm_model->countNegocios('negocios', $whereGanho_array);
        $this->data['valorTotalGanho'] = $this->crm_model->valorTotalNegocios('negocios', $whereGanho_array);

        $wherePerdido_array['situacao'] = "perdido";
        $this->data['perdido'] = $this->crm_model->getNegocios('negocios', 'negocios.idNegocio,negocios.idEmpresas,negocios.idContatos,negocios.faseDoFunil,negocios.vendedor,negocios.valorDoNegocio,negocios.nomeDoNegocio,negocios.totalProdutos,negocios.totalServicos,negocios.mensalidade,empresas.nomeEmpresa', $wherePerdido_array, 0, 0, '', 'negocios.dataCadastro', 'desc');
        $this->data['countPerdido'] = $this->crm_model->countNegocios('negocios', $wherePerdido_array);
        $this->data['valorTotalPerdido'] = $this->crm_model->valorTotalNegocios('negocios', $wherePerdido_array);

        $this->data['seguimento'] = $this->crm_model->getConfig('seguimento_crm', 'idseguimento,descricao', '');
        $this->data['indicacao'] = $this->crm_model->getConfig('indicacao_crm', 'idindicacao,descricao', '');
        $this->data['status'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao,encerra', '');
        $this->data['usuarios'] = $this->crm_model->getConfig('usuarios', 'idusuarios,nome', '');

        $this->data['dadoslogin'] = $this->session->all_userdata();
        $this->data['results'] = $this->crm_model->get('negocios', 'idNegocio,idEmpresas,idContatos,faseDoFunil,vendedor', $whereNegocios_array, 0, $this->uri->segment(3), '', 'idNegocio', 'desc');

        $this->load->view('crm/negociosKanban', $this->data);
    }

    public function negociosLista() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mCrm')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/dashboard');
        }

        $this->load->library('table');
        $this->load->library('pagination');

        $dadoslogin = $this->session->all_userdata();
        $whereNegocios_array = array();
        $whereNegocios_array['negocios.vendedor'] = $dadoslogin['idusuarios'];

        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'oLead')) {
            $where_array['usuario'] = $dadoslogin['idusuarios'];
        }
        $config['base_url'] = base_url() . 'index.php/crm/negociosLista';
        $config['total_rows'] = $this->crm_model->countNegocios('negocios', $whereNegocios_array);
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


        // preciso pegar todos os crms,atribuidos separados por usuario e status


        $this->data['seguimento'] = $this->crm_model->getConfig('seguimento_crm', 'idseguimento,descricao', '');
        $this->data['indicacao'] = $this->crm_model->getConfig('indicacao_crm', 'idindicacao,descricao', '');
        $this->data['status'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao,encerra', '');
        $this->data['usuarios'] = $this->crm_model->getConfig('usuarios', 'idusuarios,nome', '');
        $this->data['count'] = $this->crm_model->countNegocios('negocios', $whereNegocios_array);
        $this->data['dadoslogin'] = $this->session->all_userdata();
        $this->data['results'] = $this->crm_model->getNegociosLista('negocios', 'negocios.idNegocio,negocios.idEmpresas,negocios.idContatos,negocios.faseDoFunil,negocios.vendedor,negocios.dataCadastro,negocios.dataFechamentoEsperada,negocios.situacao,empresas.segmento,empresas.nomeEmpresa,contatos.nomeContato,contatos.telefoneContato,contatos.whatsappContato,usuarios.nome', $whereNegocios_array, 0, $this->uri->segment(3), '', 'idNegocio', 'desc');

        $this->load->view('crm/negociosLista', $this->data);
    }

    public function addNegocios() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }
        $data['dadoslogin'] = $this->session->all_userdata();
        $vendedor = $this->session->all_userdata();

        $this->form_validation->set_rules('nomeEmpresa', 'Empresa', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {

            // recebe os dados do campo nomeEmpresa. Se é uma empresa selecionada
            //no campo select, ele traz o id da emprsa, se o texto não existir
            //ele traz o texto digitado
            $dadosEmpresa['nomeEmpresa'] = $this->input->post('nomeEmpresa');
            $dadosEmpresa['dataCadastro'] = date('Y/m/d');
            $dadosEmpresa['dataAlteracao'] = date('Y/m/d');


            //recebe os dados do contato
            $dadosContato['nomeContato'] = $this->input->post('nomeContato');
            $dadosContato['dataCadastro'] = date('Y/m/d');
            $dadosContato['dataAlteracao'] = date('Y/m/d');


            //testa para ver se existe o cadastro de empresa
            $existeCadastro = $this->crm_model->countEmpresaExiste($this->input->post('nomeEmpresa'));


            //se NÃO existir o cadastro de empresa, então cadastra empresa, contato e negocio
            if ($existeCadastro == 0) {

                if ($idEmpresas = $this->crm_model->add('empresas', $dadosEmpresa)) {
                    $dadosContato['idEmpresas'] = $idEmpresas;
                    $idContatos = $this->crm_model->add('contatos', $dadosContato);

                    $dadosNegocio['idEmpresas'] = $idEmpresas;
                    $dadosNegocio['idContatos'] = $idContatos;
                    $dadosNegocio['nomeDoNegocio'] = $this->input->post('nomeDoNegocio');
                    $dadosNegocio['vendedor'] = $vendedor['idusuarios'];
                    $dadosNegocio['valorDoNegocio'] = $this->input->post('valorDoNegocio');
                    $dadosNegocio['faseDoFunil'] = $this->input->post('faseDoFunil');
                    $dadosNegocio['dataFechamentoEsperada'] = $this->input->post('dataFechamentoEsperada');
                    $dadosNegocio['dataCadastro'] = date('Y/m/d');
                    $dadosNegocio['dataAlteracao'] = date('Y/m/d');
                    $dadosNegocio['situacao'] = "aberto";

                    $idNegocio = $this->crm_model->add('negocios', $dadosNegocio);
                    if ($idNegocio != 0) {
                        redirect(base_url() . 'index.php/crm/editNegocios/' . $idNegocio);
                    } else {
                        $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                    }
                }
            } else {
                //se existir o cadastro de empresa, então seleciona a empresa, 
                // seleciona o contato(apaga o que foi digitado) e cria o negocio

                $empresa = $this->crm_model->getByIdEmpresas($this->input->post('nomeEmpresa'));
                $contato = $this->crm_model->getByIdContatos($this->input->post('nomeEmpresa'));

                $dadosNegocio['idEmpresas'] = $empresa->idEmpresas;
                $dadosNegocio['idContatos'] = $contato->idContatos;

                $dadosNegocio['nomeDoNegocio'] = $this->input->post('nomeDoNegocio');
                $dadosNegocio['vendedor'] = $vendedor['idusuarios'];
                $dadosNegocio['valorDoNegocio'] = $this->input->post('valorDoNegocio');
                $dadosNegocio['faseDoFunil'] = $this->input->post('faseDoFunil');
                $dadosNegocio['dataFechamentoEsperada'] = $this->input->post('dataFechamentoEsperada');
                $dadosNegocio['dataCadastro'] = date('Y/m/d');
                $dadosNegocio['dataAlteracao'] = date('Y/m/d');
                $dadosNegocio['situacao'] = "aberto";

                $idNegocio = $this->crm_model->add('negocios', $dadosNegocio);
                if ($idNegocio != 0) {
                    redirect(base_url() . 'index.php/crm/editNegocios/' . $idNegocio);
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }

        $data['status'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao', 'status=1');
        $this->load->view('crm/adicionarNegocios', $data);
        // $this->load->view('crm/adicionarLead', $data);
    }

    public function editNegocios() {
        //checa se o usuário tem permissão de acessso a esta função
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eLead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        //verifica se o codigo passado no endereço do navegador é de um lead existente
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('empresa/gerenciar');
        }

        //faz a validação dos dados  que chegaram via post
        $this->form_validation->set_rules('idNegocio', 'idNegocio', 'trim|required');

        //se não passou na validação, devolve para a view os erros dos campos encontrados
        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();

            //se passou na validação, recebe os dados via post e atribui nas variáveis
        } else {

            $dadosNegocio['idNegocio'] = $this->input->post('idNegocio');
            $dadosNegocio['nomeDoNegocio'] = $this->input->post('nomeDoNegocio');
            $dadosNegocio['valorDoNegocio'] = $this->input->post('valorDoNegocio');
            $dadosNegocio['mensalidade'] = $this->input->post('mensalidade');
            $dadosNegocio['faseDoFunil'] = $this->input->post('faseDoFunil');
            $dadosNegocio['dataFechamentoEsperada'] = $this->input->post('dataFechamentoEsperada');
            $dadosNegocio['dataAlteracao'] = date('Y/m/d');
            $dadosNegocio['situacao'] = "aberto";

            if ($this->crm_model->edit('negocios', $dadosNegocio, 'idNegocio', $dadosNegocio['idNegocio']) == TRUE) {
                redirect(base_url() . 'index.php/crm/editNegocios/' . $dadosNegocio['idNegocio']);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }

        $where_array3 = array();
        $where_array3['idLead_proposta'] = $this->uri->segment(3);

        //pega id da empresa deste negocio para utilizar na pesquisa da empresa
        $empresa = $this->crm_model->getById($this->uri->segment(3));

        //$data['statusfunil'] = $this->empresa_model->getConfig('status_empresa', 'idstatus,descricao,encerra', $where_array);
        //$data['statusencerra'] = $this->empresa_model->getConfig('status_crm', 'idstatus,descricao', $where_array2);
        $data['status'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao,encerra', 'encerra=0');
        $data['segmento'] = $this->crm_model->getConfig('seguimento_crm', 'idseguimento,descricao', 'status=1');
        $data['indicacao'] = $this->crm_model->getConfig('indicacao_crm', 'idindicacao,descricao', 'status=1');
        $data['timelineNegocios'] = $this->crm_model->getTimelineNegocios($this->uri->segment(3));
        $data['dadoslogin'] = $this->session->all_userdata();
        $data['permissao'] = $this->crm_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['usuarios'] = $this->crm_model->getConfig('usuarios', 'idusuarios,nome', '');
        $data['negocios'] = $this->crm_model->getById($this->uri->segment(3));
        $data['tarefas'] = $this->crm_model->getTarefas($this->uri->segment(3));
        $data['empresa'] = $this->crm_model->getByIdEmpresas($empresa->idEmpresas);
        $data['contato'] = $this->crm_model->getByIdContato($empresa->idEmpresas);
        $data['proposta'] = $this->crm_model->getPropostas('propostas', 'numpropostas,fantasia,contato,data,status', $where_array3, '');
        $data['agenda'] = $this->crm_model->getConfig('calendario', 'id,title,color,start,end', $where_array3);
        $data['tipo'] = $this->crm_model->getConfig('tipo_empresa', 'idTipoEmpresa,descricao', 'status=1');


        $this->load->view('crm/alterarNegocios', $data);
    }

    public function negocioGanho() {
        //checa se o usuário tem permissão de acessso a esta função
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eLead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        //faz a validação dos dados  que chegaram via post
        $this->form_validation->set_rules('idNegocio', 'idNegocio', 'trim|required');

        //se não passou na validação, devolve para a view os erros dos campos encontrados
        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();

            //se passou na validação, recebe os dados via post e atribui nas variáveis
        } else {

            $dadosNegocio['idNegocio'] = $this->input->post('idNegocio');
            $dadosNegocio['nomeDoNegocio'] = $this->input->post('nomeDoNegocio');
            $dadosNegocio['valorDoNegocio'] = $this->input->post('valorDoNegocio');
            $dadosNegocio['faseDoFunil'] = $this->input->post('faseDoFunil');
            $dadosNegocio['dataFechamentoEsperada'] = $this->input->post('dataFechamentoEsperada');
            $dadosNegocio['dataAlteracao'] = date('Y/m/d');
            $dadosNegocio['dataEncerra'] = date('Y/m/d');
            $dadosNegocio['situacao'] = "ganho";

            if ($this->crm_model->edit('negocios', $dadosNegocio, 'idNegocio', $dadosNegocio['idNegocio']) == TRUE) {
                redirect(base_url() . 'index.php/crm/negociosKanban');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
    }

    public function negocioPerdido() {
        //checa se o usuário tem permissão de acessso a esta função
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eLead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        //faz a validação dos dados  que chegaram via post
        $this->form_validation->set_rules('idNegocio', 'idNegocio', 'trim|required');

        //se não passou na validação, devolve para a view os erros dos campos encontrados
        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();

            //se passou na validação, recebe os dados via post e atribui nas variáveis
        } else {

            $dadosNegocio['idNegocio'] = $this->input->post('idNegocio');
            $dadosNegocio['nomeDoNegocio'] = $this->input->post('nomeDoNegocio');
            $dadosNegocio['valorDoNegocio'] = $this->input->post('valorDoNegocio');
            $dadosNegocio['faseDoFunil'] = $this->input->post('faseDoFunil');
            $dadosNegocio['dataFechamentoEsperada'] = $this->input->post('dataFechamentoEsperada');
            $dadosNegocio['dataAlteracao'] = date('Y/m/d');
            $dadosNegocio['dataEncerra'] = date('Y/m/d');
            $dadosNegocio['situacao'] = "perdido";
            $dadosNegocio['motivoPerda'] = $this->input->post('motivoPerda');

            if ($this->crm_model->edit('negocios', $dadosNegocio, 'idNegocio', $dadosNegocio['idNegocio']) == TRUE) {
                redirect(base_url() . 'index.php/crm/negociosKanban');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
    }

    public function adicionarTarefas() {
        //checa se o usuário tem permissão de acessso a esta função
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eLead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }
        date_default_timezone_set('America/Sao_Paulo');

        //faz a validação dos dados  que chegaram via post
        $this->form_validation->set_rules('idNegocio', 'idNegocio', 'trim|required');

        //se não passou na validação, devolve para a view os erros dos campos encontrados
        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();

            //se passou na validação, recebe os dados via post e atribui nas variáveis
        } else {

            $dadosNegocio['idNegocio'] = $this->input->post('idNegocio');
            $dadosNegocio['titulo'] = $this->input->post('titulo');
            $dadosNegocio['descricao'] = $this->input->post('descricao');
            $dadosNegocio['vendedor'] = $this->session->idusuarios;
            $dadosNegocio['tipo'] = $this->input->post('tipo');
            $dadosNegocio['icone'] = $this->input->post('icone');
            $dadosNegocio['data'] = $this->input->post('data');
            $dadosNegocio['status'] = "aberto";

            $dateTimeline = new DateTime($this->input->post('data'));
            $dadosTimeline['idNegocio'] = $this->input->post('idNegocio');
            $dadosTimeline['descricao'] = "<strong>TAREFA CRIADA <br>Título: </strong>" . $this->input->post('titulo') . "<strong> Data: </strong>" . $dateTimeline->format('d-m-Y / H:i') . "<br><br>" . "<strong>Descricao: </strong>" . $this->input->post('descricao');
            $dadosTimeline['nome'] = $this->session->nome;
            $dadosTimeline['tipo'] = $this->input->post('icone');
            $dadosTimeline['data'] = date('d-m-Y H:i');

            if ($this->crm_model->add('tarefas_negocios', $dadosNegocio) == TRUE) {
                $this->crm_model->add('timeline_negocios', $dadosTimeline);
                redirect(base_url() . 'index.php/crm/editNegocios/' . $this->input->post('idNegocio'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
    }

    public function alterarTarefas() {
        //checa se o usuário tem permissão de acessso a esta função
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eLead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }
        date_default_timezone_set('America/Sao_Paulo');

        //faz a validação dos dados  que chegaram via post
        $this->form_validation->set_rules('idNegocio', 'idNegocio', 'trim|required');

        //se não passou na validação, devolve para a view os erros dos campos encontrados
        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();

            //se passou na validação, recebe os dados via post e atribui nas variáveis
        } else {
            $dadosTarefa['idTarefasNegocios'] = $this->input->post('idTarefasNegocios');
            $dadosTarefa['idNegocio'] = $this->input->post('idNegocio');
            $dadosTarefa['titulo'] = $this->input->post('titulo');
            $dadosTarefa['descricao'] = $this->input->post('descricao');
            $dadosTarefa['vendedor'] = $this->session->idusuarios;
            $dadosTarefa['tipo'] = $this->input->post('tipo');
            $dadosTarefa['icone'] = $this->input->post('icone');
            $dadosTarefa['data'] = $this->input->post('data');
            $dadosTarefa['status'] = $this->input->post('status');
            ;
            $tarefaAlteradaEncerrada = $this->input->post('tarefaAlteradaEncerrada');

            $dateTimeline = new DateTime($this->input->post('data'));
            $dadosTimeline['idNegocio'] = $this->input->post('idNegocio');
            $dadosTimeline['descricao'] = "<strong>" . $tarefaAlteradaEncerrada . "</strong> <br>" . "<strong>Título: </strong>" . $this->input->post('titulo') . "<strong> Data: </strong>" . $dateTimeline->format('d-m-Y / H:i') . "<br><br>" . "<strong>Descricao: </strong>" . $this->input->post('descricao');
            $dadosTimeline['nome'] = $this->session->nome;
            $dadosTimeline['tipo'] = $this->input->post('icone');
            $dadosTimeline['data'] = date('d-m-Y H:i');

            if ($this->crm_model->edit('tarefas_negocios', $dadosTarefa, 'idTarefasNegocios', $this->input->post('idTarefasNegocios')) == TRUE) {
                if ($this->input->post('registraNaTimeline') == "sim") {
                    $this->crm_model->add('timeline_negocios', $dadosTimeline);
                }
                redirect(base_url() . 'index.php/crm/editNegocios/' . $this->input->post('idNegocio'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
    }

    function excluirTarefas() {

        $ID = $this->input->post('idTarefasNegocios');

        if ($this->crm_model->delete('tarefas_negocios', 'idTarefasNegocios', $ID) == true) {

            redirect(base_url() . 'index.php/crm/editNegocios/' . $this->input->post('idNegocio'));
        } else {
            echo json_encode(array('result' => false));
        }
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

    public function excluirCRM() {

        $idcrm = $this->input->post('idcrmExcluir');
        $where_idcrm['idLead_proposta'] = $idcrm;

        $where_proposta = $this->crm_model->getPropostas('propostas', 'numpropostas', $where_idcrm, '');
//        var_dump($where_proposta);
        if ($this->crm_model->delete('crm', 'idcrm', $idcrm) == true) {
            $this->crm_model->delete('propostas', 'idLead_proposta', $idcrm);
            foreach ($where_proposta as $r) {
                $this->crm_model->deleteProposta('produtos_proposta', $r->numpropostas);
                $this->crm_model->deleteProposta('modulos_proposta', $r->numpropostas);
                $this->crm_model->deleteProposta('servicos_proposta', $r->numpropostas);
            }
            $this->crm_model->delete('calendario', 'idLead_Proposta', $idcrm);
            $this->crm_model->delete('timeline_crm', 'idcrm', $idcrm);
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function atribuir() {
        $dados['atribuido'] = 1;
        $dados['usuario'] = $this->input->post('vendedoratribuir');

        if ($this->crm_model->edit('negocios', $dados, 'idNegocios', $this->input->post('idNegocios')) == true) {

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

        $data['seguimento'] = $this->crm_model->getConfig('seguimento_crm', 'idseguimento,descricao', 'status=1');
        $data['indicacao'] = $this->crm_model->getConfig('indicacao_crm', 'idindicacao,descricao', 'status=1');
        $data['statusfunil'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao,encerra', $where_array);
        $data['statusencerra'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao', $where_array2);
        $data['timeline'] = $this->crm_model->getTimeline($this->uri->segment(3));
        $data['dadoslogin'] = $this->session->all_userdata();
        $data['permissao'] = $this->crm_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->crm_model->getById($this->uri->segment(3));
        $data['proposta'] = $this->crm_model->getPropostas('propostas', 'numpropostas,fantasia,contato,data,status', $where_array3, '');

        $this->load->view('crm/visualizarLead', $data);
    }

    public function gerenciarstatus() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mStatuslead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'crm/gerenciarstatus';
        $config['total_rows'] = $this->crm_model->count('status_crm');
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

        $this->data['results'] = $this->crm_model->get('status_crm', 'idstatus,descricao,status', '', $config['per_page'], $this->uri->segment(3), '', 'idstatus', '');

        $this->load->view('crm/config/status/gerenciarStatus', $this->data);
    }

    public function addstatus() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aStatuslead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['posicaoMenu'] = $this->input->post('posicaoMenu');
            $dados['status'] = $this->input->post('status');
            $dados['encerra'] = $this->input->post('encerra');

            $idLead = $this->crm_model->add('status_crm', $dados);
            if ($idLead != 0) {
                redirect(base_url() . 'index.php/crm/editstatus/' . $idLead);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['dadoslogin'] = $this->session->all_userdata();
        $this->load->view('crm/config/status/adicionarStatus', $data);
    }

    public function editstatus() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eStatuslead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/usuario');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['posicaoMenu'] = $this->input->post('posicaoMenu');
            $dados['status'] = $this->input->post('status');
            $dados['encerra'] = $this->input->post('encerra');


            if ($this->crm_model->edit('status_crm', $dados, 'idstatus', $this->input->post('idstatus')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/crm/editstatus/' . $this->input->post('idstatus'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['permissao'] = $this->crm_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->crm_model->getByIdStatus($this->uri->segment(3));
        $this->load->view('crm/config/status/alterarStatus', $data);
    }

    public function gerenciarindicacao() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mIndicacaolead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/crm/gerenciarindicacao';
        $config['total_rows'] = $this->crm_model->count('indicacao_crm');
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

        $this->data['results'] = $this->crm_model->get('indicacao_crm', 'idindicacao,descricao,status', '', $config['per_page'], $this->uri->segment(3), '', 'idindicacao', '');

        $this->load->view('crm/config/indicacao/gerenciarIndicacao', $this->data);
    }

    public function addindicacao() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aIndicacaolead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');

            $idLead = $this->crm_model->add('indicacao_crm', $dados);
            if ($idLead != 0) {
                redirect(base_url() . 'index.php/crm/editIndicacao/' . $idLead);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['dadoslogin'] = $this->session->all_userdata();
        $this->load->view('crm/config/indicacao/adicionarIndicacao', $data);
    }

    public function editindicacao() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eIndicacaolead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/usuario');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');


            if ($this->crm_model->edit('indicacao_crm', $dados, 'idindicacao', $this->input->post('idindicacao')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/crm/editindicacao/' . $this->input->post('idindicacao'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['permissao'] = $this->crm_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->crm_model->getByIdConfig($this->uri->segment(3), 'idindicacao', 'indicacao_crm');
        $this->load->view('crm/config/indicacao/alterarIndicacao', $data);
    }

    public function gerenciarseguimento() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mSeguimentolead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/crm/gerenciarseguimento';
        $config['total_rows'] = $this->crm_model->count('seguimento_crm');
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

        $this->data['results'] = $this->crm_model->get('seguimento_crm', 'idseguimento,descricao,status', '', $config['per_page'], $this->uri->segment(3), '', 'idseguimento', '');

        $this->load->view('crm/config/seguimento/gerenciarSeguimento', $this->data);
    }

    public function addseguimento() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aSeguimentolead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');

            $idLead = $this->crm_model->add('seguimento_crm', $dados);
            if ($idLead != 0) {
                redirect(base_url() . 'index.php/crm/editSeguimento/' . $idLead);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['dadoslogin'] = $this->session->all_userdata();
        $this->load->view('crm/config/seguimento/adicionarSeguimento', $data);
    }

    public function editseguimento() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eSeguimentolead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/usuario');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');


            if ($this->crm_model->edit('seguimento_crm', $dados, 'idseguimento', $this->input->post('idseguimento')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/crm/editseguimento/' . $this->input->post('idseguimento'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['permissao'] = $this->crm_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->crm_model->getByIdConfig($this->uri->segment(3), 'idseguimento', 'seguimento_crm');
        $this->load->view('crm/config/seguimento/alterarSeguimento', $data);
    }

    public function adicionarTimeline() {
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d-m-Y H:i');
        $idNegocio = $this->input->post('idNegocio');
        $descricao = $this->input->post('descricao');
        $tipo = $this->input->post('tipo');
        $nome = $this->session->nome;




        $data = array(
            'idNegocio' => $idNegocio,
            'descricao' => $descricao,
            'nome' => $nome,
            'tipo' => $tipo,
            'data' => $data
        );

        if ($this->crm_model->add('timeline_negocios', $data) == true) {
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    function excluirTimeline() {

        $ID = $this->input->post('idTimeline_negocios');
        if ($this->crm_model->delete('timeline_negocios', 'idTimeline_negocios', $ID) == true) {

            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function autocompleteCliente() {
        $term = $this->input->get('term');
        $data = $this->crm_model->getEmpresa($term);
        echo json_encode($data);
//        if ($tipo == "cpf") {
//            $this->db->like('nome', $term);
//            $data = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=cnpj%20like%20(%27%%25' . $term . '%%25%27)');
//            echo $data;
//        }
//        if ($tipo == "razao") {
//            $this->db->like('nome', $term);
//            $data = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=nome%20like%20(%27%%25' . $term . '%%25%27)');
//            echo $data;
//        }
//
//        if ($tipo == "fantasia") {
//            $this->db->like('nome', $term);
//            $data = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=fantasia%20like%20(%27%%25' . $term . '%%25%27)');
//            echo $data;
//        }
    }

}
