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
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_beranda');
		$this->load->view('admin/footer');
	}

    function anggota(){

        //$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
        $data['anggota'] = $this->db->get_where('tb_user', array('level =' => 'Peminjam'))->result();

        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
	    $this->load->view('admin/view_anggota', $data);
		$this->load->view('admin/footer');
	}


	function edit_anggota($id){
		$where = array('id' => $id);
        $data['anggota'] = $this->model_peminjam->pinjam($where,'tb_user')->result();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_editAnggota', $data);

    }

	function list_barang(){
        $data['tb_barang'] = $this->model_peminjam->list()->result();

        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_barang', $data);
		$this->load->view('admin/footer');
    }

	function add_barang(){
    //Tampilkan Form Tambah Barang
    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/view_tambah_barang');
    $this->load->view('admin/footer');
    }

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
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('admin/list_barang'));
		}else{

		}
		//Kalau Error
		}
    }

}