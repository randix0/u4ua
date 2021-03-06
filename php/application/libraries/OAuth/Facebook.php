<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


require_once dirname(__FILE__).'/Abstract.php'; 


class Facebook extends OAuthAbstract {
	
	private $config = NULL;
	/**
     * Get segments file name
     *
     * @param integer $generation
     * @return string
     */	
	public function __construct() {
		$this->config = $config	 = &get_config();
				
		$this->app_id		= $config['facebook_app_id'];
		$this->app_secret	= $config['facebook_app_secret'];
		
		if(!$this->app_id || !$this->app_secret) {
			throw new Exception('Application ID not set', APP_ID_OR_SECRET_NOT_SET);
		}
		
	}
	
	
	
	/**
     * Get segments file name
     *
     * @param integer $generation
     * @return string
     */	
	public function getAccessToken($code, $reason = '') {
		
		$token_url = 'https://graph.facebook.com/oauth/access_token?client_id='.$this->app_id.'&redirect_uri='. urlencode($this->config['base_url'].'auth/step1/facebook/'.$reason).'&client_secret='.$this->app_secret.'&code='.$code;
		
		$response = NULL;
		
		if($contents = @file_get_contents($token_url)) {
			parse_str($contents, $response);
		} else {
			throw new Exception('Connection error', CONNECTION_ERROR);
		}
		
		if($response && isset($response['access_token']) && $response['access_token']) {
			$this->oa_access_token	= $response['access_token'];
			$this->oa_valid_till	= time() + $response['expires'];
			$this->oa_user_id		= 0;
			
			return true;
		}
		
		return false;
	}
	
	
	
	
	/**
     * Get segments file name
     *
     * @param integer $generation
     * @return string
     */	
	 protected function &_connectAndGrabUserData() {
		if(!$this->user_data_response) {
			
			if(!$this->oa_access_token) {
				throw new Exception('Token not valid', TOKEN_NOT_VALID);
			}
			
			if($this->oa_valid_till < time()) {
				throw new Exception('Token expired', TOKEN_EXPIRED);
			}
			
			$response = NULL;
			
			if($contents = @file_get_contents('https://graph.facebook.com/me?access_token='.$this->oa_access_token)) {
				
				$response = json_decode($contents, true);
				
				if(isset($response['id']) && $response['id']) {
					$this->user_data_response = $response;
				} else {
					throw new Exception('Get user data failed', CONNECTION_ERROR);
				}
			} else {
				throw new Exception('Connection error', CONNECTION_ERROR);
			}
			
		}

		return $this->user_data_response;
	 }
	 
	 
	 
	 
	 /**
     * Get segments file name
     *
     * @param integer $generation
     * @return string
     */	
	public function getUserID() {
		if($this->oa_user_id)
			return $this->oa_user_id;
		
		$response = $this->_connectAndGrabUserData();
		
		if($response) {
			$this->oa_user_id = $response['id'];
			
			return $this->oa_user_id;
		}
		
		return false;
	}
	 
	
	
	/**
     * Get segments file name
     *
     * @param integer $generation
     * @return string
     */	
	public function getUserData() {
		$response = $this->_connectAndGrabUserData();
		
		if($response) {
			$this->oa_user_id = $response['id'];
			
			return array(
												'first_name'		=> $response['first_name'],
												'last_name'			=> $response['last_name'],
												'url_friendly_name'	=> (isset($response['username'])?$response['username']:''),
												'email'				=> (isset($response['email']) && $response['email'] && isset($response['verified']) && $response['verified'])?$response['email']:'',
												'timezone'			=> $response['timezone'],
												'gender'			=> $response['gender']?(($response['gender']=='male')?2:1):0,
												'facebook_id'		=> $response['id']
											);
		}
		
		return false;
	}
	
	
	
	
	/**
     * Get segments file name
     *
     * @param integer $generation
     * @return string
     */	
	public function getUserPhoto() {
		$response = $this->_connectAndGrabUserData();

		if($response) {
			return 'http://graph.facebook.com/'.$response['id'].'/picture?type=large';
		}

		return false;
	}

    public function invoke($name, array $params = array())
    {
        //echo $this->oa_access_token.'<br>';
        //echo $this->oa_user_id;
        //echo $this->oa_valid_till;
        //exit();

        if(!$this->oa_access_token || !$this->oa_user_id) {
            throw new Exception('Token not valid', TOKEN_NOT_VALID);
        }

        if($this->oa_valid_till < time()) {
            throw new Exception('Token expired', TOKEN_EXPIRED);
        }

        $params['access_token'] = $this->oa_access_token;
        $result = array();

        if($contents = @file_get_contents('https://graph.facebook.com/'.$name.'?'.http_build_query($params))) {

            $response = json_decode($contents, true);
            //$result = $response;

            if($response) {
                $result = $response;
            } else {
                throw new Exception('Get user data failed', CONNECTION_ERROR);
            }

        } else {
            throw new Exception('Connection error', CONNECTION_ERROR);
        }

        return $result;
    }
}
?>