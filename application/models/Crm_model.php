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
    
    function getNegocios($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $a, $b) {

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by($a, $b);
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }
         $this->db->join('propostas','propostas.idLead_proposta = crm.idcrm');

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }
    
    function getEncerrado($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $a, $b) {

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by($a, $b);
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }
        $this->db->limit(7);

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }
    
     function countNegocios($table,$where) {
        $this->db->from($table);
         if ($where) {
            $this->db->where($where);
        }
        return $this->db->count_all_results();
    }

    function existeContrato($idWBA) {
        $this->db->where('idwba', $idWBA);
        $existe = $this->db->get('crm');
        if ($existe->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function filtro($vendedor, $status, $numero, $empresa, $seguimento, $datainicial, $datafinal, $atribuido, $fonte, $probabilidade) {
        $this->db->select('*');
        $this->db->from('crm');
        $this->db->order_by('idcrm', 'desc');
        if ($vendedor) {
            $this->db->where('usuario', $vendedor);
        }
        if ($status) {
            $this->db->like('status', $status);
        }
        if ($numero) {
            $this->db->where('idcrm', $numero);
        }
        if ($empresa) {
            $this->db->like('empresa', $empresa);
        }
        if ($fonte) {
            $this->db->where('fonte', $fonte);
        }
        if ($seguimento) {
            $this->db->where('seguimento', $seguimento);
        }
        if ($datainicial and $datafinal) {
            $this->db->where('data >=', $datainicial);
            $this->db->where('data <=', $datafinal);
        }
        if ($atribuido) {
            $this->db->where('atribuido', $atribuido);
        }
        if ($probabilidade) {
            $this->db->where('probabilidade', $probabilidade);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    public function countfiltro($vendedor, $status, $numero, $empresa, $seguimento, $datainicial, $datafinal, $atribuido, $fonte, $probabilidade) {
        $this->db->select('*');
        $this->db->from('crm');
        $this->db->order_by('idcrm', 'desc');
        if ($vendedor) {
            $this->db->where('usuario', $vendedor);
        }
        if ($status) {
            $this->db->like('status', $status);
        }
        if ($numero) {
            $this->db->where('idcrm', $numero);
        }
        if ($empresa) {
            $this->db->like('empresa', $empresa);
        }
        if ($fonte) {
            $this->db->where('fonte', $fonte);
        }
        if ($seguimento) {
            $this->db->where('seguimento', $seguimento);
        }
        if ($datainicial and $datafinal) {
            $this->db->where('data >=', $datainicial);
            $this->db->where('data <=', $datafinal);
        }
        if ($atribuido) {
            $this->db->where('atribuido', $atribuido);
        }
        if ($probabilidade) {
            $this->db->where('probabilidade', $probabilidade);
        }

        return $this->db->count_all_results();
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

    function countatribuido($where_array_atribuido = '') {
        $this->db->where($where_array_atribuido);
        $this->db->from('crm');
        return $this->db->count_all_results();
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

    function getByIdStatus($id) {
        $this->db->where('idstatus', $id);
        $this->db->limit(1);
        return $this->db->get('status_crm')->row();
    }

    function getByIdConfig($id, $idtabela, $tabela) {
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

    function getPropostas($table, $fields, $where = '', $one = false) {
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

    function deleteProposta($table, $where = '') {
        if ($where) {
            $this->db->where_in('numpropostas', $where);
        }
        $this->db->delete($table);

        if ($this->db->affected_rows()) {
            return TRUE;
        }

        return FALSE;
    }

}
