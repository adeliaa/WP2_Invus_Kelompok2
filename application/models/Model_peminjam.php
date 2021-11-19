<?php 

class Model_peminjam extends CI_Model{
     
	function list()
    {
		return $this->db->get('tb_barang');
	}
    
    function list_peminjaman($where)
    {

        $this->db->where($where);
		$this->db->select('view_laporan');
        
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