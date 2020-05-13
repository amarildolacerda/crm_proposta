<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        $this->load->model('Calendario_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function index() {
        $data['vend'] = $this->input->post('vendedor');
        $data['vendedor'] = $this->Calendario_model->getUsuarios();
        $this->load->view('calendario/visualizarCalendario', $data);
    }

    public function getEventos() {
        $vend = $this->input->post('vend');
        $vendedor = $this->session->all_userdata();
        if ($vendedor['permissao'] != 1) {
            $r = $this->Calendario_model->getEventos($vendedor['idusuarios']);
        } else {
            if ($vend) {
                $r = $this->Calendario_model->getEventos($vend);
            } else {
                $r = $this->Calendario_model->getEventos($vendedor['idusuarios']);
            }
        }
        echo json_encode($r);
    }

    public function updateEventos() {
        $recebe['id'] = $this->input->post('id');
        $recebe['start'] = $this->input->post('start');
        $recebe['end'] = $this->input->post('end');
        $r = $this->Calendario_model->updateEventos($recebe);

        echo $r;
    }

    public function add() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aAgenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar agenda.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->form_validation->set_rules('titulo', 'Titulo do evento', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['title'] = $this->input->post('titulo');
            $dados['description'] = $this->input->post('descricao');
            list($dados['start'], $dados['end']) = explode(' - ', $this->input->post('datetimes'));
            $dados['color'] = $this->input->post('color');
            $dados['usuario'] = $this->input->post('usuario');
            $dados['idLead_proposta'] = $this->input->post('idLead_proposta');
            $dados['data_cadastro'] = date('Y/m/d');

            $idLead = $this->Calendario_model->add('calendario', $dados);
            if ($idLead != 0) {
                redirect(base_url() . 'index.php/calendario');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['dadoslogin'] = $this->session->all_userdata();

        $this->load->view('calendario/adicionarCalendario', $data);
    }

    public function addVinculado() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aAgenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar agenda.');
            redirect(base_url() . 'index.php/Calendario');
        }

        $this->form_validation->set_rules('titulo', 'Titulo do evento', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['title'] = $this->input->post('titulo');
            $dados['description'] = $this->input->post('descricao');
            list($dados['start'], $dados['end']) = explode(' - ', $this->input->post('datetimes'));
            $dados['color'] = $this->input->post('color');
            $dados['usuario'] = $this->input->post('usuario');
            $dados['idLead_proposta'] = $this->input->post('idLead_proposta');
            $dados['data_cadastro'] = date('Y/m/d');

            $idCalendario = $this->Calendario_model->add('calendario', $dados);
            if ($idCalendario != 0) {
                redirect(base_url() . 'index.php/calendario/editVinculado/' . $idCalendario);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['dadoslogin'] = $this->session->all_userdata();

        $this->load->view('calendario/alterarCalendario', $data);
    }

    public function edit() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eAgenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar agenda.');
            redirect(base_url() . 'index.php/dashboard');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/calendario');
        }

        $this->form_validation->set_rules('titulo', 'Titulo do evento', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['title'] = $this->input->post('titulo');
            $dados['description'] = $this->input->post('descricao');
            list($dados['start'], $dados['end']) = explode(' - ', $this->input->post('datetimes'));
            $dados['color'] = $this->input->post('color');


            if ($this->Calendario_model->edit('calendario', $dados, 'id', $this->input->post('id')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Agenda alterada com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/calendario');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['result'] = $this->Calendario_model->getById($this->uri->segment(3));
        $this->load->view('calendario/alterarCalendario', $data);
    }

    public function editVinculado() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eAgenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar agenda.');
            redirect(base_url() . 'index.php/dashboard');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/calendario');
        }

        $this->form_validation->set_rules('titulo', 'Titulo do evento', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['title'] = $this->input->post('titulo');
            $dados['description'] = $this->input->post('descricao');
            list($dados['start'], $dados['end']) = explode(' - ', $this->input->post('datetimes'));
            $dados['color'] = $this->input->post('color');

            if ($this->Calendario_model->edit('calendario', $dados, 'id', $this->input->post('id')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Agenda alterada com sucesso!');
                $data['formErrors'] = null;
                $referred_from = $this->session->userdata('last_url'); //pega a ultima URL para voltar para o lead ao salvar calendario
                
                //neste trecho ele pega o que foi escrito na descrição do calendario e adiciona um Timeline com essa informação
                $calendario= $this->input->post('id');
                $idLead = $this->input->post('idLead');
                date_default_timezone_set('America/Sao_Paulo');
                $descricao = $dados['title'] . "<br><br>" . "Inicio:".$dados['start'] . "<br>" . "Fim:".$dados['end'] ."<br><br>" . $dados['description'];

                $nome = "Calendario";
                $timeline = array(
                    'idcrm' => $idLead,
                    'descricao' => $descricao,
                    'nome' => $nome,
                    'data' => date('d-m-Y H:i')
                );
                $this->load->model('crm_model');
                $this->crm_model->add('timeline_crm', $timeline);
                // fim da parte do timeline

                redirect($referred_from, 'refresh');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['result'] = $this->Calendario_model->getById($this->uri->segment(3));
        $this->load->view('calendario/alterarCalendarioVinculado', $data);
    }

    function excluirCalendario() {

        $ID = $this->input->post('id');
        if ($this->Calendario_model->delete('calendario', 'id', $ID) == true) {

            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

}
