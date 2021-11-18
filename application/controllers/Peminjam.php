<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Peminjam extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->model('model_barang');
            if($this->session->userdata('status') != "login"){
                redirect(site_url("login"));}
		
	}
 
	function index(){
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('peminjam/view_beranda');
		$this->load->view('template/footer');
	}

    function list(){
        $data['tb_barang'] = $this->model_barang->list()->result();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('peminjam/view_barang', $data);
		$this->load->view('template/footer');
    }

	function add($id){
		$where = array('id_barang' => $id);
        $data['tb_barang'] = $this->model_barang->pinjam($where,'tb_barang')->result();
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('peminjam/view_peminjaman', $data);

    }
 
		
	
 
}