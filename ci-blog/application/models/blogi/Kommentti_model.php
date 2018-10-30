<?php
class Kommentti_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    public function hae_kommentit($id) {
        $this->db->select('kommentti.*,kayttaja.tunnus');
        $this->db->from('kommentti');
        $this->db->where('kommentti.kirjoitus_id',$id);
        $this->db->join('kayttaja','kommentti.kayttaja_id = kayttaja.id','Left');
        $this->db->order_by("kommentti.paivays", "desc");
        $kysely = $this->db->get();
        return $kysely->result();
    }
    public function tallenna($data) {
        $this->db->insert('kommentti',$data);
    }
    public function poista($id) {
        $this->db->where('id', $id);
        $this->db->delete('kommentti'); 
        
    }

    public function get_kirjoitus_id($id) {

        $this->db->select('kirjoitus.id');
        $this->db->from('kirjoitus');
        $this->db->join('kommentti','kommentti.kirjoitus_id = kirjoitus.id','Left');
        $this->db->where('kommentti.id',$id);
        $query = $this->db->get();

        return $query->row();

    }
    
    public function tarkista_id($id) {
        $this->db->select('kayttaja.id');
        $this->db->from('kayttaja');
        $this->db->join('kommentti','kommentti.kayttaja_id = kayttaja.id','Left');
        $this->db->where('kommentti.id',$id);
        $query = $this->db->get();

        return $query->row()->id;
    }

}

