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

    function getEmpresa($nome, $one = false) {

        $this->db->select('idEmpresas,nomeEmpresa');
        $this->db->from('empresas');
        $this->db->like('nomeEmpresa', $nome);


        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }
    
    function getProduto($descricao, $one = false) {

        $this->db->select('idProdutos,descricao,valorUnitario');
        $this->db->from('produtos');
        $this->db->like('descricao', $descricao);


        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }
    
    function getServico($descricao, $one = false) {

        $this->db->select('idServicos,descricao,valorUnitario');
        $this->db->from('servicos');
        $this->db->like('descricao', $descricao);


        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }

    function getTarefas($idNegocio, $one = false) {
        $this->db->from('tarefas_negocios');
        $this->db->where('idNegocio', $idNegocio);
        $this->db->where('status', "aberto");
        $this->db->order_by('data', 'cres');

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
        $this->db->join('empresas', 'empresas.idEmpresas = negocios.idEmpresas');

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }

    function getNegociosLista($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $a, $b) {

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by($a, $b);
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }
        $this->db->join('empresas', 'empresas.idEmpresas = negocios.idEmpresas');
        $this->db->join('contatos', 'contatos.idContatos = negocios.idContatos');
        $this->db->join('usuarios', 'usuarios.idusuarios = negocios.vendedor');

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

    function valorTotalNegocios($table, $where) {
        $this->db->select_sum('valorDoNegocio');
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->get()->row()->valorDoNegocio;
    }

    function existeContrato($idWBA) {
        $this->db->where('idwba', $idWBA);
        $existe = $this->db->get('negocios');
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
        $this->db->where('idNegocio', $id);
        $this->db->limit(1);
        return $this->db->get('negocios')->row();
    }

    function getByIdEmpresas($id) {
        $this->db->where('idEmpresas', $id);
        $this->db->limit(1);
        return $this->db->get('empresas')->row();
    }

    function getByIdContatos($id) {
        $this->db->where('idEmpresas', $id);
        $this->db->limit(1);
        return $this->db->get('contatos')->row();
    }

    function getByIdTarefas($id) {
        $this->db->where('idNegocio', $id);
        $this->db->limit(1);
        return $this->db->get('tarefas_negocios')->row();
    }

    function count($table) {
        return $this->db->count_all($table);
    }

  
    function countEmpresaExiste($idEmpresas) {
        $this->db->where('idEmpresas', $idEmpresas);
        $this->db->from('empresas');
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

    function getByIdContato($id) {
        $this->db->where('idEmpresas', $id);
        $this->db->limit(1);
        return $this->db->get('contatos')->row();
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

    public function getTimelineNegocios($id = null) {

        $this->db->select('*');
        $this->db->from('timeline_negocios');
        $this->db->where('idNegocio', $id);
        $this->db->order_by('idTimeline_negocios', 'desc');
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
        $this->db->order_by('idPropostas', 'DESC');

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
