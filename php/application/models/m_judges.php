<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_judges extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        if (!$data) return false;
        $this->db->insert('judges', $data);
        $judge_id = $this->db->insert_id();
        return $judge_id;
    }

    public function update($id, $data)
    {
        if (!$data || !$id) return false;
        $id = (int)$id;
        $this->db->update('judges', $data, array('id'=>$id));
        return true;
    }


    public function getItems($where = array(), $order = array())
    {
        $where['is_deleted'] = 0;
        if (!$order)
            $order['id'] = 'desc';


        $this->db->where($where);
        if ($order){
            foreach($order as $o_key=>$o_val)
            {
                $this->db->order_by($o_key, $o_val);
            }
        }

        $query = $this->db->get('judges', 16);
        $judges=$query->result_array();


        return $judges;
    }
}