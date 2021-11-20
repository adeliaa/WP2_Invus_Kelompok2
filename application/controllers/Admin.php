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
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('peminjam/view_beranda');
		$this->load->view('template/footer');
	}

    function list(){
        $data['tb_barang'] = $this->model_peminjam->list()->result();

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('peminjam/view_barang', $data);
		$this->load->view('template/footer');
    }
	
		
	
 
}