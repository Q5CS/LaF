<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Post_model');
        
        if (!$this->session->logged) {
            redirect('main/login');
        }
    }
    
    private function getMillisecond()
    {
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f', (floatval($t1)+floatval($t2))*1000);
    }
    
    public function img_upload()
    {
        $config['upload_path']      = __DIR__.'/../../../upload/item_pic/';
        $config['file_name'] = $this->getMillisecond();
        $config['allowed_types']    = 'gif|jpg|jpeg|png|tif|bmp|webp';
        $config['max_size']     = 10000;

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $data = array('upload_data' => $this->upload->data('file_name'));
            echo json_encode($data);
        }
    }
    
    public function post_found()
    {
        $img_name = '';
        $title = $this->input->post('title');
        $descrp = $this->input->post('descrp');
        $place1 = $this->input->post('place1');
        $place2 = $this->input->post('place2');
        $time = $this->input->post('time');
        $img_name = $this->input->post('img_name');
        $contact = $this->input->post('contact');
        
        $data = $this->Post_model->post_found($title, $descrp, $place1, $place2, $time, $img_name, $contact);
        echo json_encode($data);
    }
    
    public function post_lost()
    {
        $title = $this->input->post('title');
        $descrp = $this->input->post('descrp');
        $place = $this->input->post('place');
        $time = $this->input->post('time');
        $img_name = $this->input->post('img_name');
        $contact = $this->input->post('contact');
        
        $data = $this->Post_model->post_lost($title, $descrp, $place, $time, $img_name, $contact);
        echo json_encode($data);
    }
}
