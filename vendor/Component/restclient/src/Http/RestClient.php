<?php 
namespace Component\Http;
use GuzzleHttp\Client as HttpClient;

class RestClient extends HttpClient {
    /**
     * appId 
     * 
     * @var string
     * @access public
     */
    public $appId     = '';

    /**
     * appSecret 
     * 
     * @var string
     * @access public
     */
    public $appSecret = '';

    /**
     * Clients accept an array of constructor parameters.
     *
     * Here's an example of creating a client using a base_uri and an array of
     * default request options to apply to each request:
     *
     *     $client = new RestClient([
     *         'base_uri'        => 'http://base.gaodun.com/course',
     *         'timeout'         => 10,
     *         'app_id'          => 'gd_course_ephiphany', 
     *         'app_secret'      => 'ca6d93b43feae5b286629c0f0dab3178'
     *     ]);
     *
     * 
     * @param array $config 
     * @access public
     * @return mixed
     */
    public function __construct(array $config = []) 
    {
        foreach (['app_id' => 'appId', 'app_secret' => 'appSecret'] as $key=>$value) {
            if (isset($config[$key]))  $this->$value = $config[$key] ;
            unset($config[$key]);
        }

        $config +=[ 'timeout' => 10, 'base_uri' => 'http://base.gaodun.com', 
            'allow_redirects '=> false,
            ];

        parent :: __construct($config);

    }

    /**
     * prepareDefaultOptions 
     * 
     * @access private
     * @return mixed
     */
    private function prepareDefaultOptions()
    {
        $headers   =  ['App-Id-Key'=> $this->appId, 'Accept'=> 'application/json'];
        $timestamp = time();
        $nonce     =  $this->genRandStr(10);;
        $headers['App-Signature'] = $this->signature($timestamp, $nonce, $this->appSecret);
        $headers['App-Timestamp'] = $timestamp;
        $headers['App-nonce']     =  $nonce;

        return ['headers' => $headers ];

    }

    /**
     * genRandStr 
     * 
     * @param mixed $length 
     * @access public
     * @return mixed
     */
    public function genRandStr($length) 
    {
        $str  = '';
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;

        for($i=0;$i<$length;$i++)
        {
            $str .= $strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }

        return $str;
    }
    /**
     * signature 
     * 
     * @param mixed $timestamp 
     * @param mixed $nonce 
     * @param mixed $token 
     * @access protected
     * @return mixed
     */
    protected function signature($timestamp, $nonce, $token)
    {
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );

        return  sha1( $tmpStr );

    }

    /**
     * post 发送post请求 
     * 
     *    $cliet->post('Home/CommentRest',[
     * ])
     *
     * @param mixed $uri 
     * @param array $options 
     * @access public
     * @return mixed
     */
    function post($uri, array $options = []) 
    {
        $options += $this->prepareDefaultOptions(); 
        $response = $this->request('POST', $uri, $options);

        return new JsonResponse($response);

    }
    /**
     * get 
     * 
     * @param mixed $uri 
     * @param array $options 
     * @access public
     * @return mixed
     */
    function get($uri, array $options = []) 
    {
        $options += $this->prepareDefaultOptions(); 
        $response = $this->request('GET', $uri, $options);

        return new JsonResponse($response);

    }

    /**
     * delete 
     * 
     * @access public
     * @return mixed
     */
    function delete($uri, $options) 
    {
        $options += $this->prepareDefaultOptions(); 
        $response = $this->request('DELETE', $uri, $options);

        return new JsonResponse($response);

    }
    /**
     * put 
     * 
     * @access public
     * @return mixed
     */
    function put($uri, $options) 
    {
        $options += $this->prepareDefaultOptions(); 
        $response = $this->request('PUT', $uri, $options);

        return new JsonResponse($response);

    }
}
