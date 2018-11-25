<?php
class Found_model extends CI_Model
{
    public function __construct()
    {
        $this->load->library('session');
        $this->load->database();
    }
    
    public function show($offset, $num)
    {
        if (!$this->session->admin) {
            $this->db->select('id, title, descrp, place1, place2, time, img_name, contact, status');
        }
        $this->db->where('deled', 'false');
        $this->db->order_by('id', 'DESC');
        $this->db->limit($num, $offset);
        $query = $this->db->get('item_found');
        return $query->result_array();
    }
    public function showOne($id)
    {
        if (!$this->session->admin) {
            $this->db->select('id, title, descrp, place1, place2, time, img_name, contact, status');
        }
        $this->db->where('deled', 'false');
        $this->db->where('id', $id);
        $query = $this->db->get('item_found');
        return $query->result_array();
    }

    public function getNum()
    {
        $num = $this->db->count_all_results('item_found');
        $returndata = array(
            'num' => $num,
        );
        return $returndata;
    }
}
