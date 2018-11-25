<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
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
        $this->load->model('Found_model');
        $this->load->model('Lost_model');
    }

    public function index()
    {
        $data['add_css'] = array('index.css');
        $data['add_js'] = array('index.js');
        $data['logged'] = $this->session->logged;
        $data['admin'] = $this->session->admin;
        $data['num_found'] = $this->Found_model->getNum()['num'];
        $data['num_lost'] = $this->Lost_model->getNum()['num'];
        $data['num_succ'] = $this->Lost_model->getNum(true)['num'];
        
        $this->load->view('header', $data);
        $this->load->view('main', $data);
        $this->load->view('footer', $data);
    }

    public function login()
    {
        if ($this->session->logged) {
            redirect('/');
        }
        // 使用认证平台登录
        redirect("https://open.qz5z.ren/oauth2/authorize?response_type=code&client_id=laf&redirect_uri=https://laf.qz5z.ren/main/auth_callback&state=auth&scope=");

        // 		$data['add_css'] = array();
// 		$data['add_js'] = array();
// 		$data['logged'] = $this->session->logged;
// 		$data['admin'] = $this->session->admin;
// 		$this->load->view('header',$data);
// 		$this->load->view('login');
// 		$this->load->view('footer',$data);
    }
    public function auth_callback()
    {
        if ($this->session->logged) {
            redirect('/');
        }
        $data['add_css'] = array();
        $data['add_js'] = array('auth_callback.js');
        $data['logged'] = $this->session->logged;
        $data['admin'] = $this->session->admin;
        $this->load->view('header', $data);
        $this->load->view('auth_callback', $data);
        $this->load->view('footer', $data);
    }
    
    public function found()
    {
        $data['add_css'] = array('found.css','share.min.css');
        $data['add_js'] = array('../layui/layui.js','jquery.share.min.js','found.js');
        $data['logged'] = $this->session->logged;
        $data['admin'] = $this->session->admin;
        $data['num'] = $this->Found_model->getNum()['num'];
        $data['perPage'] = $this->config->item('perPage');
        $this->load->view('header', $data);
        $this->load->view('found', $data);
        $this->load->view('footer', $data);
    }

    public function lost()
    {
        $data['add_css'] = array('lost.css','share.min.css');
        $data['add_js'] = array('../layui/layui.js','jquery.share.min.js','lost.js');
        $data['logged'] = $this->session->logged;
        $data['admin'] = $this->session->admin;
        $data['num'] = $this->Lost_model->getNum()['num'];
        $data['perPage'] = $this->config->item('perPage');
        $this->load->view('header', $data);
        $this->load->view('lost', $data);
        $this->load->view('footer', $data);
    }
    
    public function post()
    {
        $data['add_css'] = array();
        $data['add_js'] = array('../layui/layui.js','post.js');
        if (!$this->session->logged) {
            redirect('main/login');
        }
        $data['logged'] = $this->session->logged;
        $data['admin'] = $this->session->admin;
        $this->load->view('header', $data);
        $this->load->view('post');
        $this->load->view('footer', $data);
    }
    
    public function dashboard()
    {
        $data['add_css'] = array('dashboard.css');
        $data['add_js'] = array('../layui/layui.js','dashboard.js');
        if (!$this->session->logged) {
            redirect('main/login');
        }
        $data['logged'] = $this->session->logged;
        $data['admin'] = $this->session->admin;
        $this->load->view('header', $data);
        $this->load->view('dashboard');
        $this->load->view('footer', $data);
    }
}
