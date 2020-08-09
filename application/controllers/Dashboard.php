<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        $this->load->model('dashboard_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function index() {
        $dadoslogin = $this->session->all_userdata();
//          //OS EM GARANTIA
//        $whereGarantia = array();
//        $whereGarantia['garantia'] = 1;
//        $whereGarantia['encerrada'] = "nao";
//        $this->data['totalGarantia'] = $this->dashboard_model->count('crm', $whereGarantia);
//        
//        //OS ABERTAS
//        $whereAbertas = array();
//        $whereAbertas['encerrada'] = "nao";
//        $this->data['totalAbertas'] = $this->dashboard_model->count('ordem_servico', $whereAbertas);
//        
        //OPORTUNIDADES ABERTAS ÚLTIMOS 7 DIAS INDIVIDUAL
        $this->data['totalOportunidadesAbertas7diasIndividual'] = $this->dashboard_model->count_ultimos_7dias_individual('negocios', date("Y-m-d", strtotime("-7 days")), $dadoslogin['idusuarios']);
        //OPORTUNIDADES ABERTAS ÚLTIMOS 7 DIAS GERAL
        $this->data['totalOportunidadesAbertas7dias'] = $this->dashboard_model->count_ultimos_7dias('negocios', date("Y-m-d", strtotime("-7 days")));



        //OPORTUNIDADES FECHADAS ÚLTIMOS 7 DIAS INDIVIDUAL
        $this->data['totalOportunidadesFechadas7diasIndividual'] = $this->dashboard_model->count_fechadas_ultimos_7dias_individual('negocios', date("Y-m-d", strtotime("-7 days")), $dadoslogin['idusuarios']);
        //OPORTUNIDADES FECHADAS ÚLTIMOS 7 DIAS GERAL
        $this->data['totalOportunidadesFechadas7dias'] = $this->dashboard_model->count_fechadas_ultimos_7dias('negocios', date("Y-m-d", strtotime("-7 days")));

//        //OS GARANTIA PRÓXIMA DO VENCIMENTO 25 DIAS+
//        $this->data['totalAbertasGarantiaProxPrazo'] = $this->dashboard_model->count_garantia_prox_prazo('ordem_servico', date("Y-m-d", strtotime("-25 days")));
//        
//        //OS GARANTIA VENCIDAS 
//        $this->data['totalAbertasGarantiaVencida'] = $this->dashboard_model->count_garantia_prox_prazo('ordem_servico', date("Y-m-d", strtotime("-30 days")));
//        
//        //OS Á 3 DIAS SEM INTERAÇÃO
//        $this->data['totalAbertasMais3diasSemInteracao'] = $this->dashboard_model->count_os_mais3dias_seminteracao('ordem_servico', date("Y-m-d", strtotime("-3 days")));
//                
        //TOTAL DE OPORTUNIDADES POR FASES DE FÚNIL INDIVIDUAL
        $this->data['statusIndividual'] = $this->dashboard_model->getStatusAberto();
        foreach ($this->data['statusIndividual'] as $s) {
            $s->quantidade = $this->dashboard_model->countCrmStatusIndividual($s->idstatus, $dadoslogin['idusuarios']);
        }
        //TOTAL DE OPORTUNIDADES POR FASES DE FÚNIL
        $this->data['status'] = $this->dashboard_model->getStatusAberto();
        foreach ($this->data['status'] as $s) {
            $s->quantidade = $this->dashboard_model->countCrmStatus($s->idstatus);
            ;
        }

        //TOTAL DE OPORTUNIDADES POR INDICAÇÃO INDIVIDUAL
        $this->data['fonteIndividual'] = $this->dashboard_model->getFonteIndicacao();

        foreach ($this->data['fonteIndividual'] as $f) {
            $f->quantidade = $this->dashboard_model->countCrmFonteIndicacaoIndividual($f->idindicacao, $dadoslogin['idusuarios']);
        }
        usort(
                $this->data['fonteIndividual'], function( $a, $b ) {
            if ($a->quantidade == $b->quantidade) {
                return 0;
            }
            return ( ( $a->quantidade > $b->quantidade ) ? -1 : 1 );
        }
        );

        //TOTAL DE OPORTUNIDADES POR INDICAÇÃO
        $this->data['fonte'] = $this->dashboard_model->getFonteIndicacao();

        foreach ($this->data['fonte'] as $f) {
            $f->quantidade = $this->dashboard_model->countCrmFonteIndicacao($f->idindicacao);
        }
        usort(
                $this->data['fonte'], function( $a, $b ) {
            if ($a->quantidade == $b->quantidade) {
                return 0;
            }
            return ( ( $a->quantidade > $b->quantidade ) ? -1 : 1 );
        }
        );

        $this->load->view('dashboard/dashboard', $this->data);
    }
//
//    public function cliente() {
//
//        $this->load->view('teste');
//    }

//    public function dashboardDiretoria() {
//        $mes_atual = date('Y-m', strtotime("+1 month"));
//        $ultimos_6_meses = date("Y-m", strtotime("-5 month")); //se alterar para 11 pega mes atual e ultimos 11 meses
//
//        $this->data['stat_mensal_convertido'] = $this->dashboard_model->get($mes_atual, $ultimos_6_meses, '');
//        $this->data['stat_mensal_novo'] = $this->dashboard_model->coutFonteIndicacaoNovo($mes_atual, $ultimos_6_meses, 21);
//        $this->load->view('dashboard/dashboardDiretoria', $this->data);
//    }

}
