<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->model('model_peminjam');
            if($this->session->userdata('level') != "Admin"){
                redirect(site_url("login"));}
		
	}
 
	function index(){
		$data['view_laporan'] = $this->db->get_where('view_laporan', array(
			'status =' => 'Di pinjam', 'tanggal_pinjam=' => date('Y-m-d')))->result();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_beranda', $data);
		$this->load->view('admin/footer');
	}

	//fungsi untuk menampilkan data anggota
    function anggota(){
        //$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
        $data['anggota'] = $this->db->get_where('tb_user', array('level =' => 'Peminjam'))->result();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
	    $this->load->view('admin/view_anggota', $data);
		$this->load->view('admin/footer');
	}
	//fungsi untuk menampilkan detail anggota
	function detail_anggota($id){
		$where = array('id' => $id);
        $data['anggota'] = $this->model_peminjam->detail($where,'tb_user')->result();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_detail_anggota', $data);
        $this->load->view('admin/footer');
    }
	//fungsi untuk menampilkan halaman edit anggota
	function edit_anggota($id){
		$where = array('id' => $id);
        $data['anggota'] = $this->model_peminjam->pinjam($where,'tb_user')->result();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_editAnggota', $data);
		$this->load->view('admin/footer');
    }
	//fungsi untuk proses update anggota
	public function update_anggota($id){   
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
        if ($this->form_validation->run() == false) {
			$where = array('id' => $id);
        	$data['anggota'] = $this->model_peminjam->pinjam($where,'tb_user')->result();
        	$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/view_editAnggota', $data);
        }else{
			$password = $this->input->post('password');
			$nama = $this->input->post('nama');
			$kelas = $this->input->post('kelas');
			$no_telp = $this->input->post('no_telp');
			$alamat = $this->input->post('alamat');
        
			$data = array (
				'nama_peminjam' => $nama,
				'kelas' => $kelas,
				'no_telp' => $no_telp,
				'alamat' => $alamat,       
				); 

			$data2 = array (
				'password' =>  $this->hash_password($password),
				'nama_peminjam' => $nama,
				'kelas' => $kelas,
				'no_telp' => $no_telp,
				'alamat' => $alamat,       
				); 

			$where = array (
				'id' => $id
			);

			if($password != null){
				$this->model_peminjam->update($where, $data2, 'tb_user');
			}
			else{
				$this->model_peminjam->update($where, $data, 'tb_user');
			}
			$this->session->set_flashdata('Message', 'Data Anggota berhasil di Updated !');
			redirect('admin/anggota');
		}
	}
	//fungsi untuk menampilkan data list barang
	function list_barang(){
        $data['tb_barang'] = $this->model_peminjam->list()->result();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_barang', $data);
		$this->load->view('admin/footer');
    }
	//fungsi untuk form tambah barang
	function add_barang(){
    //Tampilkan Form Tambah Barang
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/view_tambah_barang');
    $this->load->view('admin/footer');
    }
	//fungsi untuk proses tambah barang
    function save_barang(){
      //Eksekusi Tambah Barang
		$nama = $this->input->post('nama');
		$stok = $this->input->post('stok');
		$kondisi = $this->input->post('kondisi');
		$gambar = $this->input->post('gambar');

		$config['upload_path']      = './assets/img/';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']         = '2400';//Ukuran Data Dalam Kilobyte
		$config['max_width']        = '2024';
		$config['max_height']       = '2024';

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('gambar')){
			$this->session->set_flashdata('failed', 'Upload Gambar Gagal');
			redirect(site_url('admin/list_barang'));
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());
			//create thumbnail gambar
			$config['image_library']    = 'gd2';
			$config['source_image']     = './assets/img/'.$upload_gambar['upload_data']['file_name'];
			//lokasi folder thumbnail
			$config['new_image']        = './assets/img/thumbs/';
			$config['create_thumb']     = TRUE;
			$config['maintain_ratio']   = TRUE;
			$config['width']            = 250;//Ukuran Dalam Pixel
			$config['height']           = 250;//Ukuran Dalam Pixel
			$config['thumb_marker']     = '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			//end thumbnail gambar
			$data = array(
				'id_barang' => NULL,
				'nama_barang' => $nama,
				'stok' => $stok,
				'kondisi' => $kondisi,
				'gambar' => $upload_gambar['upload_data']['file_name'],
			);
			$exe = $this->model_peminjam->insert_barang('tb_barang',$data);
			if($exe){
				$this->session->set_flashdata('message', 'Berhasil disimpan');
				redirect(site_url('admin/list_barang'));
			}else{
				$this->session->set_flashdata('message1', 'Gagal disimpan');
				redirect(site_url('admin/list_barang'));	
			}
			//Kalau Error
		}
    }
	//fungsi untuk menampilkan halaman edit barang
	function edit_barang($id){
		$data['databarang'] = $this->model_peminjam->editbarang('tb_barang',$id);
		//Tampilkan Form Tambah Barang
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_edit_barang', $data);
		$this->load->view('admin/footer');
	}
	//fungsi untuk proses update barang
	function update_barang(){
	//Eksekusi Tambah Barang
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$stok = $this->input->post('stok');
		$kondisi = $this->input->post('kondisi');
		$gambar = $this->input->post('gambar');

		$config['upload_path']      = './assets/img/';
		$config['allowed_types']    = 'jpg|png|jpeg';
		$config['max_size']         = '2400';//Ukuran Data Dalam Kilobyte
		$config['max_width']        = '2024';
		$config['max_height']       = '2024';

		$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
				$data = array(
					'nama_barang' => $nama,
					'stok' => $stok,
					'kondisi' => $kondisi,
				);
				$exe = $this->model_peminjam->upbarang('tb_barang',$data,$id);
				if($exe){
					$this->session->set_flashdata('message', 'Data barang berhasil disimpan');
					redirect(site_url('admin/list_barang'));
				}else{
					$this->session->set_flashdata('message1', 'Data barang gagal di tambahkan');
				redirect(site_url('admin/list_barang'));
				}
			}else{
				$upload_gambar = array('upload_data' => $this->upload->data());

				//create thumbnail gambar
				$config['image_library']    = 'gd2';
				$config['source_image']     = './assets/img/'.$upload_gambar['upload_data']['file_name'];
				//lokasi folder thumbnail
				$config['new_image']        = './assets/img/thumbs/';
				$config['create_thumb']     = TRUE;
				$config['maintain_ratio']   = TRUE;
				$config['width']            = 250;//Ukuran Dalam Pixel
				$config['height']           = 250;//Ukuran Dalam Pixel
				$config['thumb_marker']     = '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
				//end thumbnail gambar
				$data = array(
					'nama_barang' => $nama,
					'stok' => $stok,
					'kondisi' => $kondisi,
					'gambar' => $upload_gambar['upload_data']['file_name'],
			);
			$exe = $this->model_peminjam->upbarang('tb_barang',$data,$id);
			if($exe){
				$this->session->set_flashdata('message', 'Berhasil diupdate');
				redirect(site_url('admin/list_barang'));
			}else{
				$this->session->set_flashdata('message1', 'Gagal diupdate');
				redirect(site_url('admin/list_barang'));	
			}
			//Kalau Error
		}
	}
	//fungsi untuk proses menghapus barang
	function delete_barang($id){
        $data= $this->db->get_where('tb_peminjaman', array(
            'id_barang =' => $id, 'status !=' => 'Kembali'))->result();
	
		if($data == null){
		$del = $this->model_peminjam->delbarang('tb_barang',$id);
			if($del){
				$this->session->set_flashdata('message', 'Berhasil dihapus');
				redirect(site_url('admin/list_barang'));
			}else{
				$this->session->set_flashdata('message1', 'Data gagal dihapus, karena masih ada peminjaman');
				redirect(site_url('admin/list_barang'));
			}
		}
		else{
			$this->session->set_flashdata('message1', 'Data gagal dihapus, karena masih ada peminjaman');
			redirect(site_url('admin/list_barang'));
		}
	}
	//fungsi halaman menampilkan list booking
	function booking(){
        //$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
        $data['view_laporan'] = $this->db->get_where('view_laporan', array('status =' => 'Di booking'))->result();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
	    $this->load->view('admin/view_booking', $data);
		$this->load->view('admin/footer');
    }
	//fungsi untuk memproses acc booking
	function acc($id){
		$where = array('id_peminjaman' => $id);
		$data = array ('status' => 'Di pinjam');
        $this->model_peminjam->update($where, $data, 'tb_peminjaman');
		$this->session->set_flashdata('Message', 'Data peminjaman berhasil di ACC !');
        redirect('admin/booking');
    }
	//fungsi untuk menampilkan halaman ubah profile
    function profile(){
        $username = $this->session->userdata('username');
        $this->db->select('username, id');
        $this->db->where('username', $username);//
        $this->db->from('tb_user');
        $query = $this->db->get()->row();
        $id = $query->id;   

        //$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
        $data['tb_user'] = $this->db->get_where('tb_user', array('id =' => $id))->result();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_profile', $data);
		$this->load->view('admin/footer');
    }
	//fungsi untuk proses update data user/ profile
	public function profile_update(){   
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
        if ($this->form_validation->run() == false) {
			$username = $this->session->userdata('username');
        	$this->db->select('username, id');
        	$this->db->where('username', $username);//
        	$this->db->from('tb_user');
        	$query = $this->db->get()->row();
			$id = $query->id;   

			//$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
			$data['tb_user'] = $this->db->get_where('tb_user', array('id =' => $id))->result();
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/view_profile', $data);
			$this->load->view('admin/footer');
        } else {
			$username = $this->session->userdata('username');
			$this->db->select('username, id');
			$this->db->where('username', $username);//
			$this->db->from('tb_user');
			$query = $this->db->get()->row();
		// return print($username);
			
			$id = $query->id;
			$password = $this->input->post('password');
			$nama = $this->input->post('nama');
			
			$data = array (
				'nama_peminjam' => $nama    
				); 

			$data2 = array (
				'password' =>  $this->hash_password($password),
				'nama_peminjam' => $nama      
				); 

			$where = array (
				'id' => $id
			);

			if($password != null){

				$this->model_peminjam->update($where, $data2, 'tb_user');
			}
			else{

				$this->model_peminjam->update($where, $data, 'tb_user');
			
			}
			$this->session->set_flashdata('Message', 'Data berhasil di update !');
			redirect('admin/profile');
		}
	}
	//fungsi untuk hash_password
	private function hash_password($password){
        return password_hash($password, PASSWORD_BCRYPT);
       }
	//fungsi untuk hapus_anggota 
	function delete_anggota($id){
		$data= $this->db->get_where('tb_peminjaman', array('id_user =' => $id, 'status !=' => 'Kembali'))->result();

		if($data == null){
			$del = $this->model_peminjam->deluser('tb_user',$id);
			if($del){
				$this->session->set_flashdata('Message', 'Data berhasil di hapus !');
				redirect(site_url('admin/anggota'));
			}else{
				$this->session->set_flashdata('Message1', 'Data tidak berhasil di hapus karena masih ada peminjaman !');
				redirect(site_url('admin/anggota'));
			}
		}else{
				$this->session->set_flashdata('Message1', 'Data tidak berhasil di hapus karena masih ada peminjaman !');
				redirect(site_url('admin/anggota'));
		}
	}
	//fungsi untuk menampilkan halaman list peminjaman
	function list_peminjaman(){
		//$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where, 'view_laporan')->result();
		$data['view_laporan'] = $this->db->get_where('view_laporan', array('status =' => 'Di pinjam'))->result();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_peminjaman', $data);
		$this->load->view('admin/footer');
	}

	//fungsi untuk menampilkan list pengembalian 
	function list_pengembalian(){
		$data['view_laporan'] = $this->db->get_where('view_laporan', array('status =' => 'Kembali'))->result();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_list_pengembalian', $data);
		$this->load->view('admin/footer');
	}
	//fungsi untuk menampilkan halaman pengembalian
	function pengembalian($id){
		$where = array('id_peminjaman' => $id);
		$data['view_laporan'] = $this->model_peminjam->detail($where, 'view_laporan')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_pengembalian', $data);
		$this->load->view('admin/footer');
	}
	//fungsi untuk proses pengembalian
	function update_pengembalian(){   
		$id_peminjaman = $this->input->post('id_peminjaman');
		$tanggal_kembali = $this->input->post('tanggal_kembali');
        $kondisi = $this->input->post('kondisi');
        $denda = $this->input->post('denda');
        $biaya = $this->input->post('biaya');
		$id_barang = $this->input->post('id_barang');
		$jumlah_pinjam = $this->input->post('jumlah_pinjam');
            
        $data = array (
            'tanggal_kembali' => $tanggal_kembali,
            'kondisi_kembali' => $kondisi,
            'denda' => $denda,
            'biaya_penggantian_barang' => $biaya,
			'status' => 'Kembali'  
            ); 

		$data2 = array (
            'tanggal_kembali' => $tanggal_kembali,
            'kondisi_kembali' => $kondisi,
            'denda' => $denda,
            'biaya_penggantian_barang' => $biaya,
			'status' => 'Penggantian Barang'  
            ); 

        $this->db->select('stok, id_barang');
        $this->db->where('id_barang', $id_barang);
        $this->db->from('tb_barang');
        $query1 = $this->db->get()->row();
        
        $oldStok = $query1->stok;
        $newStok = $oldStok + $jumlah_pinjam;

		$stok = array(
			'stok' =>$newStok
		);

        $where = array (
            'id_peminjaman' => $id_peminjaman
        );

		$where2 = array(
			'id_barang' => $id_barang
		);

		if($kondisi == "Berfungsi"){
			$this->model_peminjam->update($where, $data, 'tb_peminjaman');
			$this->model_peminjam->update($where2, $stok, 'tb_barang');
			$this->session->set_flashdata('Message', 'Proses pengembalian barang berhasil !');        	
			redirect('admin/list_pengembalian');
		}
		else{
			$this->model_peminjam->update($where, $data2, 'tb_peminjaman');
        	$this->session->set_flashdata('Message', 'Lunasi pembayaran ganti rugi barang !');
			redirect('admin/gantiBarang');
		}
    }
	//fungsi untuk menampilkan detail pengembalian
	function detail_pengembalian($id){
		$where = array('id_peminjaman' => $id);
        $data['pengembalian'] = $this->model_peminjam->detail($where,'view_laporan')->result();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/detail_pengembalian', $data);
        $this->load->view('admin/footer');
    }
	//fungsi untuk menampilkan list data peminjaman status = penggantian barang
	function gantiBarang(){
		//$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
		$data['view_laporan'] = $this->db->get_where('view_laporan', array(
			'status =' => 'Penggantian Barang'
		))->result();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_gantiuang', $data);
		$this->load->view('admin/footer');
	}
	//fungsi untuk menampilkan halaman ganti barang/bayar
	function bayar($id){
		$where = array('id_peminjaman' => $id);
		$data['view_laporan'] = $this->model_peminjam->detail($where, 'view_laporan')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_bayar', $data);
		$this->load->view('admin/footer');
	}
	//fungsi untuk proses pembayaran
	function update_bayar(){
		$id_peminjaman = $this->input->post('id_peminjaman');
		$id_barang = $this->input->post('id_barang');
		$status = "Kembali";
		$jumlah_pinjam = $this->input->post('jumlah_pinjam');

		$this->db->select('stok, id_barang');
		$this->db->where('id_barang', $id_barang);
		$this->db->from('tb_barang');
		$query3 = $this->db->get()->row();

		$oldStok = $query3->stok;
		$newStok = $oldStok + $jumlah_pinjam;

		$data = array(
			'status' => $status
		);

		$stok = array(
			'stok' => $newStok
		);

		$this->db->select('stok, id_barang');
		$this->db->where('id_barang', $id_barang);
		$this->db->from('tb_barang');
		$query3 = $this->db->get()->row();

		$oldStok = $query3->stok;
		$newStok = $oldStok + $jumlah_pinjam;

		$stok = array(
			'stok' => $newStok
		);

		$where = array(
			'id_peminjaman' => $id_peminjaman
		);

		$where2 = array(
			'id_barang' => $id_barang
		);

		$this->model_peminjam->update($where, $data, 'tb_peminjaman');
		$this->model_peminjam->update($where2, $stok, 'tb_barang');
		$this->session->set_flashdata('Message3', 'Proses pembayaran penggantian barang berhasil');
		redirect('admin/gantiBarang');
	}

}