<?php

class Biblioteca_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
    }

    function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false) {

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('data');
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

    function count($table) {
        return $this->db->count_all($table);
    }

    function getConfig($table, $fields, $where = '') {

        $this->db->select($fields);
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get()->result();
    }

    function getExcluir($id) {
        $this->db->where('idbiblioteca', $id);
        $this->db->limit(1);
        return $this->db->get('biblioteca')->row();
    }

    function delete($table, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

}
