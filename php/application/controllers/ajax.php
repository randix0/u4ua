<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

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
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent::__construct();
        $this->load->library('json');
    }

    public function index()
    {
        //$this->load->view('welcome_message');
        $ps = array(
            '__PAGE' => 'main'
        );
        $this->json->parse($ps);
    }

    public function saveIdea()
    {
        $result = array('status' => 'error', 'errors' => array());

        $required = array(
            'link','iname','idesc','cantact_first_name','cantact_last_name','cantact_email','cantact_phone'
        );

        $RAW = $this->input->post('item');

        foreach($required as $r)
        {
            if (!isset($RAW[$r]) || !$RAW[$r]) $result['errors'][$r] = 1;
        }

        $item = array(
            'user_id' => $this->user->uid(),
            'add_date' => time()
        );

        if ($result['errors'])
            return $this->json->parse($result);

        $item['iname'] = $RAW['iname'];
        $item['idesc'] = $RAW['idesc'];
        $item['cantact_first_name'] = $RAW['cantact_first_name'];
        $item['cantact_last_name'] = $RAW['cantact_last_name'];
        $item['cantact_email'] = $RAW['cantact_email'];
        $item['cantact_phone'] = $RAW['cantact_phone'];


        $link = $RAW['link'];
        $link = str_replace('http://', '', $link);
        $link = str_replace('www.', '', $link);
        preg_match('/([^\/]+)/', $link, $matches);
        $hoster = $matches[1];
        $result['$hoster']=$hoster;
        $matches = array();
        if($hoster == 'youtube.com' && preg_match('/(?:\?|\&)v\=([A-z0-9\-\_]+)/', $link, $matches)) {
            $item['youtube_img'] = 'http://i1.ytimg.com/vi/'.$matches[1].'/0.jpg';
            $item['youtube_code'] = $matches[1];
        } else {
            $result['errors']['link'] = 2;
        }


        if (!$result['errors']) {
            $this->load->model('m_ideas');
            $idea_id = $this->m_ideas->create($item);
            $item['id'] = $idea_id;
            if ($idea_id > 0){
                $result = array(
                    'status' => 'success',
                    'item' => $item,
                    'goto' => '/idea/'.$idea_id
                );
                $qr_name = $this->m_ideas->generateQR($idea_id);
                $this->m_ideas->update($idea_id,array('qr_code'=>$qr_name));

            }
        }

        $this->json->parse($result);
    }

    public function shareIdea($handler, $idea_id = 0)
    {
        if (!$this->user->logged()) return false;
        $config	 = &get_config();
        $link = $config['base_url'].'idea/'.$idea_id;
        if ($handler == 'facebook') {
            $facebook_id = $this->user->facebook_id;
            $access_token = $this->user->facebook_oa_access_token;

            $token_url = 'https://graph.facebook.com/'.$facebook_id.'/feed';
            $data = 'access_token='.$access_token.'&link='.urlencode($link);
        }

        if ($token_url && $data) {
            $contents = file_get_contents($token_url, false, stream_context_create(array('http'=>array(
                'method'	=>'POST',
                'header'	=> "Content-type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: " . strlen($data) . "\r\n",
                'content'	=>$data
            ))));

            $response = json_decode($contents, true);
            var_dump($response);
        }
    }

    public function voteIdea()
    {
        $this->load->helper('cookie');
        $result = array('status' => 'error', 'errors' => array(), 'code' => 0);

        $RAW = $this->input->post('item');

        if (!$this->user->logged() || !isset($RAW['handler_type']) || !$RAW['handler_type'] || !isset($RAW['idea_id']) || !$RAW['idea_id']) return $this->json->parse($result);

        $idea_id = (int)$RAW['idea_id'];
        $handler_type = $RAW['handler_type'];
        $is_deleted = 0;

        if (!preg_match('/^(fb|vk|gp|tw|facebook|vkontakte|google|twitter)$/',$handler_type)) return $this->json->parse($result);
        if (preg_match('/^(fb|vk|gp|tw)$/',$handler_type)) {
            if ($handler_type == 'fb') $handler_type = 'facebook';
            elseif ($handler_type == 'vk') $handler_type = 'vkontakte';
            elseif ($handler_type == 'gp') $handler_type = 'google';
            elseif ($handler_type == 'tw') $handler_type = 'twitter';
        }

        if (!$this->user->$handler_type.'_id') $is_deleted = 1;

        $this->load->model('m_ideas');

        $isVoted = $this->m_ideas->isVoted($idea_id, $this->user->uid());

        if ($isVoted) {
            $result['code'] = 'isVoted';
            return $this->json->parse($result);
        }

        $idea = $this->m_ideas->getItem($idea_id);
        if ($idea && isset($idea['is_deleted']) && !$idea['is_deleted']) {
            $vote_id = $this->m_ideas->vote($idea_id, $handler_type, $this->user->uid(), $is_deleted);
            if ($vote_id) $result['status'] = 'success';
        } else {
            $result['errors'][] = 'idea404';
        }

        $this->json->parse($result);
    }

    public function getIdeas()
    {
        $this->load->model('m_ideas');
        $ideas = $this->m_ideas->getItems();
        $result = array('status'=>'success');
        $result['html'] = $this->mysmarty->view('global/idea/items/index.tpl', array('ideas'=>$ideas),false,true);
        $this->json->parse($result);
    }

    public function isAuthNeeded($handler = '')
    {
        $result = array('status'=>'error','needed' => 1);
        if (!$handler) return $this->json->parse($result);

        $user_id = $this->user->uid();

        if (preg_match('/^(facebook|vkontakte|google|twitter)$/',$handler)) $result['status'] = 'success';

        if ($user_id) {
            $handler_id = 0;
            if ($handler == 'facebook')
                $handler_id = $this->user->facebook_id;
            elseif ($handler == 'vkontakte')
                $handler_id = $this->user->vkontakte_id;
            elseif ($handler == 'google')
                $handler_id = $this->user->google_id;
            elseif ($handler == 'twitter')
                $handler_id = $this->user->twitter_id;

            if ($handler_id){
                $result['needed'] = 0;
                $result[$handler.'_id'] = $handler_id;
            } else {
                //setcookie('aC_stop', 1, 0 , '/');
                $this->session->set_userdata('aC_stop',1);
            }
        }

        $this->json->parse($result);
    }

    public function uploadFile()
    {
        $config['upload_path'] = './uploads/';
        //$config['allowed_types'] = 'gif|jpg|png';
        /*
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        */
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $data = array('error' => $this->upload->display_errors());

        }
        else
        {

            $data = $this->upload->data();
        }


        var_dump($_FILES);

        var_dump($data);
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */