<?php


class Kirjoitus_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function hae_kirjoitukset() {

        $this->db->select('kirjoitus.*,kayttaja.tunnus');
        $this->db->from('kirjoitus');
        $this->db->join('kayttaja','kirjoitus.kayttaja_id = kayttaja.id','Left');
        $this->db->order_by('kirjoitus.paivays', 'desc');
        $kysely = $this->db->get();
        return $kysely->result();
    }
    
    public function hae_kirjoitus($id) {
      
        $this->db->select('kirjoitus.*,kayttaja.tunnus');
        $this->db->from('kirjoitus');
        $this->db->where('kirjoitus.id', $id);
        $this->db->join('kayttaja','kirjoitus.kayttaja_id = kayttaja.id','Left');
        $kysely = $this->db->get();
        return $kysely->result();
    }
    
    public function tarkista_id($id) {
        $this->db->select('kayttaja.id');
        $this->db->from('kayttaja');
        $this->db->join('kirjoitus','kirjoitus.kayttaja_id = kayttaja.id','Left');
        $this->db->where('kirjoitus.id',$id);
        $query = $this->db->get();


        return print_r($query->row());
    }
    
    
    
    public function poista($id) {
        $this->db->where('kirjoitus_id',$id);
        $this->db->delete('kommentti'); 
        
        $this->db->where('id', $id);
        $this->db->delete('kirjoitus'); 
    }
        
    public function tallenna($data) {
        $this->db->insert('kirjoitus',$data);
    }
}


//SELECT kirjoitus.*, kayttaja.tunnus
//FROM kirjoitus
//LEFT JOIN kayttaja ON `kirjoitus`.`kayttaja_id` = `kayttaja`.`id` 



//SELECT `kirjoitus`.*, `kayttaja`.`tunnus` 
//FROM `kirjoitus` 
//LEFT JOIN `kayttaja` ON `kirjoitus`.`kayttaja_id` = `kayttaja`.`id` WHERE `kirjoitus`.`id` = '1'



//$this->db->select('kirjoitus.*,kayttaja.tunnus');
//$this->db->from('kirjoitus');
//$this->db->join('kayttaja','kirjoitus.kayttaja_id = kayttaja.id','Left');
//$query=$this->db->get();

//$this->db->select('tbl_user.username,tbl_user.userid,tbl_usercategory.type');
//$this->db->from('tbl_user');
//$this->db->join('tbl_usercategory','tbl_usercategory.usercategoryid=tbl_user.usercategoryid','Left');
//$query=$this->db->get();


//SELECT `tbl_user`.`username`, `tbl_user`.`userid`, `tbl_usercategory`.`typee` 
//FROM (`tbl_user`) 
//Left JOIN `tbl_usercategory` ON `tbl_usercategory`.`usercategoryid`=`tbl_user`.`usercategoryid`
