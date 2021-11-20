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
        if($this->session->userdata('status') == "login"){
         //jika memang session sudah terdaftar
         redirect('peminjam/list');
        } else {
         $this->form_validation->set_rules('username', 'Username', 'required');
         $this->form_validation->set_rules('password', 'Password', 'required');
         //jika session belum terdaftar

         if ($this->form_validation->run() == false) {
          $this->load->view('view_login');
         } else {
          $username= $this->input->post('username');
          $password = $this->input->post('password');
          $nama_peminjam = $this->input->post('nama');
          
          $this->db->select('level, username');
          $this->db->where('username', $username);
          $this->db->from('tb_user');
          $query1 = $this->db->get()->row();
          $level = $query1->level;
         // return print($level);

          $checking = $this->model_login->check_login($username,$password, $nama_peminjam);

          if ($checking == true) {
           foreach ($checking as $apps) {
            $session_data = array(
            'username' => $apps->username,
            'password' => $apps->password,
            'nama_peminjam' => $apps->nama_peminjam,
            'status' => "login"
           );
           $this->session->set_userdata($session_data);

           if($level === 'Admin'){
            redirect('admin/index');
           }
 
             // access login for Peminjam
          elseif($level === 'peminjam'){
            redirect('peminjam/index');
          }
          else{
            echo $this->session->set_flashdata('msg','Username or Password is Wrong');
            redirect('login');
          }
           
           redirect('peminjam/list');
          }
         } else {
          $this->load->view('view_login');
         }
        }
       }
    }
}
