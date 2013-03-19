<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


require_once dirname(__FILE__).'/Abstract.php';


class Odnoklassniki extends OAuthAbstract {

    private $config = NULL;
    /**
     * Get segments file name
     *
     * @param integer $generation
     * @return string
     */
    public function __construct() {
        $this->config = $config	 = &get_config();

        $this->app_id		= $config['odnoklassniki_app_id'];
        $this->app_secret	= $config['odnoklassniki_app_secret'];
        $this->app_public	= $config['odnoklassniki_app_public'];

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

        $token_url	= 'http://api.odnoklassniki.ru/oauth/token.do';
        $data		= 'code='.$code.
            '&client_id='.$this->app_id.
            '&client_secret='.$this->app_secret.
            '&redirect_uri='. urlencode($this->config['base_url'].'auth/step1/odnoklassniki/'.$reason).
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
            $this->oa_valid_till	= time() + 60*30;
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

            $method = 'users.getCurrentUser';

            $params = array(
                'access_token'=>$this->oa_access_token,
                'method'=>$method,
                'application_key'=>$this->app_public,
                'sig'=>md5('application_key='.$this->app_public.'method='.$method.md5($this->oa_access_token.$this->app_secret))
            );

            if($contents = @file_get_contents('http://api.odnoklassniki.ru/fb.do?'.http_build_query($params))) {

                $response = json_decode($contents, true);

                //if(isset($response['id']) && $response['id']) {
                if(isset($response) && $response) {
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
            $this->oa_user_id = $response['uid'];

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
            $this->oa_user_id = $response['uid'];

            return array(
                'first_name'		=> $response['first_name'],
                'last_name'			=> $response['last_name'],
                //'url_friendly_name'	=> '',
                //'email'				=> (isset($response['verified_email']) && $response['verified_email'])?$response['email']:'',
                //'timezone'			=> '',
                'gender'			=> $response['gender']?(($response['gender']=='male')?2:1):0,
                'odnoklassniki_id'			=> $response['uid']
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

        if($response && isset($response['pic_2']) && $response['pic_2']) {
            return $response['pic_2'];
        }

        return false;
    }


    public function invoke($method = 'users.getCurrentUser', array $params = array())
    {
        $result = array();
        $params['access_token'] = $this->oa_access_token;
        $params['method'] = $method;
        $params['application_key'] = $this->app_public;
        $params['sig'] = md5('application_key='.$this->app_public.'method='.$method.md5($this->oa_access_token.$this->app_secret));


        if(!$this->oa_access_token || !$this->oa_user_id) {
            throw new Exception('Token not valid', TOKEN_NOT_VALID);
        }

        if($this->oa_valid_till < time()) {
            throw new Exception('Token expired', TOKEN_EXPIRED);
        }

        if($contents = @file_get_contents('http://api.odnoklassniki.ru/fb.do?'.http_build_query($params))) {

            $response = json_decode($contents, true);

            //if(isset($response['id']) && $response['id']) {
            if(isset($response) && $response) {
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