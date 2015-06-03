<?php 

/**
* 
*/
class Posts extends CI_controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('post');
    }

    function index(){
        $data['posts'] = $this->post->get_posts();
       /* echo '<pre>';
        print_r($data);
        echo '</pre>';*/
        $this->load->view('post_index',$data);
    }

    /// codeigniter understand this as post/{id}
    function post($postID){
        $data['post'] = $this->post->get_post($postID);
        $this->load->view('post',$data);
    }


    function new_post(){
        if($_POST){
            $data = array(
                'title' => $_POST['title'],
                'post'=> $_POST['post'],
                'active'=>1
            );
            $id = $this->post->insert_post($data);
            redirect(base_url().'posts/post/'.$id);
        }else{
            $this->load->view('new_post');
        }
    }


    public function editpost($postID){
        $data['success'] = 0 ;
        if($_POST){
            $data_post = array(
                'title'=>$_POST['title'],
                'post' =>$_POST['post'],
                'active'=> 1
            );
            $this->post->update_post($postID,$data_post);
            $data['success'] = 1;
        }
        $data['post'] = $this->post->get_post($postID);
        $this->load->view('edit_post',$data);
    }

    function deletepost($postID){
        $this->post->delete_post($postID);
       redirect(base_url());
    }
}