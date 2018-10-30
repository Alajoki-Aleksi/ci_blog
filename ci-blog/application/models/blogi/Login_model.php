<?php

class Login_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function login($tunnus,$salasana) {
        $this->db->select('*');
        $this->db->from('kayttaja');
        $this->db->where('tunnus',$tunnus);
        $this->db->where('salasana',$salasana);
        
        if($query = $this->db->get()) {
            return $query->row_array();
        }
        else {
            return false;
        }
    }
}

