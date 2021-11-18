<?php 

class Model_barang extends CI_Model{
    
    private $_table = "tb_barang";
 
	function list()
    {
		return $this->db->get('tb_barang');
	} 

    function save($data,$table)
    {
        $this->db->insert('tb_peminjaman',$data);      
    }
    
    function pinjam($where,$table){		
        return $this->db->get_where($table,$where);
    }

    function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
    
    }
}