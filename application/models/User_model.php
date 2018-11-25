<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->library('session');
    }
    
    public function getUserToken($code)
    {
        $this->load->library('qz5z_oauth');
        $client_id = "laf";
        $client_secret = "qaqqaq";
        $redirect_uri = "https://laf.qz5z.ren/main/auth_callback";
        $grant_type = "authorization_code";
        $scope = "";
        $t = $this->qz5z_oauth->getUserToken($code, $client_id, $client_secret, $redirect_uri, $grant_type, $scope);
        if (isset($t->error)) {
            return [-1,$t];
        }
        return [1,$t];
    }
    
    public function getUserData($token)
    {
        $this->load->library('qz5z_oauth');
        $t = $this->qz5z_oauth->getUserData($token, "");
        
        $this->session->logged = true;
        $this->session->uid = $t->uid;
        $this->session->name = $t->name;
        $this->session->grade = $t->grade;
        $this->session->class = $t->class;
        $this->session->number = $t->number;
        $this->session->admin = false;
        
        return array(
                'status' => 1,
                'name' => $t->name,
                'msg' => '登录成功'
            );
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        $returndata = array(
            'status' => 1,
            'msg' => '注销成功'
        );
        return json_encode($returndata);
    }
}
