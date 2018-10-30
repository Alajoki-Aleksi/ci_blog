<?php
class Login extends CI_Controller {
 
    public function __construct(){
        
        parent::__construct();
        $this->load->model('blogi/login_model');
    }
    
    
    public function index() {
        $data['main_content'] = 'blogi/login_view.php';
        $this->load->view('template',$data);
    }
    
    
    public function login() {
        $user_login = array(
            'tunnus'=>$this->input->post('tunnus'),
            'salasana'=>md5($this->input->post('salasana'))
        );
 
        $data=$this->login_model->login($user_login['tunnus'],$user_login['salasana']);
        
        if ($data) {
            $this->session->set_userdata('id',$data['id']);
            $this->session->set_userdata('tunnus',$data['tunnus']);
            $this->session->set_flashdata('success_msg', 'Olet nyt kirjautunut sisään käyttäjänä ' . $this->session->userdata('tunnus') . '.');
            redirect('blogi');

 
        }
        else {
            $this->session->set_flashdata('error_msg', 'Kirjautuessa tapahtui virhe. Yritä uudelleen.');
            redirect('login');
        }
    }
    
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('blogi');
    }
}

