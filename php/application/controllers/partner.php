<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partner extends CI_Controller {

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
        $this->load->model('m_partners');
        $partners = $this->m_partners->getItems();
        $ps = array(
            '__PAGE' => 'partners',
            'partners' => $partners
        );
        $this->mysmarty->view('global/partners/index.tpl', $ps);
    }

    public function item($partner_id = 0)
    {
        $this->load->model('m_partners');
        $partner = $this->m_partners->getItem($partner_id);
        if (!$partner) return redirect(base_url('/partners'));


        $ps = array(
            '__PAGE' => 'partners',
            'partner' => $partner
        );
        $this->mysmarty->view('global/partner/item/index.tpl', $ps);
    }

    public function add()
    {
        $this->load->helper('url');
        if (!$this->user->logged()) return redirect(base_url('/'));

        $partner = array(
            'id' => 0,
            'user_id' => '',
            'url' => '',
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
            'partner' => $partner
        );
        $this->mysmarty->view('global/partner/add/index.tpl', $ps);
    }

    public function edit($id)
    {
        $this->load->helper('url');
        if (!$this->user->logged() || !$id) return redirect(base_url('/partners'));

        $this->load->model('m_partners');
        $partner = $this->m_partners->getItem($id);
        if (!$partner) return redirect(base_url('/partners'));


        $ps = array(
            '__PAGE' => 'idea',
            'partner' => $partner
        );
        $this->mysmarty->view('global/partner/add/index.tpl', $ps);
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */