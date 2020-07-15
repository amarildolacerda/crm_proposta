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
        $this->data['totalOportunidadesAbertas7diasIndividual'] = $this->dashboard_model->count_ultimos_7dias_individual('crm', date("Y-m-d", strtotime("-7 days")),$dadoslogin['idusuarios']);
        //OPORTUNIDADES ABERTAS ÚLTIMOS 7 DIAS GERAL
        $this->data['totalOportunidadesAbertas7dias'] = $this->dashboard_model->count_ultimos_7dias('crm', date("Y-m-d", strtotime("-7 days")));

        
        
        //OPORTUNIDADES FECHADAS ÚLTIMOS 7 DIAS INDIVIDUAL
        $this->data['totalOportunidadesFechadas7diasIndividual'] = $this->dashboard_model->count_fechadas_ultimos_7dias_individual('crm', date("Y-m-d", strtotime("-7 days")),$dadoslogin['idusuarios']);
        //OPORTUNIDADES FECHADAS ÚLTIMOS 7 DIAS GERAL
        $this->data['totalOportunidadesFechadas7dias'] = $this->dashboard_model->count_fechadas_ultimos_7dias('crm', date("Y-m-d", strtotime("-7 days")));

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
            $s->quantidade = $this->dashboard_model->countCrmStatusIndividual($s->idstatus,$dadoslogin['idusuarios']);
        }
        //TOTAL DE OPORTUNIDADES POR FASES DE FÚNIL
        $this->data['status'] = $this->dashboard_model->getStatusAberto();
        foreach ($this->data['status'] as $s) {
            $s->quantidade = $this->dashboard_model->countCrmStatus($s->idstatus);;
        }

        //TOTAL DE OPORTUNIDADES POR INDICAÇÃO INDIVIDUAL
        $this->data['fonteIndividual'] = $this->dashboard_model->getFonteIndicacao();

        foreach ($this->data['fonteIndividual'] as $f) {
            $f->quantidade = $this->dashboard_model->countCrmFonteIndicacaoIndividual($f->idindicacao,$dadoslogin['idusuarios']);
        }
        usort(
                $this->data['fonteIndividual'], function( $a, $b ) {
            if ($a->quantidade == $b->quantidade){
            return 0;}
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
            if ($a->quantidade == $b->quantidade){
            return 0;}
            return ( ( $a->quantidade > $b->quantidade ) ? -1 : 1 );
        }
        );

        $this->load->view('dashboard/dashboard', $this->data);
    }

    public function dashboardGeral() {
        $dadoslogin = $this->session->all_userdata();
        echo $dadoslogin['idusuarios'];
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
        //OS ABERTAS ÚLTIMOS 7 DIAS
        $this->data['totalOportunidadesAbertas7dias'] = $this->dashboard_model->count_ultimos_7dias('crm', date("Y-m-d", strtotime("-7 days")));

        //OS FECHADAS ÚLTIMOS 7 DIAS
        $this->data['totalOportunidadesFechadas7dias'] = $this->dashboard_model->count_fechadas_ultimos_7dias('crm', date("Y-m-d", strtotime("-7 days")));

//        //OS GARANTIA PRÓXIMA DO VENCIMENTO 25 DIAS+
//        $this->data['totalAbertasGarantiaProxPrazo'] = $this->dashboard_model->count_garantia_prox_prazo('ordem_servico', date("Y-m-d", strtotime("-25 days")));
//        
//        //OS GARANTIA VENCIDAS 
//        $this->data['totalAbertasGarantiaVencida'] = $this->dashboard_model->count_garantia_prox_prazo('ordem_servico', date("Y-m-d", strtotime("-30 days")));
//        
//        //OS Á 3 DIAS SEM INTERAÇÃO
//        $this->data['totalAbertasMais3diasSemInteracao'] = $this->dashboard_model->count_os_mais3dias_seminteracao('ordem_servico', date("Y-m-d", strtotime("-3 days")));
//                
        //TOTAL DE OPORTUNIDADES POR FASES DE FÚNIL
        $this->data['status'] = $this->dashboard_model->getStatusAberto();

        //TOTAL DE OPORTUNIDADES POR INDICAÇÃO
        $this->data['fonte'] = $this->dashboard_model->getFonteIndicacao();

        foreach ($this->data['fonte'] as $f) {
            $f->quantidade = $this->dashboard_model->countCrmFonteIndicacao($f->idindicacao);
        }
        usort(
                $this->data['fonte'], function( $a, $b ) {
            if ($a->quantidade == $b->quantidade)
                return 0;
            return ( ( $a->quantidade > $b->quantidade ) ? -1 : 1 );
        }
        );

        $this->load->view('dashboard/dashboardIndividual', $this->data);
    }

    public function dashboard2() {

        $dadoslogin = $this->session->all_userdata();

        $where_array = array();
        $where_array_geral = array();
        $where_array_estatistica_novo = array();
        $where_array_estatistica_convertido = array();

        //-----------------------------------------------------------------------------------------------
        //CALCULO DE ESTATISTICAS DO MÊS

        $mes_atual = date('Y-m', strtotime("+1 month"));
        $ultimos_6_meses = date("Y-m", strtotime("-5 month")); //se alterar para 11 pega mes atual e ultimos 11 meses

        $this->data['stat_mensal_convertido'] = $this->dashboard_model->get($mes_atual, $ultimos_6_meses, '');
        $this->data['stat_mensal_novo'] = $this->dashboard_model->get($mes_atual, $ultimos_6_meses, '');

        //entra aqui se nao for o primeiro dia do mes, assim mantem os dados atualizados na página
        if (date('d') == '01' or date('d') == '02' or date('d') == '03') {// se for dia 01, 02 ou 03 do mês, ele vai pegar os dados do dia atual menos 1 mes, assim pega dados do mes anterior
            $mes = date('m', strtotime("-1 month"));
            $ano = date('Y', strtotime("-1 month"));
            $dados['novos'] = $this->dashboard_model->coutestatisticanovo($mes, $ano);
            $dados['convertidos'] = $this->dashboard_model->coutestatisticaganho($mes, $ano);
            $dados['data'] = date('Y-m-01', strtotime("-1 month"));


            $existe = $this->dashboard_model->exist($mes, $ano); // VERIFICA SE JÁ EXISTE UMA ESTATISTICA GRAVADA NO BANCO COM O MES E ANO VERIFICADO

            if ($existe) {
                $this->dashboard_model->edit($mes, $ano, $dados);
            } else {
                $this->dashboard_model->addestatistica($dados);
            }
        }
        $mes2 = date('m');
        $ano2 = date('Y');
        $dados['novos'] = $this->dashboard_model->coutestatisticanovo($mes2, $ano2);
        $dados['convertidos'] = $this->dashboard_model->coutestatisticaganho($mes2, $ano2);
        $dados['data'] = date('Y-m-01');

        $existe = $this->dashboard_model->exist($mes2, $ano2); // VERIFICA SE JÁ EXISTE UMA ESTATISTICA GRAVADA NO BANCO COM O MES E ANO VERIFICADO

        if ($existe) {
            $this->dashboard_model->edit($mes2, $ano2, $dados);
        } else {
            $this->dashboard_model->addestatistica($dados);
        }


        //-----------------------------------------------------------------------------------------------
        //conta total CRM GERAL
        $where_array_crm = array();
        $where_array_crm['atribuido'] = 1;

        $this->data['count_crm_total'] = $this->dashboard_model->count('crm', $where_array_crm);


        $where_array_crm['status'] = 1;
        $this->data['count_crm_prospect'] = $this->dashboard_model->count('crm', $where_array_crm);

        $where_array_crm['status'] = 2;
        $this->data['count_crm_oportunidade'] = $this->dashboard_model->count('crm', $where_array_crm);

        $where_array_crm['status'] = 3;
        $this->data['count_crm_entregue'] = $this->dashboard_model->count('crm', $where_array_crm);

        $where_array_crm['status'] = 4;
        $this->data['count_crm_provavel'] = $this->dashboard_model->count('crm', $where_array_crm);

        $where_array_crm['status'] = 5;
        $this->data['count_crm_ganho'] = $this->dashboard_model->count('crm', $where_array_crm);


        $this->data['count_crm_perdido'] = $this->dashboard_model->count_fechado('crm', '');


        //-----------------------------------------------------------------------------------------------
        //SOMA DE META
        $this->data['meta_vendas'] = 175;
        $data_meta = date('Y-m-01');
        $this->data['mes_atual'] = date('m');
        $this->data['meta_atingida'] = $this->dashboard_model->count_meta_atingida($data_meta);

        $where_array_teste = array();
        $where_array_teste['situacao'] = "perdido";



        //-----------------------------------------------------------------------------------------------
        //SOMA DE META
        //conta total de propostas do usuário
        $where_array = array();
        $where_array['usuario'] = $dadoslogin['idusuarios'];
        $this->data['count_crm_total_individual'] = $this->dashboard_model->count('crm', $where_array);


        $where_array['status'] = 1;
        $this->data['count_crm_prospect_individual'] = $this->dashboard_model->count('crm', $where_array);

        $where_array['status'] = 2;
        $this->data['count_crm_oportunidade_individual'] = $this->dashboard_model->count('crm', $where_array);

        $where_array['status'] = 3;
        $this->data['count_crm_entregue_individual'] = $this->dashboard_model->count('crm', $where_array);

        $where_array['status'] = 4;
        $this->data['count_crm_provavel_individual'] = $this->dashboard_model->count('crm', $where_array);

        $where_array['status'] = 5;
        $this->data['count_crm_ganho_individual'] = $this->dashboard_model->count('crm', $where_array);

        $where_array['usuario'] = $dadoslogin['idusuarios'];
        $this->data['count_crm_perdido_individual'] = $this->dashboard_model->count_fechado('crm', $where_array);

        $this->load->view('dashboard/dashboard', $this->data);
    }

    public function cliente() {

        $this->load->view('teste');
    }

    public function dashboardDiretoria() {
        $mes_atual = date('Y-m', strtotime("+1 month"));
        $ultimos_6_meses = date("Y-m", strtotime("-5 month")); //se alterar para 11 pega mes atual e ultimos 11 meses

        $this->data['stat_mensal_convertido'] = $this->dashboard_model->get($mes_atual, $ultimos_6_meses, '');
        $this->data['stat_mensal_novo'] = $this->dashboard_model->coutFonteIndicacaoNovo($mes_atual, $ultimos_6_meses, 21);
        $this->load->view('dashboard/dashboardDiretoria', $this->data);
    }

}
