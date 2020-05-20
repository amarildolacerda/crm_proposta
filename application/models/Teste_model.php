<?php

class Teste_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
    }

    function getRows($params = array()) {
        $this->db->select('*');
        $this->db->from('crm');

        //fetch data by conditions
        if (array_key_exists("where", $params)) {
            foreach ($params['where'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        if (array_key_exists("order_by", $params)) {
            $this->db->order_by($params['order_by']);
        }

        if (array_key_exists("idcrm", $params)) {
            $this->db->where('idcrm', $params['idcrm']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            //set start and limit
            if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                $this->db->limit($params['limit'], $params['start']);
            } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                $this->db->limit($params['limit']);
            }

            if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
                $result = $this->db->count_all_results();
            } else {
                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }

        //return fetched data
        return $result;
    }

    function contrato() {
        $DB2 = $this->load->database('wba_db', TRUE);
        $DB2->select('a.cliente, a.descricao, a.nomecliente, b.codigo, b.cnpj, b.nome, b.fantasia,b.fone,b.celular,b.email,b.data');
        $DB2->from('contrmanu a');
        $DB2->join('clifor b', 'a.cliente = b.codigo');
        $query = $DB2->get()->row();

        return $query;
    }

    function teste() {
        $DB2 = $this->load->database('wba_db', TRUE);
        $DB2->select('*');
        $DB2->from('sigcad');
        $query = $DB2->get()->row();

        return $query;
    }

    function crm_count() {
        $DB2 = $this->load->database('crm_db', TRUE);
        $DB2->select('*');
        $DB2->from('accounts');

        $query = $DB2->count_all_results();

        return $query;
    }

}
