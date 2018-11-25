<?php
class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        $this->load->library('session');
        $this->load->database();
    }
    
    public function ifound()
    {
        if (!$this->session->admin) {
            $this->db->select('id, title, place1, place2, time, img_name, contact, status, r_time');
        }
        $this->db->where('deled', 'false');
        $this->db->where('uid', $this->session->uid);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('item_found');
        return $query->result_array();
    }
    
    public function ilost()
    {
        if (!$this->session->admin) {
            $this->db->select('id, title, place, time, img_name, contact, status, r_time');
        }
        $this->db->where('deled', 'false');
        $this->db->where('uid', $this->session->uid);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('item_lost');
        return $query->result_array();
    }

    public function chStatus($id, $type)
    { //1: found 2: lost
        //check if is self
        $this->db->where('id', $id);
        if ($type==1) {
            $query = $this->db->get('item_found');
        }
        if ($type==2) {
            $query = $this->db->get('item_lost');
        }
        $item = $query->row();
        $uid = $item->uid;
        if ($uid != $this->session->uid) {
            $returndata = array(
                'status' => -1,
                'msg' => '请不要修改他人发布的信息！'
            );
            return $returndata;
        }
        
        $data = array(
            'status' => '1'
        );
        $this->db->where('id', $id);
        if ($type==1) {
            $query = $this->db->update('item_found', $data);
        }
        if ($type==2) {
            $query = $this->db->update('item_lost', $data);
        }
        
        $returndata = array(
            'status' => 1,
            'msg' => '修改成功！'
        );
        return $returndata;
    }
}
