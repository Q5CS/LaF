<?php
class Post_model extends CI_Model
{
    public function __construct()
    {
        $this->load->library('session');
        $this->load->library('user_agent');
        $this->load->helper('security');
        $this->load->database();
    }
    
    public function post_found($title, $descrp, $place1, $place2, $time, $img_name, $contact)
    {
        $uid = $this->session->uid;
        $name = $this->session->name;
        $grade = $this->session->grade;
        $class = $this->session->class;
        $number = $this->session->number;
        $ip = $this->input->ip_address();
        $ua = $this->agent->agent_string();
        
        //anti xss
        $title = $this->security->xss_clean($title);
        $descrp = $this->security->xss_clean($descrp);
        $place1 = $this->security->xss_clean($place1);
        $place2 = $this->security->xss_clean($place2);
        $time = $this->security->xss_clean($time);
        $contact = $this->security->xss_clean($contact);
        $img_name = $this->security->xss_clean($img_name);
        $ua = $this->security->xss_clean($ua);
        if ($img_name == '') {
            $img_name = null;
        }
        
        $data = array(
            'uid' => $uid,
            'name' => $name,
            'grade' => $grade,
            'class' => $class,
            'number' => $number,
            'r_time' => time()*1000,
            'ip' => $ip,
            'ua' => $ua,
            'title' => $title,
            'descrp' => $descrp,
            'place1' => $place1,
            'place2' => $place2,
            'time' => $time,
            'img_name' => $img_name,
            'contact' => $contact,
            'status' => '0',
            'deled' => 'false'
        );
        
        $this->db->insert('item_found', $data);
        
        $returndata = array(
            'status' => 1,
            'msg' => '添加成功！'
        );
        return $returndata;
    }

    public function post_lost($title, $descrp, $place, $time, $img_name, $contact)
    {
        $uid = $this->session->uid;
        $name = $this->session->name;
        $grade = $this->session->grade;
        $class = $this->session->class;
        $number = $this->session->number;
        $ip = $this->input->ip_address();
        $ua = $this->agent->agent_string();
        
        //anti xss
        $title = $this->security->xss_clean($title);
        $descrp = $this->security->xss_clean($descrp);
        $place = $this->security->xss_clean($place);
        $time = $this->security->xss_clean($time);
        $contact = $this->security->xss_clean($contact);
        $img_name = $this->security->xss_clean($img_name);
        $ua = $this->security->xss_clean($ua);
        if ($img_name == '') {
            $img_name = null;
        }
        
        $data = array(
            'uid' => $uid,
            'name' => $name,
            'grade' => $grade,
            'class' => $class,
            'number' => $number,
            'r_time' => time()*1000,
            'ip' => $ip,
            'ua' => $ua,
            'title' => $title,
            'descrp' => $descrp,
            'place' => $place,
            'time' => $time,
            'img_name' => $img_name,
            'contact' => $contact,
            'status' => '0',
            'deled' => 'false'
        );
        
        $this->db->insert('item_lost', $data);
        
        $returndata = array(
            'status' => 1,
            'msg' => '添加成功！'
        );
        return $returndata;
    }
}
