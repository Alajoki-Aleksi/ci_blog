<?php

class Kommentti extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('blogi/kirjoitus_model');
        $this->load->model('blogi/kommentti_model');
    }
    public function index($id) {
        $kirjoitus = $this->kirjoitus_model->hae_kirjoitus($id);
        if (isset($kirjoitus[0])) {
            $data = array(
                'id'            => $kirjoitus[0]->id,
                'otsikko'       => $kirjoitus[0]->otsikko,
                'teksti'        => $kirjoitus[0]->teksti,
                'tunnus'        => $kirjoitus[0]->tunnus,
                'paivays'       => $kirjoitus[0]->paivays,
            );
            $data['kommentit'] = $this->kommentti_model->hae_kommentit($id);
            $data['kommentit_view'] = "blogi/kommentit_view";
            $data['main_content'] = "blogi/kirjoitus_view";
            

            $this->load->view('template_kommentit',$data);
        }
        else {
            $this->session->set_flashdata('error_msg', 'Kirjoitusta ei löydy tietokannasta.');
            redirect('blogi');
        }
    }
    public function tallenna() {
        $data = array(
            'kayttaja_id' => $this->session->userdata('id'),
            'kirjoitus_id' => $this->input->post('kirjoitus_id'),
            'teksti' => $this->input->post('teksti'),
        );
        $this->kommentti_model->tallenna($data);
        redirect('kommentti/index/' . $this->input->post('kirjoitus_id'));
    }
    
    
    public function poista($id) {
        if ($this->session->userdata('id') == $this->kommentti_model->tarkista_id($id)) {
     
            $kirjoitus_id = $this->kommentti_model->get_kirjoitus_id($id);
            $this->kommentti_model->poista($id);
            $this->session->set_flashdata('success_msg', 'Kommentti poistettu.');
            $this->index(intval($kirjoitus_id->id));

        }
        else {
            $this->session->set_flashdata('error_msg', 'Virhe. Kirjaudu sisään.');
            redirect('blogi');
        }
    }
}

