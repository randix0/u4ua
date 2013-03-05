<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Judge extends CI_Controller {

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
        //$this->load->view('welcome_message');
        $ps = array(
            '__PAGE' => 'judges'
        );
        $this->mysmarty->view('global/judges/index.tpl', $ps);
    }

    public function add()
    {
        $this->load->helper('url');
        if (!$this->user->logged()) return redirect(base_url('/'));

        $judge = array(
            'id' => 0,
            'user_id' => '',
            'first_name' => '',
            'last_name' => '',
            'role' => '',
            'iname' => '',
            'idesc' => '',
            'youtube_img' => '',
            'youtube_code' => '',
            'avatar_b' => '',
            'avatar_m' => '',
            'avatar_s' => '',
            'is_deleted' => '',
            'add_date' => ''
        );
        $ps = array(
            '__PAGE' => 'idea',
            'judge' => $judge
        );
        $this->mysmarty->view('global/judge/add/index.tpl', $ps);
    }

    public function judges()
    {
        $this->load->model('m_judges');
        $judges = $this->m_judges->getItems();
        $ps = array(
            '__PAGE' => 'judges',
            'judges' => $judges
        );
        $this->mysmarty->view('global/judges/index.tpl', $ps);
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */