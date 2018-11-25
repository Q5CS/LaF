<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lost extends CI_Controller
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
        $this->load->model('Lost_model');
    }

    public function show($start, $end)
    {
        $result = $this->Lost_model->show($start, $end-$start);
        echo json_encode($result);
    }
    public function showOne($id)
    {
        $result = $this->Lost_model->showOne($id);
        echo json_encode($result);
    }
    public function getNum()
    {
        $result = $this->Found_model->getNum();
        echo json_encode($result);
    }
}
