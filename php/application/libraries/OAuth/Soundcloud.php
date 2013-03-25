<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


require_once dirname(__FILE__).'/Abstract.php';


class Google extends OAuthAbstract {

    private $config = NULL;
    /**
     * Get segments file name
     *
     * @param integer $generation
     * @return string
     */
    public function __construct() {
        $this->config = $config	 = &get_config();

        $this->app_id		= $config['soundcloud_app_id'];
        $this->app_secret	= $config['soundcloud_app_secret'];

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

        $token_url	= 'https://api.soundcloud.com/oauth2/token';
        $data		= 'code='.$code.
            '&client_id='.$this->app_id.
            '&client_secret='.$this->app_secret.
            '&redirect_uri='. urlencode($this->config['base_url'].'auth/step1/soundcloud/'.$reason).
            '&grant_type=authorization_code';


        $response = NULL;

        if($contents = @file_get_contents($token_url, false, stream_context_create(array('http'=>array(
            'method'	=>'POST',
            'header'	=> "Content-type: application/x-www-form-urlencoded\r\n".
                "Content-Length: " . strlen($data) . "\r\n",
            'content'	=>$data
        ))))) {

            $response = json_decode($contents, true);

        } else {
            throw new Exception('Connection error', CONNECTION_ERROR);
        }

        if($response && isset($response['access_token']) && $response['access_token']) {
            $this->oa_access_token	= $response['access_token'];
            $this->oa_valid_till	= time() + $response['expires_in'];
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

            if($contents = @file_get_contents('https://api.soundcloud.com/me.json?access_token='.$this->oa_access_token)) {

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

            $name = explode(' ',$response['full_name']);
            return array(
                'first_name'		=> $name[0],
                'last_name'			=> $name[1],
                'url_friendly_name'	=> $response['permalink'],
                'email'				=> '',
                'soundcloud_id'			=> $response['id']
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

        if($response && isset($response['avatar_url']) && $response['avatar_url']) {
            return $response['avatar_url'];
        }

        return false;
    }

    public function invoke($name, array $params = array())
    {
        if(!$this->oa_access_token || !$this->oa_user_id) {
            throw new Exception('Token not valid', TOKEN_NOT_VALID);
        }

        if($this->oa_valid_till < time()) {
            throw new Exception('Token expired', TOKEN_EXPIRED);
        }

        $params['access_token'] = $this->oa_access_token;
        $result = array();

        if($contents = @file_get_contents('https://api.soundcloud.com/'.$name.'.json?'.http_build_query($params))) {

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