<?php


class Post extends CI_Model{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_posts($num=20,$start=0){

        //$sql = 'SELECT * FROM users WHERE active=1 ORDER BY data_added DESC  limit 0,20';
        $this->db->select()->from('posts')->where('active',1)->order_by('data_added','DESC')->limit(0,20);
        ///select()->from('posts')->where('activate',1)->order_by('date_added','DESC')->limit(0,20);

    $query = $this->db->get();


        return $query->result_array();
    }
}