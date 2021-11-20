<?php 

class Model_peminjam extends CI_Model{
     
	function list()
    {
		return $this->db->get('tb_barang');
	}
    
    function list_peminjaman($table ,$where)
    {
        return $this->db->get_where('view_laporan', $where);
    }


    function save($data,$table)
    {
        $this->db->insert('tb_peminjaman',$data);      
    }
    
    function pinjam($where,$table){		
        return $this->db->get_where($table,$where);
    }

    function profile($where,$table){		
        return $this->db->get_where($table,$where);
    }

    function detail($where,$table){		
        return $this->db->get_where($table,$where);
    }

        function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
    
    }
}