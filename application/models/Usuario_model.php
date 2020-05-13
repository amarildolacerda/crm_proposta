<?php
class Usuario_model extends CI_Model {

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
        
        $this->db->insert('usuarios',$dados);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;     
          
    }
    
    function exist($email){
        $this->db->where("email", $email);
        $usuario = $this->db->get("usuarios")->row_array();
        return $usuario;
    }
    
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('nome');
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }
    
    function getPermissao($table,$fields){
        
        $this->db->select($fields);
        $this->db->from($table);
        return $this->db->get()->result();
    }

    function getById($id){
        $this->db->where('idusuarios',$id);
        $this->db->limit(1);
        return $this->db->get('usuarios')->row();
    }
    
    function count($table){
		return $this->db->count_all($table);
	}
}