<?php

class Dashboard_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
    }

    function count($table, $where = '') {
        $this->db->select('*');
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }

        return $this->db->count_all_results();
    }

    function get($mes_atual, $ultimos_6_meses, $where) {
        $this->db->select('*');
        $this->db->from('estatisticas');
        $this->db->order_by('data');
        if ($mes_atual and $ultimos_6_meses) {
            $this->db->where('data >=', $ultimos_6_meses);
            $this->db->where('data <=', $mes_atual);
        }
        if ($where) {
            $this->db->where($where);
        }

        return $this->db->get()->result();
    }

    function getStatusAberto() {

        $this->db->select('*');
        $this->db->from('status_crm');
        $this->db->order_by('posicaoMenu', 'ASC');
        //$this->db->where('encerra',0); DESCOMENTAR PARA MOSTRAR APENAS STATUS ABERTOS
        return $this->db->get()->result();
    }

    function getFonteIndicacao() {

        $this->db->select('*');
        $this->db->from('indicacao_crm');
        $this->db->order_by('descricao', 'ASC');
        $this->db->where('status', 1);
        return $this->db->get()->result();
    }

    function countCrmTotalProdutos() {
        $this->db->select('numpropostas,vltotal');
        $this->db->select_sum('vltotal');
        $this->db->from('produtos_proposta');
        $this->db->group_by('numpropostas');
        return $this->db->get()->result();
    }

    function countCrmTotalServicos() {
        $this->db->select('numpropostas,vltotal');
        $this->db->select_sum('vltotal');
        $this->db->from('servicos_proposta');
        $this->db->group_by('numpropostas');
        return $this->db->get()->result();
    }

    function countCrmStatus($idStatus) {
        $this->db->from('crm');
        $this->db->where('status', $idStatus);
        return $this->db->count_all_results();
    }

    function countCrmStatusIndividual($idStatus, $idusuarios) {
        $this->db->from('crm');
        $this->db->where('usuario', $idusuarios);
        $this->db->where('status', $idStatus);
        return $this->db->count_all_results();
    }

    function countCrmFonteIndicacao($idIndicacao) {
        $this->db->from('crm');
        $this->db->where('fonte', $idIndicacao);
        return $this->db->count_all_results();
    }

    function countCrmFonteIndicacaoIndividual($idIndicacao, $idusuarios) {
        $this->db->from('crm');
        $this->db->where('usuario', $idusuarios);
        $this->db->where('fonte', $idIndicacao);
        return $this->db->count_all_results();
    }

    function count_ultimos_7dias($table, $data) {
        $this->db->from($table);
        $this->db->where('data >=', $data);
        return $this->db->count_all_results();
    }

    function count_ultimos_7dias_individual($table, $data, $idusuarios) {
        $this->db->from($table);
        $this->db->where('usuario', $idusuarios);
        $this->db->where('data >=', $data);
        return $this->db->count_all_results();
    }

    function count_fechadas_ultimos_7dias($table, $data) {
        $this->db->from($table);
        $this->db->where('data_encerra >=', $data);
        $this->db->where('data_encerra !=', NULL);
        return $this->db->count_all_results();
    }

    function count_fechadas_ultimos_7dias_individual($table, $data, $idusuarios) {
        $this->db->from($table);
        $this->db->where('usuario', $idusuarios);
        $this->db->where('data_encerra >=', $data);
        $this->db->where('data_encerra !=', NULL);
        return $this->db->count_all_results();
    }

    function count_garantia_prox_prazo($table, $data) {
        $this->db->from($table);
        $this->db->where('encerrada', 'nao');
        $this->db->where('garantia', 1);
        $this->db->where('dataEntrada <=', $data);
        return $this->db->count_all_results();
    }

    function count_os_mais3dias_seminteracao($table, $data) {
        $this->db->from($table);
        $this->db->where('encerrada', 'nao');
        $this->db->where('dataAlteracao <', $data);
        return $this->db->count_all_results();
    }

    function count_fechado($table, $where = '') {
        $this->db->select('*');
        $this->db->from('crm');

        if ($where) {
            $where1 = "usuario=$where[usuario] AND (status='6' OR status='7' OR status='8')";
            $this->db->where($where1);
        } else {
            $where1 = "status='6' OR status='7' OR status='8'";
            $this->db->where($where1);
        }

        return $this->db->count_all_results();
    }

    function count_meta_atingida($data_meta) {
        $this->db->select('*');
        $this->db->from('crm');
        $where1 = "status!='1' AND status!='2'";
        $this->db->where('data >=', $data_meta);
        $this->db->where($where1);
        return $this->db->count_all_results();
    }

    function count_impressao($table, $numproposta) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('numpropostas', $numproposta);
        return $this->db->count_all_results();
    }

    function coutestatisticanovo($mes, $ano) {
        $this->db->select('*');
        $this->db->from('crm');
        $this->db->where('MONTH(data)', $mes);
        $this->db->where('YEAR(data)', $ano);
        // $this->db->where('data_encerra', NULL);

        $total = $this->db->count_all_results();
        return $total;
    }

    function coutestatisticaganho($mes, $ano) {
        $this->db->select('*');
        $this->db->from('crm');
        $this->db->where('MONTH(data_encerra)', $mes);
        $this->db->where('YEAR(data_encerra)', $ano);
        $this->db->where('situacao', 'ganho');


        $total = $this->db->count_all_results();
        return $total;
    }

    function coutFonteIndicacaoNovo($mes, $ano, $fonte) {
        $this->db->select('*');
        $this->db->from('crm');
        $this->db->where('fonte', $fonte);

        $total = $this->db->count_all_results();
        return $total;
    }

    function coutFonteIndicacaoGanho($mes, $ano, $fonte) {
        $this->db->select('*');
        $this->db->from('crm');
//        $this->db->where('MONTH(data_encerra)', $mes);
//        $this->db->where('YEAR(data_encerra)', $ano);
        //$this->db->where('situacao', 'ganho');
//        $this->db->where('fonte', $fonte);


        $total = $this->db->count_all_results();
        return $total;
    }

    function addestatistica($dados) {
        $this->db->insert('estatisticas', $dados);
        if ($this->db->affected_rows() >= 0) {
            return TRUE;
        }

        return FALSE;
    }

    function exist($mes, $ano) {
        $this->db->select('*');
        $this->db->from('estatisticas');
        $this->db->where('MONTH(data)', $mes);
        $this->db->where('YEAR(data)', $ano);
        if ($this->db->count_all_results() > 0) {
            return TRUE;
        }

        return FALSE;
    }

    function edit($mes, $ano, $dados) {
        $this->db->where('MONTH(data)', $mes);
        $this->db->where('YEAR(data)', $ano);
        $this->db->update('estatisticas', $dados);

        if ($this->db->affected_rows() >= 0) {
            return TRUE;
        }

        return FALSE;
    }

}
