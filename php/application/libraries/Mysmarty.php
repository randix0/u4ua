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

        $lang = $this->CI->uri->segment(1);
        if (!preg_match('(en|ru|ua)',$lang))
            $lang = 'ua';

        $this->CI->lang->load('', $lang);
		
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== FALSE) {
			$this->tablet = true;
		}
		
		$this->registerPlugin('block', 'l', array($this, 'smartyBlockTranslate'));
		$this->registerPlugin('modifier', 'minBr', array($this, 'smartyModifierMinBr'));

		// absolute path prevents "template not found" errors
		$this->template_dir = (!empty($config['smarty_template_dir']) ? $config['smarty_template_dir'] 
																	  : APPPATH . 'views/');
																
		$this->compile_dir  = (!empty($config['smarty_compile_dir']) ? $config['smarty_compile_dir'] 
																	 : APPPATH . 'cache/'); //use CI's cache folder
																	 
		$this->assign('TABLET', $this->tablet);
		$this->assign('TEST_MODE', (isset($config['test_mode']) && $config['test_mode'])?true:false);
        $this->assign('_LANG', $lang);
			
		if (function_exists('site_url')) {
    		// URL helper required
			$this->assign("SITE_URL", site_url()); // so we can get the full path to CI easily
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
		//$params['LOGGED'] = $this->CI->user->logged();
		$params['USER_DATA'] = array();
		
		$params['BASE_URL'] = $this->CI->config->item('base_url');
		
		$params['VK_APP_ID'] = $this->CI->config->item('vkontakte_app_id');
		$params['FB_APP_ID'] = $this->CI->config->item('facebook_app_id');
		$params['GL_APP_ID'] = $this->CI->config->item('google_app_id');

        /*
		if($params['LOGGED']) {
			$params['USER_DATA'] = &$this->CI->user->getUserData();
		} else {
			
		}
        */
		
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
	
	
	
} // END class smarty_library
?>