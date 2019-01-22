<?php

class Crm_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
    }

    /* function crm() {
      $DB2 = $this->load->database('crm_db', TRUE);
      $DB2->select('*');

      $query = $DB2->get('accounts')->row();

      return $query;
      }

      function crm_count() {
      $DB2 = $this->load->database('crm_db', TRUE);
      $DB2->select('*');
      $DB2->from('accounts');

      $query = $DB2->count_all_results();

      return $query;
      }
     */

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

    function add($table, $dados) {

        $this->db->insert($table, $dados);
        if ($this->db->affected_rows() == '1') {
            return $this->db->insert_id();
        }

        return FALSE;
    }

    function edit($table, $data, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0) {
            return TRUE;
        }

        return FALSE;
    }

    function getPermissao($table, $fields) {

        $this->db->select($fields);
        $this->db->from($table);
        return $this->db->get()->result();
    }

    function getById($id) {
        $this->db->where('idcrm', $id);
        $this->db->limit(1);
        return $this->db->get('crm')->row();
    }

    function count($table) {
        return $this->db->count_all($table);
    }
    
 
    function getConfig($table, $fields,$where='') {

        $this->db->select($fields);
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get()->result();
    }
    
    function getByIdStatus($id) {
        $this->db->where('idstatus', $id);
        $this->db->limit(1);
        return $this->db->get('status_crm')->row();
    }
    
    function getByIdConfig($id,$idtabela,$tabela) {
        $this->db->where($idtabela, $id);
        $this->db->limit(1);
        return $this->db->get($tabela)->row();
    }
    
    public function getTimeline($id = null) {

        $this->db->select('*');
        $this->db->from('timeline_crm');
        $this->db->where('idcrm', $id);
        $this->db->order_by('idTimeline_crm', 'desc');
        return $this->db->get()->result();
    }
    
    function delete($table, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }
    
    function getPropostas($table, $fields, $where = '',$one = false) {

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('numpropostas', 'desc');

        if ($where) {
            $this->db->where($where);
        }
       
        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }
    

}
