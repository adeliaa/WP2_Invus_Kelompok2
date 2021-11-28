<?php 
class Login extends CI_Controller{ 
	function __construct(){
		parent::__construct();		
		$this->load->model('model_login');
	}
 //untuk menampilkan halaman login
	function index(){
    $data['judul'] = 'Halaman Login';
		$this->load->view('view_login', $data);
	}
  //untuk melakukan proses regis
  public function regis(){
    $data['judul'] = 'Halaman Regis';
    $data = new stdClass();
    //Validation Rules
    $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_user.username]', 
    array('is_unique' => 'This username already exists. Please choose another one.'));
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
    //kondisi jika validasi false
    if ($this->form_validation->run() == false) {
        $this->load->view('view_regis', $data);
    }else{
        $username= $this->input->post('username');
        $password = $this->input->post('password');
        $level = "Peminjam";
        $image = "default.png";
        $nama = $this->input->post('nama');
        if ($this->model_login->create_user($username, $password, $level, $image,$nama)) {
            $this->session->set_flashdata('flash', 'login');
            redirect('login');
        }else{
            redirect('login/regis');
        }
    }
  }
  //untuk proses logout
  public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
  //untuk proses login
	public function aksi_login(){
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");//membersihkan cache yg tersisa dari login sebelumnya
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    //jika session belum terdaftar atau bernilai false
    if ($this->form_validation->run() == false) {
        $this->load->view('view_login');
    }else{
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
            //kondisi berdasarkan level user
            // access login for Admin
            if($level == 'Admin'){
              redirect('admin/index');
            }
    
            // access login for Peminjam
            elseif($level == 'Peminjam'){
              redirect('peminjam/index');
            }
        }else{
          $this->load->view('view_login');
        }
    }
  }
}
