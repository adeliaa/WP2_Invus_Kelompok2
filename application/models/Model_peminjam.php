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

    function delbarang($table,$id){
        return $this->db->delete($table,array('id_barang' => $id));
    }

    public function cekData($where = null)
    {
    return $this->db->get_where('tb_user', $where);
    }

    function deluser($table,$id){
        return $this->db->delete($table,array('id' => $id));
    }

    function editbarang($table,$id){
        return $this->db->get_where($table,array('id_barang' => $id))->row();
    }

    function upbarang($table,$data,$id){
        return $this->db->update($table,$data,array('id_barang' => $id));
    }


    function save($data,$table)
    {
        $this->db->insert('tb_peminjaman',$data);      
    }

    function insert_barang($table,$data){
        return $this->db->insert($table,$data);
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