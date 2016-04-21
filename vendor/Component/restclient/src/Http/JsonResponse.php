<?php 
namespace Component\Http;

use GuzzleHttp\Psr7\Response as Response;
/**
 * JsonResponse 
 * 
 * @package 
 * @version $id$
 * @copyright Copyright (c) 2012-2016 Gaodun Co. All Rights Reserved.
 * @author Guojing Liu <liuguojing@gaodun.com> 
 * @license 
 */
class JsonResponse {
    /**
     * response 
     * 
     * @var string
     * @access public
     */
    public $response  = '';
    /**
     * __construct 
     * 
     * @param mixed $response 
     * @access public
     * @return mixed
     */
    public function __construct($response) 
    {
        $this->response = $response;
    }
    public function json($assoc= false)
    {
        $code = $this->response->getStatusCode() ;
        if ($code != 200 ) {
            throw new Exception($this->response->withStatus($code), $code);
        }
        $json =  json_decode($this->response->getBody(), $assoc);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new \InvalidArgumentException(json_last_error_msg());
        }

        return $json;

    }

}
