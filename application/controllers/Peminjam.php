<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Peminjam extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->model('model_peminjam');
            if($this->session->userdata('level') != "Peminjam"){
                redirect(site_url("login"));}
		
	}
 
	function index(){
        $data['user'] = $this->model_peminjam->cekData(['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('peminjam/view_beranda', $data);
		$this->load->view('template/footer');
	}

    function list(){
        $data['tb_barang'] = $this->model_peminjam->list()->result();
        
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('peminjam/view_barang', $data);
		$this->load->view('template/footer');
    }

    function profile(){
     
        $username = $this->session->userdata('username');
        $this->db->select('username, id');
        $this->db->where('username', $username);//
        $this->db->from('tb_user');
        $query = $this->db->get()->row();

        $id = $query->id;   

        //$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
        $data['tb_user'] = $this->db->get_where('tb_user', array(
            'id =' => $id))->result();
        
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('peminjam/view_profile', $data);
		$this->load->view('template/footer');
    }

	function add($id){
		$where = array('id_barang' => $id);
        $data['tb_barang'] = $this->model_peminjam->pinjam($where,'tb_barang')->result();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('peminjam/view_peminjaman', $data);

    }
    
    function detail($id){
		$where = array('id_peminjaman' => $id);
        $data['view_laporan'] = $this->model_peminjam->detail($where,'view_laporan')->result();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('peminjam/view_detail', $data);
        $this->load->view('template/footer');

    }
    
    function laporan(){
        $username = $this->session->userdata('username');
        $this->db->select('username, id');
        $this->db->where('username', $username);//
        $this->db->from('tb_user');
        $query = $this->db->get()->row();

        $id = $query->id;

        //$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
        $data['view_laporan'] = $this->db->get_where('view_laporan', array(
            'status =' => 'Di pinjam',
            'id_user =' => $id))->result();

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
	    $this->load->view('peminjam/view_laporan', $data);
		$this->load->view('template/footer');
      
    }

    function laporan2(){
        $username = $this->session->userdata('username');
        $this->db->select('username, id');
        $this->db->where('username', $username);//
        $this->db->from('tb_user');
        $query = $this->db->get()->row();

        $id = $query->id;

        //$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
        $data['view_laporan'] = $this->db->get_where('view_laporan', array(
            'status =' => 'Di booking',
            'id_user =' => $id))->result();

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
	    $this->load->view('peminjam/view_laporan', $data);
		$this->load->view('template/footer');
      
    }

    function laporan3(){
        $username = $this->session->userdata('username');
        $this->db->select('username, id');
        $this->db->where('username', $username);//
        $this->db->from('tb_user');
        $query = $this->db->get()->row();

        $id = $query->id;

        //$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
        $data['view_laporan'] = $this->db->get_where('view_laporan', array(
            'status =' => 'Kembali',
            'id_user =' => $id))->result();

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
	    $this->load->view('peminjam/view_laporan', $data);
		$this->load->view('template/footer');
      
    }

    function keuangan(){
        $username = $this->session->userdata('username');
        $this->db->select('username, id');
        $this->db->where('username', $username);//
        $this->db->from('tb_user');
        $query = $this->db->get()->row();

        $id = $query->id;

        //$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
        $data['view_laporan'] = $this->db->get_where('view_laporan', array(
            'status =' => 'Penggantian Barang',
            'id_user =' => $id))->result();

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
	    $this->load->view('peminjam/view_laporan_pembayaran', $data);
		$this->load->view('template/footer');
    }

	function save()
    {   
		$username = $this->session->userdata('username');
        $this->db->select('username, id');
        $this->db->where('username', $username);//
        $this->db->from('tb_user');
        $query = $this->db->get()->row();
     // return print($username);
        
        $id = $query->id;
        $id_barang = $this->input->post('id_barang');
        $jumlah_pinjam = $this->input->post('jumlah_pinjam');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');
        $status = "Di booking";
        $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');
        $kondisi_saat_pinjam = $this->input->post('kondisi_saat_pinjam');
        
        $data = array (
            'id_user' => $id,
            'id_barang' => $id_barang,
            'jumlah_pinjam' => $jumlah_pinjam,
            'tanggal_pinjam' => $tanggal_pinjam,
            'status' => $status,
            'tanggal_pengembalian' => $tanggal_pengembalian,
            'kondisi_saat_pinjam' => $kondisi_saat_pinjam        
            ); 

        $this->db->select('stok, id_barang');
        $this->db->where('id_barang', $id_barang);
        $this->db->from('tb_barang');
        $query1 = $this->db->get()->row();
        
        $oldStok = $query1->stok;
        $newStok = $oldStok - $jumlah_pinjam;

        $stok = array (
            'stok' => $newStok
        );

        $where = array (
            'id_barang' => $id_barang
        );

        $this->model_peminjam->save($data, 'tb_peminjaman');
        $this->model_peminjam->update($where, $stok, 'tb_barang');
        redirect('peminjam/list');
    }

    public function profile_update()
    {   
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
        if ($this->form_validation->run() == false) {
			$username = $this->session->userdata('username');
            $this->db->select('username, id');
            $this->db->where('username', $username);//
            $this->db->from('tb_user');
            $query = $this->db->get()->row();

            $id = $query->id;   

            //$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
            $data['tb_user'] = $this->db->get_where('tb_user', array(
                'id =' => $id))->result();
            
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('peminjam/view_profile', $data);
            $this->load->view('template/footer');
        } else {
        $data['user'] = $this->model_peminjam->cekData(['username' => $this->session->userdata('username')])->row_array();
		$username = $this->session->userdata('username');
        $this->db->select('username, id');
        $this->db->where('username', $username);//
        $this->db->from('tb_user');
        $query = $this->db->get()->row();
     // return print($username);
        
        $id = $query->id;
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'pro' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
        $gambar_lama =trim($data['user']['image']);
        if ($gambar_lama != 'default.jpg') {
            $path = './assets/img/profile/'.$gambar_lama;
            chmod($path, 0777);
            unlink($path);
            
        //unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
        }
        $gambar_baru = $this->upload->data('file_name');
        $this->db->set('image', $gambar_baru);
        } else { }
        }
    
        $data = array (
            'nama_peminjam' => $nama,
            'kelas' => $kelas,
            'no_telp' => $no_telp,
            'alamat' => $alamat    
            );
            
        $data1 = array (
            'nama_peminjam' => $nama,
            'kelas' => $kelas,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
            'image' => $gambar_baru    
            );

        $data2 = array (
            'password' =>  $this->hash_password($password),
            'nama_peminjam' => $nama,
            'kelas' => $kelas,
            'no_telp' => $no_telp,
            'alamat' => $alamat       
            ); 

        $where = array (
            'id' => $id
        );

        if($password != null){

            $this->model_peminjam->update($where, $data2, 'tb_user');
        }
        elseif($gambar_baru != null){

            $this->model_peminjam->update($where, $data3, 'tb_user');
        }
        else{

            $this->model_peminjam->update($where, $data, 'tb_user');
        
        }
        $this->session->set_flashdata('Message', 'Data berhasil di update !');

        redirect('peminjam/profile');
    }
}
    

    private function hash_password($password) {
        return password_hash($password, PASSWORD_BCRYPT);
       }
 
}