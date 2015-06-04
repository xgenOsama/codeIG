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
            /// Resize the image
            $data = array('upload_data' => $this->upload->data());
            $this->resize($data['upload_data']['full_path'],$data['upload_data']['file_name']);
            unlink($data['upload_data']['full_path']);
           /* print_r($data);
            exit();*/
            $this->load->view('upload_success',$data);
        }
    }

    function resize($path,$file){
        $config['image_library']= 'gd2';
        $config['source_image'] = $path;
        $config['create_thumb'] = true;
        $config['maintain_ratio'] =true;
        $config['width'] =500;
        $config['height']=249;
        $config['new_image']= $file;

        $this->load->library('image_lib',$config);
        $this->image_lib->resize();
    }
}