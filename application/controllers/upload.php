<?php

class Upload extends CI_Controller{



    function index(){
        $this->load->helper('form');
        $this->load->view('upload_form',array('error' => ''));
    }


    function do_upload(){
        $this->load->helper('form');
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] ='1024';
        $config['max_height'] = '760';

        $this->load->library('upload',$config);
      /*  $this->upload->set_filename(base_url().'uploads',$this->upload->file_name.date('Y-m-d').'osama');*/
        if(! $this->upload->do_upload()){
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form',$error);
        }else{
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success',$data);
        }
    }
}