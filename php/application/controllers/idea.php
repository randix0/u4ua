<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Idea extends CI_Controller {

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
    public function index($idea_id)
    {
        //$this->load->view('welcome_message');
        $ps = array(
            '__PAGE' => 'main'
        );
        $this->mysmarty->view('global/main/index.tpl', $ps);
    }

    public function add()
    {
        if (!$this->user->logged()) return show_404();
        $ps = array(
            '__PAGE' => 'idea'
        );
        $this->mysmarty->view('global/idea/add/index.tpl', $ps);
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */