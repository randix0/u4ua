<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_ideas extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $this->db->insert('ideas', $data);
        $idea_id = $this->db->insert_id();
        return $idea_id;
    }

    public function getItems()
    {
        $this->db->where('is_deleted', 0);
        $query = $this->db->get('ideas', 16);
        $ideas=$query->result_array();
        return $ideas;
    }
}