<?php
class User_model extends CI_Model {
    public function check_login($username, $password) {
        $query = $this->db->get_where('users', ['username' => $username, 'password' => md5($password)]);
        return $query->row();
    }
}


?>