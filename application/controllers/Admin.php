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

	function detail_anggota($id){
		$where = array('id' => $id);
        $data['anggota'] = $this->model_peminjam->detail($where,'tb_user')->result();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_detail_anggota', $data);
        $this->load->view('admin/footer');

    }

	function edit_anggota($id){
		$where = array('id' => $id);
        $data['anggota'] = $this->model_peminjam->pinjam($where,'tb_user')->result();
        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/view_editAnggota', $data);

    }

	public function update_anggota($id)
    {   
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
        
        redirect('admin/anggota');
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

	function edit_barang($id){
	$data['databarang'] = $this->model_peminjam->editbarang('tb_barang',$id);
	//Tampilkan Form Tambah Barang
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view('admin/view_edit_barang', $data);
	$this->load->view('admin/footer');
}

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
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('admin/list_barang'));
		}else{
			echo "gagal";
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
		$this->session->set_flashdata('success', 'Berhasil disimpan');
		redirect(site_url('admin/list_barang'));
	}else{
		echo "gagal";
	}
	//Kalau Error
	}
	}

	function delete_barang($id){
        $this->db->select('status, id_barang');
        $this->db->where('id_barang', $id);//
        $this->db->from('tb_peminjaman');
        $query = $this->db->get()->row();
        
        $status = $query->status;
		if($status != null){
		if($status == "Kembali"){
		$del = $this->model_peminjam->delbarang('tb_barang',$id);
		if($del){
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(site_url('admin/list_barang'));
		}else{

		}
	    }
		else{
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(site_url('admin/list_barang'));
		}
	}

	 else{
		$del = $this->model_peminjam->delbarang('tb_barang',$id);
		if($del){
			$this->session->set_flashdata('success', 'Berhasil dihapus');
			redirect(site_url('admin/list_barang'));
	}
	}
	}
	function booking(){
    
        //$data['view_laporan'] = $this->model_peminjam->list_peminjaman($where,'view_laporan')->result();
        $data['view_laporan'] = $this->db->get_where('view_laporan', array(
            'status =' => 'Di booking'))->result();

        $this->load->view('admin/header');
		$this->load->view('admin/sidebar');
	    $this->load->view('admin/view_booking', $data);
		$this->load->view('admin/footer');
      
    }

	function acc($id){
		$where = array('id_peminjaman' => $id);

		$data = array (
            'status' => 'Di pinjam'
        );

        $this->model_peminjam->update($where, $data, 'tb_peminjaman');
        redirect('admin/booking');
        
    }

	private function hash_password($password) {
        return password_hash($password, PASSWORD_BCRYPT);
       }

	

}