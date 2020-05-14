<?php

class Proposta_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
    }

    function adicionar($dados) {

        if ($this->db->insert('propostas', $dados)) {
            return $this->db->insert_id();
        }

        return 0;
    }

    function edit($table, $data, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0) {
            return TRUE;
        }

        return FALSE;
    }

    function get($table, $fields, $usuario = '', $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array') {

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('numpropostas', 'desc');

        $this->db->limit($perpage, $start);
        if ($usuario) {
            $this->db->where('usuario', $usuario);
        }
        if ($where) {
            $this->db->where($where);
        }
       
        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }
    
    function getSenhasEstrutura($servico) {
        $this->db->from('senhas_estruturas');
        $this->db->where('servico', $servico);
        return $this->db->get()->row_array();
    }

    function getById($id) {
        $this->db->where('numpropostas', $id);
        $this->db->limit(1);
        return $this->db->get('propostas')->row();
    }

    function count($table, $idusuario) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('usuario', $idusuario);
        return $this->db->count_all_results();
    }

    function count_impressao($table, $numproposta) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('numpropostas', $numproposta);
        return $this->db->count_all_results();
    }

    public function getProdutos($id = null) {

        $this->db->select('*');
        $this->db->from('produtos_proposta');
        //$this->db->join('produtos','produtos.idProdutos = produtos_os.produtos_id');
        $this->db->where('numpropostas', $id);
        return $this->db->get()->result();
    }

    public function getServicos($id = null) {

        $this->db->select('*');
        $this->db->from('servicos_proposta');
        //$this->db->join('produtos','produtos.idProdutos = produtos_os.produtos_id');
        $this->db->where('numpropostas', $id);
        return $this->db->get()->result();
    }

    public function getModulos($id = null) {

        $this->db->select('*');
        $this->db->from('modulos_proposta');
        //$this->db->join('produtos','produtos.idProdutos = produtos_os.produtos_id');
        $this->db->where('numpropostas', $id);
        return $this->db->get()->result();
    }

    function add($table, $data, $returnId = false) {

        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1') {
            if ($returnId == true) {
                return $this->db->insert_id($table);
            }
            return TRUE;
        }

        return FALSE;
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
