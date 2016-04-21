<?php
namespace Home\Model;
use \Component\Http\RestClient;

/**
 * restful service base model class
 *
 * @author jasonchen
 * @date 2016-4-19
 */
class RestModel
{
	protected $_client;
	/**
	 * init the rest client
	 */
    public function __construct(array $config)
    {
    	$this->_client=new RestClient([
            'base_uri' => $config['base_uri'],
            'app_id' => $config['app_id'], 'app_secret' => $config['app_secret'],
        ]);
    }
}
