<?php

class Calendario_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    public function getEventos($usuario) {
        $this->db->select('*');
        $this->db->from('calendario');
        if ($usuario) {
            $this->db->where('usuario', $usuario);
        }
        
        return $this->db->get()->result();
    }

    public function updateEventos($param) {
        $campos = array(
            'start' => $param['start'],
            'end' => $param['end']
        );

        $this->db->where('id', $param['id']);
        $this->db->update('calendario', $campos);

        if ($this->db->affected_rows() == 1) {
            return 1;
        } else {
            return 0;
        }
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
     function getById($id) {
        $this->db->where('id', $id);
        $this->db->limit(1);
        return $this->db->get('calendario')->row();
    }
    
    function getUsuarios() {

        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->order_by('nome');
        
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

}
