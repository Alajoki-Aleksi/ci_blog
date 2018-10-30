<?php

class Register_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    public function tarkista_tunnus($tunnus) {
        $this->db->select('*');
        $this->db->from('kayttaja');
        $this->db->where('tunnus',$tunnus);
        $query=$this->db->get();
        
        if($query->num_rows()>0){
            return false;
        }
        else {
            return true;
        }
    }
    public function register($user) {
        $this->db->insert('kayttaja', $user);
    }
    

}

