<?php

class Comments extends CI_Controller{





   function add_comment($postID)
  {
      $this->load->library('session');
      $this->load->model('comment');
    if (!$_POST) {
      redirect(base_url().'/posts/post/'.$postID);
    }

    $user_type = $this->session->userdata('user_type');

    if (!$user_type) {
      redirect(base_url().'users/login');
    }

    $data = array(
      'postID'=> $postID,
      'userID'=> $this->session->userdata('userID'),
      'comment'=>$_POST['comment']
    );

    $this->comment->add_comment($data);
    redirect(base_url().'posts/post/'.$postID);
  }

    function delete_comment($postID,$commentID){
        $this->load->library('session');
        $this->load->model('comment');
        $this->comment->delete_comment($commentID);
        redirect(base_url().'posts/post/'.$postID);
    }


}
