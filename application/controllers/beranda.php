<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Beranda extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
	}
 
	public function index(){
		$this->load->view('view_login');
	}
 
	public function halo(){
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('peminjam/view_barang');
		$this->load->view('template/footer');
		
	}
 
}