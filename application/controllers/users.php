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
        $data['errors'] = 0;
        if($_POST){

            $config = [
               array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[3]|is_unique[users.username]'
               ),
               array(
                   'field' => 'password',
                   'label' => 'Password',
                   'rules' => 'trim|required|min_length[5]|max_length[15]'
               ),
                array(
                    'field' => 'password2',
                    'label' => 'Confirm Password',
                    'rules' => 'trim|required|min_length[5]|max_length[15]|matches[password]'
                ),
                array(
                    'field' => 'user_type',
                    'label' => 'User Type',
                    'rules' => 'trim|required'
                ),
                array(
                   'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'trim|required|is_unique[users.email]|valid_email'
                )
            ];

            $this->load->library('form_validation');

            $this->form_validation->set_rules($config);

            if($this->form_validation->run() == FALSE){
                $data['errors'] = validation_errors();
            } else{

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
        }
        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('createuser',$data);
        $this->load->view('footer');
    }
}