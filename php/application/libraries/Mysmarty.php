<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require "smarty/Smarty.class.php";


/**
* @file system/application/libraries/Mysmarty.php
*/
class Mysmarty extends Smarty
{
	private	$CI;
	private $tablet = false;
	
	function Mysmarty()
	{		
		parent::__construct();

		$config =& get_config();
		$this->CI =& get_instance();
        $this->CI->load->helper('url');

        $current_url = '';
        $lang = $this->CI->uri->segment(1);
        if (!preg_match('/^(en|ru|ua)$/',$lang)){
            $lang = 'ua';
            $current_url = uri_string();
        } else {
            $URIs = $this->CI->uri->segment_array();
            unset($URIs[1]);
            $current_url = implode('/',$URIs);
        }

        $this->CI->lang->load('', $lang);
		
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== FALSE) {
			$this->tablet = true;
		}
		
		$this->registerPlugin('block', 'l', array($this, 'smartyBlockTranslate'));
		$this->registerPlugin('modifier', 'minBr', array($this, 'smartyModifierMinBr'));
        $this->registerPlugin('modifier', 'actionTime', array($this, 'smartyActionTime'));
        $this->registerPlugin('modifier', 'tcMore', array($this, 'smartyModifierTruncateAndMore'));



		// absolute path prevents "template not found" errors
		$this->template_dir = (!empty($config['smarty_template_dir']) ? $config['smarty_template_dir'] 
																	  : APPPATH . 'views/');
																
		$this->compile_dir  = (!empty($config['smarty_compile_dir']) ? $config['smarty_compile_dir'] 
																	 : APPPATH . 'cache/'); //use CI's cache folder
																	 
		$this->assign('TABLET', $this->tablet);
		$this->assign('TEST_MODE', (isset($config['test_mode']) && $config['test_mode'])?true:false);
        $this->assign('_LANG', $lang);
        $this->assign('CURRENT_URL', $current_url);
        $this->assign("SITE_URI", '/'.$lang.'/');
			
		if (function_exists('site_url')) {
    		// URL helper required
			$this->assign("SITE_URL", site_url().$lang.'/'); // so we can get the full path to CI easily
		}	
		
