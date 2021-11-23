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
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        if ($this->form_validation->run() == false) {
         $this->load->view('view_regis', $data);
        } else {
         $username= $this->input->post('username');
         $password = $this->input->post('password');
         $level = "Peminjam";
         $nama = $this->input->post('nama');
         if ($this->model_login->create_user($username, $password, $level, $nama)) {
          redirect('login');
         } else {
          echo "<script>alert('Wrong Username. Try again.')</script>";
          redirect('login/regis');
         }
        }
       }
 
    public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
    
	public function aksi_login(){
     
         $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
         $this->output->set_header("Pragma: no-cache");
         $this->form_validation->set_rules('username', 'Username', 'required');
         $this->form_validation->set_rules('password', 'Password', 'required');
         //jika session belum terdaftar
         if ($this->form_validation->run() == false) {
          $this->load->view('view_login');
         } else {
          $username= $this->input->post('username');
          $password = $this->input->post('password');
          $checking = $this->model_login->check_login($username,$password);

          if ($checking == true) {
           foreach ($checking as $apps) {
            $session_data = array(
            'username' => $apps->username,
            'password' => $apps->password,
            'nama_peminjam' => $apps->nama_peminjam,
            'status' => "login",
            'level' => $apps->level
           );
           $level = $apps->level;
           $this->session->set_userdata($session_data);
           
          }

          if($level == 'Admin'){
            redirect('admin/index');
           }
 
             // access login for Peminjam
          elseif($level == 'Peminjam'){
            redirect('peminjam/index');
          }
         } else {
          $this->load->view('view_login');
         }
        }
       }
    }
