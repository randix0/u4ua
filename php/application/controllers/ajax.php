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
            if ($idea_id > 0)
                $result = array(
                    'status' => 'success',
                    'item' => $item,
                    'goto' => '/idea/'.$idea_id
                );
        }

        $this->json->parse($result);
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */