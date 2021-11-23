
<?php
class Model_login extends CI_Model {
  
   function cek_login($table,$where){		
    return $this->db->get_where($table,$where);
}
   
   //fungsi check login
   public function check_login($username,$password){
    $this->db->where('username', $username);
    $query = $this->db->get('tb_user');
    if ($query->num_rows() == 1) {
     $hash = $query->row('password');
     if (password_verify($password, $hash)){
      return $query->result();
     } else {
      echo "<script>alert('Wrong Password. Try again.')</script>";
     }
    } else {
     echo "<script>alert('Wrong Username. Try again.')</script>";
    }
   }
   
   public function create_user($username, $password, $level, $nama) {
    $data = array(
     'username' => $username,
     'password'  => $this->hash_password($password),
     'level'  => $level,
     'nama_peminjam' => $nama
    );
    return $this->db->insert('tb_user', $data);
   }
   
   private function hash_password($password) {
    return password_hash($password, PASSWORD_BCRYPT);
   }
}

?>