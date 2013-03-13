<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings{
    private $settingsData = array();
    private	$CI;

    function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model('m_settings');
        $raw_data = $this->CI->m_settings->getItems();
        foreach($raw_data as $r){
            $this->settingsData[$r['code']] = $r['value'];
        }
    }

    function __get($code)
    {
        if(isset($this->settingsData[$code]))
            return $this->settingsData[$code];
        else
            return NULL;
    }

    function &getAllData()
    {
        return $this->settingsData;
    }
}