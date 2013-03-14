<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller {

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

    public function login($reason = '')
    {
        $ps = array(
            'reason' => $reason
        );
        $this->mysmarty->view('modals/login/index.tpl', $ps, false);
    }

    public function voteIdea($idea_id = 0)
    {
        if (!$idea_id) return show_404();
        $ps = array(
            'idea_id' => $idea_id
        );
        $this->mysmarty->view('modals/voteIdea/index.tpl', $ps, false);
    }

    public function alertSuccess($code = '')
    {
        $this->mysmarty->view('modals/alert/indexSuccess.tpl', array('code'=>$code), false);
    }

    public function alertError($code = '')
    {
        $errors = json_decode(base64_decode(urldecode($code)),true);

        $ps = array(
            '__PAGE' => 'main',
            'errors' => $errors
        );
        $this->mysmarty->view('modals/alert/indexError.tpl', $ps, false);
    }

    public function success($code = '')
    {
        $messages = array();
        if ($code)
            $messages = json_decode(base64_decode(urldecode($code)),true);

        $ps = array(
            'messages' => $messages
        );
        $this->mysmarty->view('modals/success/index.tpl', $ps, false);
    }

    public function upload($upload_type = '', $id = 0, $multiple = 1)
    {
        if ($multiple > 0) $multiple = true;
        else $multiple = false;
        $ps = array(
            'upload_type' => $upload_type,
            'id' => $id,
            'multiple'=>$multiple
        );
        $this->mysmarty->view('modals/upload/index.tpl', $ps, false);
    }

    public function shareIdea($source = '', $idea_id = 0)
    {
        $this->load->helper('url');
        $sources = array('twitter'		=> array('url' => 'http://twitter.com/home', 'params' => array('status' => '{$TITLE} {$URL} #u4ua'), 'bitly' => false, 'max_len' => 0, 'utm_source' => 'twitter.com'),
            'vkontakte'	        => array('url' => 'http://vkontakte.ru/share.php', 'params' => array('url' => '{$URL}'), 'bitly' => false, 'max_len' => 1300, 'utm_source' => 'vkontakte.ru'),
            'facebook'		    => array('url' => 'http://www.facebook.com/sharer.php', 'params' => array('u' => '{$URL}', 't' => '{$TITLE}'), 'bitly' => false, 'max_len' => 0, 'utm_source' => 'facebook.com'),
            'odnoklassniki'		=> array('url' => 'http://www.odnoklassniki.ru/dk', 'params' => array('st.cmd' => 'addShare', 'st._surl' => '{$URL}'), 'bitly' => false, 'max_len' => 0, 'utm_source' => 'odnoklassniki.ru'),
            'livejournal'		=> array('url' => 'http://www.livejournal.com/update.bml', 'params' => array('subject' => '{$TITLE} - www.u4ua.com', 'event' => '{$DESCRIPTION} <br /><br /> <a href=&quot;{$URL}&quot;>www.u4ua.com</a>'), 'bitly' => false, 'max_len' => 1300, 'utm_source' => 'livejournal.com'),
            'google'            => array('url' => 'https://plus.google.com/share', 'params' => array('url' => '{$URL}'),'bitly' => false, 'max_len' => 0, 'utm_source' => 'plus.google.com')
        );

        $this->load->model('m_ideas');

        if ($idea_id) {
            $idea = $this->m_ideas->getItem($idea_id);
        }

        if(!array_key_exists($source, $sources) || !$idea)
        {
            echo '<script type="text/javascript">window.close();</script>';
            return;
        }

        $lang = $this->session->userdata('lang');
        if (!$lang)
            $lang = 'ua';
        $url = base_url('/'.$lang.'/idea/'.$idea_id);
        $url .= '?utm_source='.$sources[$source]['utm_source'].'&utm_medium=share';

        $idea['idesc'] = preg_replace('/<xml(.*)<\/xml>/', '', $idea['idesc']);
        $idea['idesc'] = preg_replace("/<br[ \/]{0,2}>/i","\n",$idea['idesc']);
        $idea['idesc'] = strip_tags($idea['idesc']);


        if($sources[$source]['max_len'] > 0 && mb_strlen($idea['idesc']) > $sources[$source]['max_len'])
            $idea['idesc'] = mb_substr($idea['idesc'], 0, $sources[$source]['max_len']).'...';

        $idea['idesc'] = str_replace( "\"",	"&quot;",	$idea['idesc']);
        $idea['idesc'] = str_replace( "'",	"&#39;",	$idea['idesc']);

        foreach($sources[$source]['params'] as $k => &$v)
        {
            $v = str_replace('{$URL}', $url, $v);
            $v = str_replace('{$TITLE}', $idea['iname'], $v);
            $v = str_replace('{$DESCRIPTION}', $idea['idesc'], $v);

            if(isset($idea['qr_code']))
                $v = str_replace('{$IMAGE}', base_url($idea['qr_code']), $v);
            else
                $v = str_replace('{$IMAGE}', '', $v);
        }

        $this->mysmarty->view('modals/share/index.tpl', array('source' => $sources[$source]), false);
    }

    public function shareLink($source = '', $url = '')
    {
        $this->load->helper('url');
        $sources = array('twitter'		=> array('url' => 'http://twitter.com/home', 'params' => array('status' => '{$URL} #u4ua'), 'bitly' => false, 'max_len' => 0, 'utm_source' => 'twitter.com'),
            'vkontakte'	        => array('url' => 'http://vkontakte.ru/share.php', 'params' => array('url' => '{$URL}'), 'bitly' => false, 'max_len' => 1300, 'utm_source' => 'vkontakte.ru'),
            'facebook'		    => array('url' => 'http://www.facebook.com/sharer.php', 'params' => array('u' => '{$URL}', 't' => '{$TITLE}'), 'bitly' => false, 'max_len' => 0, 'utm_source' => 'facebook.com'),
            'odnoklassniki'		=> array('url' => 'http://www.odnoklassniki.ru/dk', 'params' => array('st.cmd' => 'addShare', 'st._surl' => '{$URL}'), 'bitly' => false, 'max_len' => 0, 'utm_source' => 'odnoklassniki.ru'),
            'google'            => array('url' => 'https://plus.google.com/share', 'params' => array('url' => '{$URL}'),'bitly' => false, 'max_len' => 0, 'utm_source' => 'plus.google.com')
        );

        if(!array_key_exists($source, $sources) || !$url)
        {
            echo '<script type="text/javascript">window.close();</script>';
            return;
        }

        $url .= '?utm_source='.$sources[$source]['utm_source'].'&utm_medium=share';

        foreach($sources[$source]['params'] as $k => &$v)
        {
            $v = str_replace('{$URL}', $url, $v);
        }

        $this->mysmarty->view('modals/share/index.tpl', array('source' => $sources[$source]), false);
    }

}