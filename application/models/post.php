<?php


class Post extends CI_Model{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_posts($num=20,$start=0){

        //$sql = 'SELECT * FROM users WHERE active=1 ORDER BY data_added DESC  limit 0,20';
       // $this->db->select('*')->from('posts')->where('active',1)->order_by('data_added','DESC')->limit($num,$start);
        ///select()->from('posts')->where('activate',1)->order_by('date_added','DESC')->limit(0,20);
       /* $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('active',1);*/
       // $this->db->where((array('active !='=>1)));
        /*$this->db->order_by('data_added','DESC');
        $this->db->limit($num,$start);*/
     // $query = $this->db->get();
       /* $this->db->join('users','users.userID=posts.userID');
        $query = $this->db->get();*/
        $query = $this->db->get_where('posts',['active'=>1],$num,$start);
        return $query->result_array();
    }


    public  function get_posts_count(){
        $this->db->select()->from('posts')->where('active',1);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function get_post($postID){
       // return $this->db->get_where('posts',['postID'=>$postID,'active'=>1]);
       /* $this->db->select('*')->from('posts')->where(['postID'=>$postID,'active'=>1])->order_by('data_added','DESC');*/
        $this->db->select()->from('posts')->where(array('active'=>1,'postID'=>$postID));
        $query = $this->db->get();
        //return $query->result_array();
        return $query->first_row('array');
    }


    public function insert_post($data){
        $this->db->insert('posts',$data);
        return $this->db->insert_id();
    }


    public function update_post($postID,$data){
        $this->db->where('postID',$postID);
        $this->db->update('posts',$data);
    }

    public function delete_post($postID){
        $this->db->where('postID',$postID);
        $this->db->delete('posts');
    }

  /*  public  function insert_post($data){
        $data = array(
            'title'=>'This is a test',
            'post'=>'This is the description'
        );

        $this->db->insert('posts',$data);
    }

    public function update_post($postID,$data){

        $this->db->where('postID',$postID);
        $this->db->update('posts',$data);

    }

    public function delete_post($postID,$data){

        $this->db->where('postID',$postID);
        $this->db->delete('posts',$data);

    }

    public function query($num=20,$start=0){
        $this->db->query("SELECT * FROM posts WHERE active=1 ORDER BY data_added DESC LIMIT $num,$start");
    }*/
}