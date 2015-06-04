<?php

class Users extends CI_Controller{



    function login(){
        $data['error'] = 0 ;
        if($_POST){
            $this->load->model('user');
            $this->load->library('session');
            $username = $this->input->post('username',true);
            $password = $this->input->post('password',true);
            $user_type = $this->input->post('user_type',true);
            $user = $this->user->login($username,$password,$user_type);
            if(!$user) {
                $data['error'] = 1;
            }else{
                $this->session->set_userdata('userID',$user['userID']);
                $this->session->set_userdata('user_type',$user['user_type']);
                redirect(base_url().'posts');
            }
        }

        $this->load->view('header');
        $this->load->view('login',$data);
        $this->load->view('footer');
    }


    function logout(){
        $this->load->library('session');
        $this->session->sess_destroy();
        redirect(base_url().'posts');
    }

    function create_user(){
        $this->load->model('user');
        $this->load->library('session');
        $data['error'] = 0;
        if($_POST){
            $email = $this->input->post('email',true);
            $username = $this->input->post('username',true);
            $password = $this->input->post('password',true);
            $type = ($this->input->post('user_type',true)) ? $this->input->post('user_type',true) :'user';

            $insert = [
                'email' => $email,
                'username' => $username,
                'password' => sha1($password),
                'user_type' => $type
            ];

            $user = $this->user->create_user($insert);

            if(!$user){
                $data['error'] = 1;
            }
            redirect(base_url().'posts/index');
        }
        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('createuser',$data);
        $this->load->view('footer');
    }
}