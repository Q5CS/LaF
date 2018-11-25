<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $this->load->model('Dashboard_model');

        if (!$this->session->logged) {
            redirect('main/login');
        }
    }

    public function ifound()
    {
        $data = $this->Dashboard_model->ifound();
        echo json_encode($data);
    }
    
    public function ilost()
    {
        $data = $this->Dashboard_model->ilost();
        echo json_encode($data);
    }
    
    public function chStatus()
    {
        $id = $this->input->post('id');
        $type= $this->input->post('type');
        $data = $this->Dashboard_model->chStatus($id, $type);
        echo json_encode($data);
    }
}
