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

    public function update($id, $data)
    {
        if (!$data || !$id) return false;
        $this->db->update('ideas', $data, array('id'=>$id));
        return true;
    }

    public function getItem($id = 0, $fetch = false)
    {
        $id = (int)$id;
        if (!$id) return array();
        $this->db->where('id', $id);
        $query = $this->db->get('ideas', 1);
        $idea=$query->row_array();

        if ($fetch) {
            $this->db->where('idea_id', $id);
            $query = $this->db->get('ideas_comments', 20);
            $idea_comments=$query->result_array();

            $this->db->where('idea_id', $id);
            $query = $this->db->get('ideas_team', 20);
            $idea_team=$query->result_array();

            $this->db->where('idea_id', $id);
            $query = $this->db->get('ideas_attachments', 20);
            $idea_attachments=$query->result_array();

            $idea['comments'] = $idea_comments;
            $idea['team'] = $idea_team;
            $idea['attachments'] = $idea_attachments;
            /*
            $qr_name = $this->m_ideas->generateQR($idea_id);
            $this->m_ideas->update($idea_id,array('qr_code'=>$qr_name));
            */

        }
        $idea['is_can_edit'] = 0;
        $idea['is_author'] = 0;
        if ($this->user->logged()) {
            if ($this->user->uid() == $idea['user_id'])
                $idea['is_author'] = 1;
            if (($idea['is_author'] || $this->user->access_level > 50))
                $idea['is_can_edit'] = 1;
        }

        return $idea;
    }

    public function getItems()
    {
        $this->db->where('is_deleted', 0);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('ideas', 16);
        $ideas=$query->result_array();
        return $ideas;
    }

    public function generateQR($idea_id = 0)
    {
        $this->load->helper('url');
        $this->load->library('ciqrcode');
        $config =& get_config();

        $qr_name = $config['resources_path'].'img/qr/u4ua_idea_'.$idea_id.'.png';

        $params['data'] = base_url('item/'.$idea_id);
        $params['level'] = 'H';
        $params['size'] = 5;
        $params['savename'] = FCPATH.$qr_name;
        $this->ciqrcode->generate($params);

        return $qr_name;
    }

    public function isVoted($idea_id = 0, $user_id = 0)
    {
        if (!$idea_id || !$user_id) return true;
        $result = true;

        $where = array(
            'idea_id' => $idea_id,
            'user_id' => $user_id,
        );

        $this->db->where($where);
        $query = $this->db->get('ideas_votes', 1);
        $vote=$query->row_array();
        if (!$vote) $result = false;
        return $result;
    }

    public function vote($idea_id = 0, $handler_type = '', $user_id = 0, $is_deleted = 0, $is_judge = 0)
    {
        if (!$this->user->logged() || !$handler_type || !$idea_id || !$user_id || $this->isVoted($idea_id,$user_id)) return false;

        $vote = array(
            'user_id' => $user_id,
            'idea_id' => $idea_id,
            'handler_type' => $handler_type,
            'is_deleted' => $is_deleted,
            'add_date' => time()
        );

        if ($is_judge)
            $vote['is_judge'] = 1;

        $this->db->insert('ideas_votes', $vote);
        $vote_id = $this->db->insert_id();
        return $vote_id;

    }
}