<?php 

/**
* 
*/
class Posts extends CI_controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('post');
        $this->load->helper('form');
    }

    function index($start=0){
        $data['posts'] = $this->post->get_posts(5,$start);
        $this->load->library('pagination');
        $config['base_url'] = base_url().'posts/index/';
        $config['total_rows'] = $this->post->get_posts_count();
        $config['per_page'] = 5;
        $this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links();
       /* echo '<pre>';
        print_r($data);
        echo '</pre>';*/
        $data['this'] = $this;
        $this->load->view('post_index',$data);
    }

    /// codeigniter understand this as post/{id}
    function post($postID){
        $this->load->model('comment');
        $data['post'] = $this->post->get_post($postID);
        $data['comments'] = $this->comment->get_comments($postID);
        $this->load->view('post',$data);
    }


    function new_post(){
        $user_type = $this->session->userdata('user_type');
        if($user_type != 'admin' && $user_type != 'author'){
            redirect(base_url().'users/login');
        }
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


    /// this for check permissions i thought this function is an ass hole
    function correct_permissions($required){
       $user_type = $this->session->userdata('user_type');
        if($required == 'user'){
            if($user_type){
                return true;
            }
        }else if($required == 'author'){
            if($user_type == 'admin' || $user_type =='author'){
                return true;
            }
        }else if($required == 'admin'){
            if($user_type == 'admin'){
                return true;
            }
        }
    }

    public function editpost($postID){
        $user_type = $this->session->userdata('user_type');
        if($user_type != 'admin' && $user_type != 'author'){
            redirect(base_url().'users/login');
        }
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
        $user_type = $this->session->userdata('user_type');
        if($user_type != 'admin' && $user_type != 'author'){
            redirect(base_url().'users/login');
        }
        $this->post->delete_post($postID);
       redirect(base_url());
    }
}