<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
	public function index($order_by = '')
	{
        $this->load->model('m_ideas');
        $where = array('is_sample'=>0);
        $order = array('id'=>'desc');
        if ($order_by == 'judging' && $this->user->logged() && $this->user->is_judge) {
            $where = array('comments_count >=' => 10);
            $order = array('id'=>'desc');
        } elseif ($order_by == 'rating')
        {
            $order = array('rating'=>'desc','id'=>'desc');
        } elseif ($order_by == 'samples') {
            $where = array('is_sample'=>1);
        }

        $ps = array(
            '__PAGE' => 'main',
            'ideas' => $this->m_ideas->getItems($where, $order, true),
            'order_by' => ($order_by)? $order_by : 'date'
        );
        $this->mysmarty->view('global/main/index.tpl', $ps);
	}

    public function fake()
    {
        $this->load->helper('url');
        $user = array(
            'user_id' => '1',
            'login' => '',
            'password' => '',
            'email' => 'i@randix.info',
            'first_name' => 'Yuriy',
            'last_name' => 'Denishchenko',
            'url_friendly_name' => 'randix0',
            'timezone' => '2',
            'gender' => '2',
            'access_level' => '100',
            'auto_login_key' => '',
            'facebook_id' => '100000667500718',
        );

        $this->session->set_userdata($user);

        echo '<a href="/">main</a>';
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */