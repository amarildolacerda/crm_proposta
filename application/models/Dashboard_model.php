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
    
    function count_ultimos_7dias($table,$data) {
        $this->db->from($table);
        $this->db->where('data >=', $data);
        return $this->db->count_all_results();
    }
    
    function count_fechadas_ultimos_7dias($table,$data) {
        $this->db->from($table);
        $this->db->where('data_encerra >=', $data);
         $this->db->where('data_encerra !=', NULL);
        return $this->db->count_all_results();
    }
    
     function count_garantia_prox_prazo($table,$data) {
        $this->db->from($table);
        $this->db->where('encerrada', 'nao');
        $this->db->where('garantia', 1);
        $this->db->where('dataEntrada <=', $data);
        return $this->db->count_all_results();
    }
    
    function count_os_mais3dias_seminteracao($table,$data) {
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
    
    function edit($mes,$ano,$dados) {
        $this->db->where('MONTH(data)', $mes);
        $this->db->where('YEAR(data)', $ano);
        $this->db->update('estatisticas', $dados);

        if ($this->db->affected_rows() >= 0) {
            return TRUE;
        }

        return FALSE;
    }

}
