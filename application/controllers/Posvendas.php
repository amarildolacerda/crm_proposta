<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Posvendas extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        $this->load->model('Posvendas_model');
    }

    public function index() {
        $this->gerenciar();
    }

    public function gerenciar() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vUsuario')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar Usuários.');
            redirect(base_url() . 'index.php/dashboard');
        }

        $this->load->library('table');
        $this->load->library('pagination');


        $config['base_url'] = base_url() . 'index.php/posvendas/gerenciar/';
        $config['total_rows'] = $this->Posvendas_model->count('posvendas');
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

        $this->data['results'] = $this->Posvendas_model->get('posvendas', 'idposvendas,codigoCliente,nomeCliente,emailCliente,mensagemEnviada,status', '', $config['per_page'], $this->uri->segment(3));
        $this->data['dadoslogin'] = $this->session->all_userdata();

        $this->load->view('posvendas/gerenciarPosvendas', $this->data);
    }

    public function dadosVenda() {
        date_default_timezone_set('America/Sao_Paulo');
        $data_atual = date('Y-m-d', strtotime("-7 days"));
        echo $data_atual;
        $dataVenda = file_get_contents('http://localhost:8886/OData/OData.svc/vendas?select=nome&$filter=data=%22' . $data_atual . '%22 and clifor!=0');
        $dataVenda = json_decode($dataVenda);

        $array = array(); // novo array para colocar somente os codigos de clientes
        for ($i = 0; $i < sizeof($dataVenda->value); $i++) {
            array_push($array, $dataVenda->value[$i]->clifor); // insere os codigos de clientes no array
        }

        $arraySemRepetidos = array_unique($array); // retira elementos repetidos do array

        $clientesPosVendas = (array_values($arraySemRepetidos)); //array com os codigos de clientes que precisam fazer pos vendas
        //  var_dump($clientesPosVendas);

        $arrayEmail = array(); // novo array para colocar somente os codigos de clientes
        for ($i = 0; $i < sizeof($clientesPosVendas); $i++) {
            $dataCliente = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=codigo eq ' . $clientesPosVendas[$i] . '');
            $dataCliente = json_decode($dataCliente);
            array_push($arrayEmail, $dataCliente->value[0]->email); // insere os codigos de clientes no array
        }

        $mensagem = "OLa meu amigo";
        $dados['codigoCliente'] = $dataCliente->value[0]->codigo;
        $dados['nomeCliente'] = $dataCliente->value[0]->nome;
        $dados['emailCliente'] = $dataCliente->value[0]->email;
        $dados['mensagemEnviada'] = $mensagem;
        $dados['status'] = '1';
        
        if ($this->Posvendas_model->adicionar($dados) == TRUE) {
            
        } else {
            $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
        }

        var_dump($dataCliente->value[0]);

//        $arrayEmail2 = array(); // novo array para colocar o json de consulta de dados do cliente
//        for ($i = 0; $i < sizeof($clientesPosVendas); $i++) {
//            $dataCliente2 = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=codigo eq ' . $clientesPosVendas[$i] . ''); // link para pegar dados do cliente no odata passando codigo como parametro
//            array_push($arrayEmail2, $dataCliente2); // insere dados do cliente no array
//        }
//        
//        if (sizeof($arrayEmail2) > 0) {
//            for ($i = 0; $i < sizeof($arrayEmail2); $i++) {
//                $dataCliente3 = json_decode($arrayEmail2[$i]);
//                $this->emailPos($dataCliente3->value[0]->email, $dataCliente3->value[0]->nome); // chama a função de enviar email passando o cliente
//            }
//        } else
//            echo "Nada";
        // echo "Nome: ".$dataCliente3->value[0]->nome ." e-mail: ".$dataCliente3->value[0]->email;
        // $this->emailPos($dataCliente3->value[0]->email,$dataCliente3->value[0]->nome); // chama a função de enviar email passando o cliente
    }

    public function compra() {
        date_default_timezone_set('America/Sao_Paulo');
        $data_atual = date('Y-m-d', strtotime("-7 days"));
        echo $data_atual;
        $dataVenda = file_get_contents('http://localhost:8886/OData/OData.svc/vendas?select=nome&$filter=data=%22' . $data_atual . '%22 and clifor!=0');
        $dataVenda = json_decode($dataVenda);

        $array = array(); // novo array para colocar somente os codigos de clientes
        for ($i = 0; $i < sizeof($dataVenda->value); $i++) {
            array_push($array, $dataVenda->value[$i]->clifor); // insere os codigos de clientes no array
        }

        $arraySemRepetidos = array_unique($array); // retira elementos repetidos do array

        $clientesPosVendas = (array_values($arraySemRepetidos)); //array com os codigos de clientes que precisam fazer pos vendas
        //  var_dump($clientesPosVendas);

        $arrayEmail = array(); // novo array para colocar somente os codigos de clientes
        for ($i = 0; $i < sizeof($clientesPosVendas); $i++) {
            $dataCliente = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=codigo eq ' . $clientesPosVendas[$i] . '');
            $dataCliente = json_decode($dataCliente);
            array_push($arrayEmail, $dataCliente->value[0]->email); // insere os codigos de clientes no array
        }

        $arrayEmail2 = array(); // novo array para colocar o json de consulta de dados do cliente
        for ($i = 0; $i < sizeof($clientesPosVendas); $i++) {
            $dataCliente2 = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=codigo eq ' . $clientesPosVendas[$i] . ''); // link para pegar dados do cliente no odata passando codigo como parametro
            array_push($arrayEmail2, $dataCliente2); // insere dados do cliente no array
        }

        if (sizeof($arrayEmail2) > 0) {
            for ($i = 0; $i < sizeof($arrayEmail2); $i++) {
                $dataCliente3 = json_decode($arrayEmail2[$i]);
                $this->emailPos($dataCliente3->value[0]->email, $dataCliente3->value[0]->nome); // chama a função de enviar email passando o cliente
            }
        } else
            echo "Nada";


        // echo "Nome: ".$dataCliente3->value[0]->nome ." e-mail: ".$dataCliente3->value[0]->email;
        // $this->emailPos($dataCliente3->value[0]->email,$dataCliente3->value[0]->nome); // chama a função de enviar email passando o cliente
    }

    public function emailPos($destino, $nome) {

        $dadoslogin = $this->session->all_userdata();
        $this->load->config('email');
        $this->load->library('email');


        //$destino = $dataCliente3->value[0]->email;
        $assunto = "Pós vendas WBAGESTÃO";
        $mensagem = "Olá " . $nome . ", obrigado por comprar conosco. <br>Nos ajude a melhorar nossa qualidade de atendimento respondendo a pesquisa no link. <br><br> São poucas perguntas acessa la http://www.wbagestao.com ";
        $from = $this->config->item('smtp_user');


        if ($destino) {
            $this->email->from($from, $dadoslogin['nome']);
            $this->email->to($destino);
            $this->email->subject($assunto);
            $this->email->message($mensagem);
            //$this->email->attach("C:\Users\gabri\Desktop\locapas.txt");

            if ($this->email->send())
                return 1;
            else
                show_error($this->email->print_debugger());
        }
    }

}
