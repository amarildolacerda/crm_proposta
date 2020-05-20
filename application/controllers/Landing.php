<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Landing_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function storepet() {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
           //your site secret key
        $secret = '6Lfl9fUUAAAAADy1fPUqBJC9AlpD7l2vfNA8QVaz';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$this->input->post('g-recaptcha-response'));
        $responseData = json_decode($verifyResponse);
        var_dump($responseData);
        if($responseData->success):

             print_r("Working Fine"); exit;
        else:
             print_r("No valid Key"); exit;
        endif;
//    } else {
//        print_r("Not Working Captcha"); exit;
//    }
        }
        $this->load->view('landing/adicionarLanding');
    }

    public function storefood() {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['empresa'] = "Não informado";
            $dados['nome'] = $this->input->post('nome');
            $dados['cnpj'] = "Não informado";
            $dados['whatsapp'] = "Não informado";
            $dados['telefone'] = $this->input->post('telefone');
            $dados['email'] = $this->input->post('email');
            $dados['cargo'] = "Não informado";
            $dados['endereco'] = "Não informado";
            $dados['bairro'] = "Não informado";
            $dados['cidade'] = $this->input->post('cidade');
            $dados['status'] = 1;
            $dados['probabilidade'] = 20;
            $dados['fonte'] = $this->input->post('fonte');
            $dados['concorrente'] = "Não informado";
            $dados['seguimento'] = 15;
            $dados['data'] = date('Y/m/d');
            $dados['data_alteracao'] = date('Y/m/d');
            $dados['possuisistema'] = 2;
            $dados['usuario'] = 0;
            $dados['atribuido'] = 0;
            $spam = $this->input->post('spam');

            if ($spam != '') {
                redirect("http://www.wbagestao.com.br/");
            } else {

                $idLead = $this->Landing_model->add('crm', $dados);
                if ($idLead != 0) {
                    $data = $this->telegram_lib->sendmsg("Você recebeu uma nova mensagem pelo site.\n\n Cliente: " . $dados['nome'] . "\n Telefone: " . $dados['telefone'] . "\n E-mail: " . $dados['email'] . "\n Cidade: " . $dados['cidade']);

                    date_default_timezone_set('America/Sao_Paulo');
                    $descricao = "Recebido pelo site: " . $this->input->post('mensagem');
                    $nome = "Site";
                    $timeline = array(
                        'idcrm' => $idLead,
                        'descricao' => $descricao,
                        'nome' => $nome,
                        'data' => date('d-m-Y H:i')
                    );
                    $this->load->model('crm_model');
                    $this->crm_model->add('timeline_crm', $timeline);
                    redirect("http://www.wbagestao.com.br/");
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }
        $this->load->view('landing/adicionarLanding', $data);
    }

    public function storeware() {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['empresa'] = "Não informado";
            $dados['nome'] = $this->input->post('nome');
            $dados['cnpj'] = "Não informado";
            $dados['whatsapp'] = "Não informado";
            $dados['telefone'] = $this->input->post('telefone');
            $dados['email'] = $this->input->post('email');
            $dados['cargo'] = "Não informado";
            $dados['endereco'] = "Não informado";
            $dados['bairro'] = "Não informado";
            $dados['cidade'] = $this->input->post('cidade');
            $dados['status'] = 1;
            $dados['probabilidade'] = 20;
            $dados['fonte'] = $this->input->post('fonte');
            $dados['concorrente'] = "Não informado";
            $dados['seguimento'] = 15;
            $dados['data'] = date('Y/m/d');
            $dados['data_alteracao'] = date('Y/m/d');
            $dados['possuisistema'] = 2;
            $dados['usuario'] = 0;
            $dados['atribuido'] = 0;
            $spam = $this->input->post('spam');

            if ($spam != '') {
                redirect("http://www.wbagestao.com.br/");
            } else {
                $idLead = $this->Landing_model->add('crm', $dados);
                if ($idLead != 0) {
                    $data = $this->telegram_lib->sendmsg("Você recebeu uma nova mensagem pelo site.\n\n Cliente: " . $dados['nome'] . "\n Telefone: " . $dados['telefone'] . "\n E-mail: " . $dados['email'] . "\n Cidade: " . $dados['cidade']);

                    date_default_timezone_set('America/Sao_Paulo');
                    $descricao = "Recebido pelo site: " . $this->input->post('mensagem');
                    $nome = "Site";
                    $timeline = array(
                        'idcrm' => $idLead,
                        'descricao' => $descricao,
                        'nome' => $nome,
                        'data' => date('d-m-Y H:i')
                    );
                    $this->load->model('crm_model');
                    $this->crm_model->add('timeline_crm', $timeline);
                    redirect("http://www.wbagestao.com.br/");
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }
        $this->load->view('landing/adicionarLanding', $data);
    }

    public function ebook10dicas() {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['empresa'] = "Não informado";
            $dados['nome'] = $this->input->post('nome');
            $dados['cnpj'] = "Não informado";
            $dados['whatsapp'] = "Não informado";
            $dados['telefone'] = $this->input->post('telefone');
            $dados['email'] = $this->input->post('email');
            $dados['cargo'] = "Não informado";
            $dados['endereco'] = "Não informado";
            $dados['bairro'] = "Não informado";
            $dados['cidade'] = $this->input->post('cidade');
            $dados['status'] = 1;
            $dados['probabilidade'] = 20;
            $dados['fonte'] = $this->input->post('fonte');
            $dados['concorrente'] = "Não informado";
            $dados['seguimento'] = 15;
            $dados['data'] = date('Y/m/d');
            $dados['data_alteracao'] = date('Y/m/d');
            $dados['possuisistema'] = 2;
            $dados['usuario'] = 0;
            $dados['atribuido'] = 0;
            $spam = $this->input->post('spam');

            if ($spam != '') {
                redirect("http://www.wbagestao.com.br/");
            } else {

                $idLead = $this->Landing_model->add('crm', $dados);
                if ($idLead != 0) {
                    $data = $this->telegram_lib->sendmsg("Você recebeu uma nova mensagem pelo site.\n\n Cliente: " . $dados['nome'] . "\n Telefone: " . $dados['telefone'] . "\n E-mail: " . $dados['email'] . "\n Cidade: " . $dados['cidade']);

                    date_default_timezone_set('America/Sao_Paulo');
                    $descricao = "Recebido pelo site: " . $this->input->post('mensagem');
                    $nome = "Site";
                    $timeline = array(
                        'idcrm' => $idLead,
                        'descricao' => $descricao,
                        'nome' => $nome,
                        'data' => date('d-m-Y H:i')
                    );
                    $this->load->model('crm_model');
                    $this->crm_model->add('timeline_crm', $timeline);

                    $this->load->view('landing/teste');
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }
        $this->load->view('landing/adicionarLanding', $data);
    }

    public function websummit() {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['empresa'] = "Não informado";
            $dados['nome'] = $this->input->post('nome');
            $dados['cnpj'] = "Não informado";
            $dados['whatsapp'] = "Não informado";
            $dados['telefone'] = $this->input->post('telefone');
            $dados['email'] = $this->input->post('email');
            $dados['cargo'] = "Não informado";
            $dados['endereco'] = "Não informado";
            $dados['bairro'] = "Não informado";
            $dados['cidade'] = $this->input->post('cidade');
            $dados['status'] = 1;
            $dados['probabilidade'] = 20;
            $dados['fonte'] = $this->input->post('fonte');
            $dados['concorrente'] = "Não informado";
            $dados['seguimento'] = 15;
            $dados['data'] = date('Y/m/d');
            $dados['data_alteracao'] = date('Y/m/d');
            $dados['possuisistema'] = 2;
            $dados['usuario'] = 0;
            $dados['atribuido'] = 0;
            $spam = $this->input->post('spam');

            if ($spam != '') {
                redirect("http://www.wbagestao.com.br/");
            } else {

                $idLead = $this->Landing_model->add('crm', $dados);
                if ($idLead != 0) {
                    $data = $this->telegram_lib->sendmsg("Você recebeu uma nova mensagem pelo site.\n\n Cliente: " . $dados['nome'] . "\n Telefone: " . $dados['telefone'] . "\n E-mail: " . $dados['email'] . "\n Cidade: " . $dados['cidade']);

                    date_default_timezone_set('America/Sao_Paulo');
                    $descricao = "Recebido pelo site: " . $this->input->post('mensagem');
                    $nome = "Site";
                    $timeline = array(
                        'idcrm' => $idLead,
                        'descricao' => $descricao,
                        'nome' => $nome,
                        'data' => date('d-m-Y H:i')
                    );
                    $this->load->model('crm_model');
                    $this->crm_model->add('timeline_crm', $timeline);
                    redirect("http://wbagestao.com/download-storepet/");
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }
        $this->load->view('landing/adicionarLanding', $data);
    }

    public function estouEntregando() {

        $dados['empresa'] = $this->input->post('empresa');
        $dados['nome'] = "Não informado";
        $dados['cnpj'] = "Não informado";
        $dados['whatsapp'] = $this->input->post('whatsapp');
        $dados['telefone'] = $this->input->post('telefone');
        if ($dados['telefone'] == null) {
            $dados['telefone'] = "Não informado";
        };
        $dados['email'] = "nao@nao.com.br";
        $dados['cargo'] = "Não informado";
        $dados['endereco'] = $this->input->post('endereco');
        if ($dados['endereco'] == null) {
            $dados['endereco'] = "Não informado";
        };
        $dados['bairro'] = $this->input->post('bairro');
        $dados['cidade'] = $this->input->post('cidade') . "/" . $this->input->post('estado');
        $dados['status'] = 1;
        $dados['probabilidade'] = 20;
        $dados['fonte'] = 33;
        $dados['concorrente'] = "Não informado";
        $dados['seguimento'] = 15;
        $dados['data'] = date('Y/m/d');
        $dados['data_alteracao'] = date('Y/m/d');
        $dados['possuisistema'] = 2;
        $dados['usuario'] = 0;
        $dados['atribuido'] = 0;

        $idLead = $this->Landing_model->add('crm', $dados);
        if ($idLead != 0) {
            $data = $this->telegram_lib->sendmsg("Novo cadastro estou entregando.\n\n Empresa: " . $dados['empresa'] . "\n Telefone: " . $dados['telefone'] . "\n Whatsapp: " . $dados['whatsapp'] . "\n Cidade: " . $dados['cidade'] . "\n O que entrega: " . $this->input->post('oQueEntrega'));

            date_default_timezone_set('America/Sao_Paulo');
            $descricao = "Recebido pelo site: " . "\n O que entrega: " . $this->input->post('oQueEntrega') . "\n Dados app entrega: " . $this->input->post('dadosAppEntrega');
            $nome = "APP Estou Entregando";
            $timeline = array(
                'idcrm' => $idLead,
                'descricao' => $descricao,
                'nome' => $dados['empresa'],
                'data' => date('d-m-Y H:i')
            );
            $this->load->model('crm_model');
            $this->crm_model->add('timeline_crm', $timeline);
        } else {
            $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
        }
    }

}
