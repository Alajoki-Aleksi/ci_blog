<?php

class Blogi extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('blogi/kirjoitus_model');
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $data['kirjoitukset'] = $this->kirjoitus_model->hae_kirjoitukset();
        $data['main_content'] = 'blogi/index';
        $this->load->view('template',$data);
    }
    
    

    public function kirjoitus_view($id) {
        $kirjoitus = $this->kirjoitus_model->hae_kirjoitus($id);
        
        if (isset($kirjoitus[0])) {
            $data = array(
                'id'            => $kirjoitus[0]->id,
                'otsikko'       => $kirjoitus[0]->otsikko,
                'teksti'        => $kirjoitus[0]->teksti,
                'tunnus'        => $kirjoitus[0]->tunnus,
                'paivays'       => $kirjoitus[0]->paivays,
            );
            
            $data['main_content'] = 'blogi/kirjoitus_view';
            $data['kommentit_view'] = 'blogi/kommentit_view';
            $this->load->view('template_kommentit',$data);
        }
        else {
            $this->session->set_flashdata('error_msg', 'Kirjoitusta ei löydy tietokannasta.');
            redirect('blogi');
        }
    }
    
    
    public function tallenna() {
        if ($this->session->userdata('id')) {
            $data = array(
            'kayttaja_id' => $this->session->userdata('id'),
            'teksti' => $this->input->post('teksti'),
            'otsikko' => $this->input->post('otsikko'),
            );
            $this->kirjoitus_model->tallenna($data);
            $this->session->set_flashdata('success_msg', 'Uusi kirjoitus tallennettu.');
            redirect('blogi');
        }
        else {
            $this->session->set_flashdata('error_msg', 'Virhe. Kirjaudu sisään.');
            redirect('blogi');
        }
    }
    
    public function poista($id) {
        if ($this->session->userdata('id') == $this->kirjoitus_model->tarkista_id($id)) {
            $this->kirjoitus_model->poista(intval($id));
            $this->session->set_flashdata('success_msg', 'Kirjoitus poistettu.');
            redirect('blogi');
        }
        else {
            $this->session->set_flashdata('error_msg', 'Virhe. Kirjaudu sisään.');
            redirect('blogi');
        }
    }
    
    public function uusikirjoitus() {
        $data['main_content'] = 'blogi/uusikirjoitus_view';
        $this->load->view('template',$data);
    }
    
    
    
    
    
    public function muokkaa($id) {
        $asiakas = $this->asiakas_model->hae($id);
        
        if (isset($asiakas[0])) {
            $data = array(
                'id'                => $asiakas[0]->id,
                'sukunimi'          => $asiakas[0]->sukunimi,
                'etunimi'           => $asiakas[0]->etunimi,
                'lahiosoite'        => $asiakas[0]->lahiosoite,
                'postinumero'       => $asiakas[0]->postinumero,
                'postitoimipaikka'  => $asiakas[0]->postitoimipaikka,
            );
            $data['main_content'] = 'asiakas/lisaa_view';
            $this->load->view('template',$data);
        }
        else {
            throw new Exception("Asiakasta ei löydy rekisteristä.");
        }
    }
    
}

