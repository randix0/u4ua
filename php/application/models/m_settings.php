<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_settings extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        if (!$data) return false;
        $this->db->insert('settings', $data);
        $partner_id = $this->db->insert_id();
        return $partner_id;
    }

    public function update($id, $data)
    {
        if (!$data || !$id) return false;
        $id = (int)$id;
        $this->db->update('settings', $data, array('id'=>$id));
        return true;
    }

    public function getItem($id = 0)
    {
        $id = (int)$id;
        if (!$id) return array();
        $this->db->where('id', $id);
        $query = $this->db->get('settings', 1);
        $partner = $query->row_array();
        if (!$partner) return false;
        return $partner;
    }

    public function getItems($where = array(), $order = array())
    {
        $where['is_deleted'] = 0;
        if (!$order)
            $order['id'] = 'asc';


        $this->db->where($where);
        if ($order){
            foreach($order as $o_key=>$o_val)
            {
                $this->db->order_by($o_key, $o_val);
            }
        }

        $query = $this->db->get('settings', 16);
        $settings=$query->result_array();

        return $settings;
    }
}