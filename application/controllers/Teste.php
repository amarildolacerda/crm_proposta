<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }

        $this->load->model('teste_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

   public function index(){
        $data = array();
        
        // Get posts data from the database
        $conditions['order_by'] = "idcrm DESC";
        $conditions['limit'] = 4;
        $data['posts'] = $this->teste_model->getRows($conditions);
        
        // Pass the post data to view
        $this->load->view('teste/teste', $data);
    }
    
    function loadMoreData(){
        $conditions = array();
        
        // Get last post ID
        $lastID = $this->input->post('idcrm');
        
        // Get post rows num
        $conditions['where'] = array('idcrm <'=>$lastID);
        $conditions['returnType'] = 'count';
        $data['postNum'] = $this->teste_model->getRows($conditions);
        
        // Get posts data from the database
        $conditions['returnType'] = '';
        $conditions['order_by'] = "idcrm DESC";
        $conditions['limit'] = 4;
        $data['posts'] = $this->teste_model->getRows($conditions);
        
        $data['postLimit'] = 4;
        
        // Pass data to view
        $this->load->view('teste/load-more-data', $data, false);
    }

    public function estou() {
        $this->load->view('teste/teste_1');
    }

    public function pesquisaProduto() {
        $produtopesq = $this->input->post('produtopesq');

        if ($produtopesq) {
            $response = file_get_contents('http://localhost:8886/OData/OData.svc/produtos?select=nome&$filter=nome%20like%20(%27%%25' . $produtopesq . '%%25%27)');
            $response = json_decode($response);

            $this->data['totalresultados'] = count($response->value);
            $this->data['produtopesq'] = $response;
        } else {
            $this->data['totalresultados'] = 0;
        }

        $this->load->view('teste/teste', $this->data);
    }

    public function login() {

        $response = file_get_contents('http://localhost:8886/Login.Get?usuario=1&senha=123');
        $response = json_decode($response);
        //echo $response->idLogin;

        var_dump($response);
        if ($response) {
            echo $response->idLogin;
            echo "tudo certo";
        } else {
            echo "erro";
        }
    }

    public function email() {
        $dadoslogin = $this->session->all_userdata();
        $this->load->config('email');
        $this->load->library('email');


        $destino = $this->input->post('destino');
        $assunto = $this->input->post('assunto');
        $mensagem = $this->input->post('mensagem');
        $from = $this->config->item('smtp_user');


        if ($destino) {
            $this->email->from($from, $dadoslogin['nome']);
            $this->email->to($destino);
            $this->email->subject($assunto);
            $this->email->message($mensagem);
            $this->email->attach("C:\Users\gabri\Desktop\locapas.txt");

            if ($this->email->send())
                $this->session->set_flashdata('success_msg', 'E-mail enviado com sucesso!');
            else
                show_error($this->email->print_debugger());
        }
        $this->load->view('teste/email');
    }

    public function arquivos() {
        $cpf = $this->input->post('cpf');
        $curriculo = $_FILES['curriculo'];
        $configuracao = array(
            'upload_path' => './curriculos/',
            'allowed_types' => 'pdf',
            'file_name' => $cpf . '.pdf',
            'max_size' => '500'
        );
        $this->load->library('upload');
        $this->upload->initialize($configuracao);
        if ($this->upload->do_upload('curriculo'))
            echo 'Arquivo salvo com sucesso.';
        else
            echo $this->upload->display_errors();
    }

    public function produto() {

        $this->load->view('teste/produto');
    }

    public function autocomplete() {
        $this->load->view('teste/jquery-ui-autocomplete');
    }

    public function search() {
//
//        $term = $this->input->get('term');
// 
//        $this->db->like('nome', $term);
// 
//        $data = $this->db->get("usuarios")->result();
// 
//        echo json_encode( $data);

        $term = $this->input->get('term');

        $this->db->like('nome', $term);

        $data = file_get_contents('http://localhost:8886/OData/OData.svc/produtos?select=nome&$filter=nome%20like%20(%27%%25' . $term . '%%25%27)');

        echo $data;
    }

    public function crm_agradecimento_compra() {
        $this->load->view('teste/teste2');
    }

    public function compra() {
        date_default_timezone_set('America/Sao_Paulo');
        $data_atual = date('Y-m-d', strtotime("-6 days"));
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

        var_dump($arrayEmail) . "<br><br>";

        $arrayEmail2 = array(); // novo array para colocar o json de consulta de dados do cliente
        for ($i = 0; $i < sizeof($clientesPosVendas); $i++) {
            $dataCliente2 = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=codigo eq ' . $clientesPosVendas[$i] . ''); // link para pegar dados do cliente no odata passando codigo como parametro
            array_push($arrayEmail2, $dataCliente2); // insere dados do cliente no array
        }
        echo sizeof($arrayEmail2);

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

    public function pesquisaodata() {
        $dados = $this->teste_model->contrato();
        var_dump($dados);
    }
    
    public function atualizaDB(){
        
         $dados['totalequip'] = $this->teste_model->countCrmTotalProdutos();
        //var_dump($dados['totalProdutos']);
        echo $dados['totalequip'][0]->numpropostas;
        
        
        $dados['totalservico'] = $this->teste_model->countCrmTotalServicos();
        //var_dump($dados['totalServicos']) ;
        
        $this->load->model('proposta_model');
         foreach ($dados['totalequip'] as $f) {
             //echo $f->numpropostas."-".$f->vltotal."<br>";
             $dataequip['totalequip'] = $f->vltotal;
            $this->proposta_model->edit('propostas', $dataequip, 'numpropostas', $f->numpropostas);
        }
        foreach ($dados['totalservico'] as $f) {
             //echo $f->numpropostas."-".$f->vltotal."<br>";
             $dataservico['totalservico'] = $f->vltotal;
            $this->proposta_model->edit('propostas', $dataservico, 'numpropostas', $f->numpropostas);
        }
        
    }

}
