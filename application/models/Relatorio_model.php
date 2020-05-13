<?php

class Relatorio_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
    }

    function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $a, $b) {

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by($a, $b);
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }

    function count($table, $where = '') {
        $this->db->select('*');
        $this->db->from($table);
        
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->count_all_results();
    }
    
    function count_seguimentos(){
        $this->db->select('idcrm,empresa,usuarios.nome');
        $this->db->from('crm');
        $this->db->join('usuarios','crm.usuario = usuarios.idusuarios','left');
        $this->db->where('usuario',26);
         return $this->db->get()->result();
    }
    
    function teste(){
        $this->db->select('idcrm,empresa,usuarios.nome');
        $this->db->from('crm');
        $this->db->join('usuarios','crm.usuario = usuarios.idusuarios','left');
        $this->db->where('usuario',26);
         return $this->db->get()->result();
    }
    
    function getConfig($table, $fields, $where = '') {

        $this->db->select($fields);
        $this->db->from($table);
        if ($table == 'seguimento_crm' or $table == 'indicacao_crm') {
            $this->db->order_by('descricao');
        }
        if ($table == 'usuarios') {
            $this->db->order_by('nome');
        }
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get()->result();
    }
    
    public function filtro($vendedor, $seguimento, $datainicial, $datafinal) {
        $this->db->select('*');
        $this->db->from('crm');
        $this->db->order_by('idcrm', 'desc');
        $this->db->where('data_encerra IS NOT NULL', null, false);
        if ($vendedor) {
            $this->db->where('usuario', $vendedor);
        }
        if ($seguimento) {
            $this->db->where('seguimento', $seguimento);
        }
        if ($datainicial and $datafinal) {
            $this->db->where('data >=', $datainicial);
            $this->db->where('data <=', $datafinal);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

}
