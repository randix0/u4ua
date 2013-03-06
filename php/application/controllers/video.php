<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller {

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

    public function index()
    {
        $this->load->model('m_videos');
        $videos = $this->m_videos->getItems();
        $ps = array(
            '__PAGE' => 'videos',
            'videos' => $videos
        );
        $this->mysmarty->view('global/videos/index.tpl', $ps);
    }

    public function item($video_id = 0)
    {
        $this->load->model('m_videos');
        $video = $this->m_videos->getItem($video_id);
        if (!$video) return redirect(base_url('/videos'));


        $ps = array(
            '__PAGE' => 'videos',
            'video' => $video
        );
        $this->mysmarty->view('global/video/item/index.tpl', $ps);
    }

    public function add()
    {
        $this->load->helper('url');
        if (!$this->user->logged()) return redirect(base_url('/'));

        $video = array(
            'id' => 0,
            'user_id' => '',
            'iname' => '',
            'idesc' => '',
            'youtube_img' => '',
            'youtube_code' => '',
            'signature' => '',
            'is_deleted' => '',
            'add_date' => ''
        );
        $ps = array(
            '__PAGE' => 'idea',
            'video' => $video
        );
        $this->mysmarty->view('global/video/add/index.tpl', $ps);
    }

    public function edit($id)
    {
        $this->load->helper('url');
        if (!$this->user->logged() || !$id) return redirect(base_url('/videos'));

        $this->load->model('m_videos');
        $video = $this->m_videos->getItem($id);
        if (!$video) return redirect(base_url('/videos'));


        $ps = array(
            '__PAGE' => 'idea',
            'video' => $video
        );
        $this->mysmarty->view('global/video/add/index.tpl', $ps);
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */