<?php

class Posvendas_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
    }
    
    function adicionar($dados){
        
        $this->db->insert('posvendas',$dados);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;     
          
    }
    

    function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array') {

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('nomeCliente');
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }

    function getPermissao($table, $fields) {

        $this->db->select($fields);
        $this->db->from($table);
        return $this->db->get()->result();
    }

    function getById($id) {
        $this->db->where('idusuarios', $id);
        $this->db->limit(1);
        return $this->db->get('usuarios')->row();
    }

    function count($table) {
        return $this->db->count_all($table);
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
