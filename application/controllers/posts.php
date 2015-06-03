<?php 

/**
* 
*/
class Posts extends CI_controller{

    public function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->load->model('post');
        $data['posts'] = $this->post->get_posts();
       /* echo '<pre>';
        print_r($data);
        echo '</pre>';*/
        $this->load->view('post_index',$data);
    }
}