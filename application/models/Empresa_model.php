<?php

class Empresa_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
    }

    function getGerenciar($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $a, $b, $whereRazaoOuFantasia) {

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by($a, $b);
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }
        if ($whereRazaoOuFantasia) {
            $this->db->like($whereRazaoOuFantasia);
        }

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }

    function getNegocios($table, $fields, $where = '', $one = false) {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('idNegocio', 'desc');

        if ($where) {
            $this->db->where($where);
        }
        $this->db->join('empresas', 'empresas.idEmpresas = negocios.idEmpresas');
        $this->db->join('contatos', 'contatos.idContatos = negocios.idContatos');
        $this->db->join('status_crm', 'status_crm.idstatus = negocios.faseDoFunil');
        
        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
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

    function getNegociosJoinPropostas($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $a, $b) {

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by($a, $b);
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }
        $this->db->join('propostas', 'propostas.idLead_proposta = crm.idcrm');

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

    function countNegocios($table, $where) {
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

    function countGerenciar($table, $where, $whereRazaoOuFantasia) {
        $this->db->select('*');
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        if ($whereRazaoOuFantasia) {
            $this->db->like($whereRazaoOuFantasia);
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
        $this->db->where('idEmpresas', $id);
        $this->db->limit(1);
        return $this->db->get('empresas')->row();
    }

    function getByIdContato($id) {
        $this->db->where('idEmpresas', $id);
        $this->db->limit(1);
        return $this->db->get('contatos')->row();
    }

    function getByIdTipo($id) {
        $this->db->where('idTipoEmpresa', $id);
        $this->db->limit(1);
        return $this->db->get('tipo_empresa')->row();
    }

    function count($table) {
        return $this->db->count_all($table);
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

    public function getTimelineEmpresas($id = null) {

        $this->db->select('*');
        $this->db->from('timeline_empresas');
        $this->db->where('idEmpresas', $id);
        $this->db->order_by('idTimeline_empresas', 'desc');
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