		$this->assign("RESOURCES_URL", $config['resources_url']);
	}
	
	
	/**
	* @param $resource_name string
	* @param $params array holds params that will be passed to the template
	* @desc loads the template
	*/
	function view($resource_name, $params = array(), $attached = true, $fetch = false)   {
		global $BM;
		
		$file_folder = preg_replace('/\/[^\/]*$/i', '', $resource_name);
		
		if (strpos($resource_name, '.') === false) {
			$resource_name .= '.tpl';
		}
		
		$params['ATTACHED_TPL'] = '';
		$params['LOGGED'] = $this->CI->user->logged();
		$params['USER_DATA'] = array();
		
		$params['BASE_URL'] = $this->CI->config->item('base_url');
		
		$params['VK_APP_ID'] = $this->CI->config->item('vkontakte_app_id');
		$params['FB_APP_ID'] = $this->CI->config->item('facebook_app_id');
		$params['GL_APP_ID'] = $this->CI->config->item('google_app_id');


		if($params['LOGGED']) {
			$params['USER_DATA'] = &$this->CI->user->getUserData();
		} else {
			
		}

        $params['SESSION'] = $this->CI->session->all_userdata();

		
		$acls = &$this->CI->config->item('access_levels');
		if(is_array($acls)) {
			$params = array_merge($params, $acls);
		}
		
		if($attached)
		{
			$params['ATTACHED_TPL'] = $resource_name;
			$resource_name = 'std/page/page.tpl';
			
			if(is_file($this->template_dir[0].$file_folder.'/head_data.tpl')) {
				$params['HEAD_DATA_TPL'] = $file_folder.'/head_data.tpl';
			} else  {
				$params['HEAD_DATA_TPL'] = '';
			}
			
			if(is_file($this->template_dir[0].$file_folder.'/meta_data.tpl')) {
				$params['META_DATA_TPL'] = $file_folder.'/meta_data.tpl';
			} else  {
				$params['META_DATA_TPL'] = '';
			}
		}
		
		
			
		
		$this->assign($params);
		
		// check if the template file exists.
		/*if (!is_file($this->template_dir[0] . $resource_name)) {
			show_error("template: [$resource_name] cannot be found.");
		}*/
		
		
		$elapsed = $BM->elapsed_time('total_execution_time_start', 'total_execution_time_end');
		$this->assign('elapsed_time', $elapsed);
		
		try
		{
			if($fetch)
			{
				return $this->fetch($resource_name);
			}
			else
			{
				$this->display($resource_name);
			}
		}
		catch(Exception $e)
		{
			echo "PARSER ERROR: <br />\n<br /><pre style=\"font-size: 14px;\">".$e->getTraceAsString();
		}
	}
	
	
	
	
	
	/**
     * Get segments file name
     *
     * @param integer $generation
     * @return string
     */	
	function smartyBlockTranslate($params, $content, &$smarty, &$repeat) {
		if(isset($this->CI->lang)) {
			$result = &$this->CI->lang->line($content);
			
			if($result)
				return $result;
		}
			
		return $content;
	}

    function lang($content)
    {
        if(isset($this->CI->lang)) {
            $result = &$this->CI->lang->line($content);

            if($result)
                return $result;
        }

        return $content;
    }

    function smartyActionTime($time = 0, $html_tag = 'time', $html_class = 'timestamp', $html_attr = 'data-date')
    {
        $action_time = '';
        $now_year = date('Y');
        list($year,$hours,$minutes)=explode('-',date('Y-H-i',$time));
        /*
                list($year,$month,$day,$hours,$minutes,$seconds)=explode('-',date('Y-n-j-H-i-s',$time));
                list($now_year,$now_month,$now_day,$now_hours,$now_minutes,$now_seconds)=explode('-',date('Y-n-j-H-i-s'));
        */
        $diff_time = time()-$time;
        $diff_days = (int)($diff_time/86400);
        $diff_hours = (int)($diff_time/3600);
        $diff_minutes = (int)($diff_time/60);

        if ($year == $now_year)
            if ($diff_time > 43200) // day and month --12hours ness
                $action_time = strftime('%d %b',$time).' '.$this->lang('_at_oclock_').' '.$hours.':'.$minutes;
            elseif ($diff_hours > 1) // x hours ago -- 1hours ness
                $action_time = $diff_hours.' '.$this->lang('ч. назад');
            elseif ($diff_hours == 1) // about hour
                $action_time = $this->lang('около часа назад');
            elseif ($diff_minutes > 1) // about hour
                $action_time = $diff_minutes.' '.$this->lang('мин. назад');
            elseif ($diff_minutes == 1) // about hour
                $action_time = $this->lang('около минуты назад');
            else // about hour
                $action_time = $this->lang('несколько секунд назад');
        else
            $action_time = strftime('%d %b %Y',$time);

        if ($html_tag)
            $action_time = '<'.$html_tag.' class="'.$html_class.(($diff_hours > 12)?'_nonactual':'').'" '.$html_attr.'="'.date('r',$time).'">'.$action_time.'</'.$html_tag.'>';
        return $action_time;
    }

    /**
    * Get segments file name
    *
    * @param integer $generation
    * @return string
    */
    function smartyModifierMetaDesc($text, $min_length = 128, $max_length = 256, $etc=' <b>...</b>') {
        if ($min_length == 0 || $max_length == 0)
            return '';
        $text = trim($text);
        $matches = array();

        $str_ln = mb_strlen($text);

        //$text = preg_replace('/http[s]{0,1}:\/\/[\S]{1,}/', '<a href="#">$0</a>', $text);

        if($str_ln <= $max_length)
            return $text;

        $text = mb_substr($text, 0, $max_length);
        $delimeters = array('.','!','?');

        while($max_length > $min_length) {
            if(in_array(mb_substr($text, ($max_length-1), 1), $delimeters)) {
                return mb_substr($text, 0, $max_length).$etc;
            }
            $max_length--;
        }

        return $text.$etc;
    }
    //$text = preg_replace_callback(validURLExp(), array(&$this, 'linksReplaceCallback'), $text);

    /**
     * Get segments file name
     *
     * @param integer $generation
     * @return string
     */
    private function linksReplaceCallback($matches, $suf_limit = 48) {
        if(!$matches)
            return '';

        $suf = '';
        if(isset($matches[2]) && strlen($matches[2]) < $suf_limit) {
            $suf = $matches[2];
        } else {
            $suf = (isset($matches[3])?$matches[3].'..':'');
        }

        return '<a href="/away?url='.$matches[0].'" target="_blank">'.$matches[1].''.$suf.'</a>';
    }



    /**
     * Get segments file name
     *
     * @param integer $generation
     * @return string
     */
    function smartyModifierPrepareLinks($text) {

        $this->CI->load->helper('url_helper');
        $text = preg_replace_callback(validURLExp(), array(&$this, 'linksReplaceCallback'), $text);

        return $text;
    }



    /**
     * Get segments file name
     *
     * @param integer $generation
     * @return string
     */
    function smartyModifierTruncateAndMore($text, $min = 164, $max = 312, $show_word = 'ACTION_SHOW_ALL', $hide_word = 'ACTION_HIDE') {
        $text_ln_mb = mb_strlen($text);
        $text_ln = strlen($text);

        $this->CI->load->helper('url_helper');
        $text = preg_replace_callback(validURLExp(), array(&$this, 'linksReplaceCallback'), $text);

        if($text_ln_mb <= $min) {
            return $text;
        }



        //find and cut links in text
        $repl = array(); $matches = array();
        preg_match_all('/<a[^\<]+<\/a>/', $text, $matches, PREG_OFFSET_CAPTURE);

        $offsets = 0;
        if($matches) {
            foreach($matches[0] as $m) {
                if(!$m)
                    break;

                $len = strlen($m[0]);
                $repl[] = array($m[0], $m[1]-$offsets, $len);

                $text = substr_replace($text,'',$m[1]-$offsets,$len);
                $offsets += $len;
            }
        }

        //reverse cuted links array
        if($repl)
            $repl = array_reverse($repl);

        $half_1  = $this->smartyModifierMetaDesc($text, $min, $max, '');
        $half_1_ln = strlen($half_1);

        if($half_1_ln >= $text_ln) {

            if($repl) {
                foreach($repl as $r) {
                    $text = substr_replace($text,$r[0],$m[1]);
                }
            }

            return $text;
        }

        $half_2  = substr($text, $half_1_ln);

        //paste cuted links into text
        if($repl) {
            foreach($repl as $r) {
                if($r[1]<=$half_1_ln) {
                    $half_1 = substr_replace($half_1,$r[0],$r[1],0);
                } else {
                    $half_2 = substr_replace($half_2,$r[0],$r[1]-$half_1_ln,0);
                }
            }
        }


        $etc = '<span class="show-more" style="display:none;">';
        $end = '</span><br /><a class="b-showMore" onclick="Posts.showMore(this);" data-hidden="1" data-txt-show="'.$this->CI->lang->line($show_word).'" data-txt-hide="'.$this->CI->lang->line($hide_word).'">'.$this->CI->lang->line($show_word).'</a>';

        return $half_1.$etc.$half_2.$end;
    }
} // END class smarty_library

if(!function_exists('validURLExp')) {
    function validURLExp() {
        return '/((?:http[s]?|ftp):\/\/[A-Za-z0-9-.]{2,}\.[A-Za-z0-9^.]{2,10})(([\?\/\#])[^\"\'\<\>]*|[\?\/\#]?)/';
 }
}
?>