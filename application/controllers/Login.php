<?php 
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('model_login');
 
	}
 
	function index(){
		$this->load->view('view_login');
	}

    public function regis(){
        $data = new stdClass();
        //Validation Rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_user.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        if ($this->form_validation->run() == false) {
         $this->load->view('view_regis', $data);
        } else {
         $username= $this->input->post('username');
         $password = $this->input->post('password');
         $level = "Peminjam";
         if ($this->model_login->create_user($username, $password, $level)) {
          redirect('login');
         } else {
          redirect('login/regis');
         }
        }
       }
 
    public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
    
	public function aksi_login(){
        if($this->session->userdata('status') == "login"){
         //jika memang session sudah terdaftar
         redirect('peminjam');
        } else {
         $this->form_validation->set_rules('username', 'Username', 'required');
         $this->form_validation->set_rules('password', 'Password', 'required');
         //jika session belum terdaftar
         if ($this->form_validation->run() == false) {
          $this->load->view('view_login');
         } else {
          $email_user= $this->input->post('username');
          $pass_user = $this->input->post('password');
          $checking = $this->model_login->check_login($email_user,$pass_user);
          if ($checking == true) {
           foreach ($checking as $apps) {
            $session_data = array(
            'id_user'   => $apps->id_user,
            'email_user' => $apps->email_user,
            'pass_user' => $apps->pass_user,
            'name_user' => $apps->name_user,
            'status' => "login"
           );
           $this->session->set_userdata($session_data);
           redirect('peminjam');
          }
         } else {
          $this->load->view('view_login');
         }
        }
       }
    }
}
