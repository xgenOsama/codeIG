<?php



class User extends CI_Model {


     function __construct(){
        parent::__construct();
        $this->load->database();
    }

     function create_user($data){
        $this->db->insert('users',$data);
    }

    function login($username,$password){
        $where = array(
            'username' => $username,
            'password' => sha1($password)
        );

        $this->db->select()->from('users')->where($where);
        $query = $this->db->get();
        return $query->first_row('array');
    }
}