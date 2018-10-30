<?php
class Register extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('blogi/register_model');
    }
    
    public function index() {
        $data['main_content'] = 'blogi/register_view';
        $this->load->view('template',$data);
    }
    function tarkistaArray($arr) {
        return array_search("", $arr) !== false;
    }
    
    public function register() {
        if ($this->input->post('salasana2') != $this->input->post('salasana')) {
            $this->session->set_flashdata('error_msg', 'Salasanat eivät täsmää.');
            redirect('register');
        }
        else {
            $user = array(
                'etunimi'   =>$this->input->post('etunimi'),
                'sukunimi'  =>$this->input->post('sukunimi'),
                'tunnus'    =>$this->input->post('tunnus'),
                'salasana'  =>md5($this->input->post('salasana')),
                'email'     =>$this->input->post('email')
            );
            if ($this->tarkistaArray($user)) {
                $this->session->set_flashdata('error_msg', 'Täytä kaikki kentät.');
                redirect('register');
            }
            else if ($this->register_model->tarkista_tunnus($user['tunnus'])){
                $this->register_model->register($user);
                $this->session->set_flashdata('success_msg', 'Rekisteröinti onnistui. Voit nyt kirjautua sisään.');
                redirect('blogi');
            }
            else {
                $this->session->set_flashdata('error_msg', 'Tunnus on jo olemassa.');
                redirect('register');
            }
                
        }
    }
}
