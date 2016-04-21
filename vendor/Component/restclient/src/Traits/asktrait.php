<?php
namespace Component\Traits;
use \Component\Http\RestClient;
trait asktrait{
	protected $_askClient;
	
	function initAskClient(array $config){
		$this->_askClient = new RestClient([
            'base_uri' => $config['base_uri'],
            'app_id' => $config['app_id'], 'app_secret' => $config['app_secret'],
        ]);
	}
	 /**
     * get ask page list data
     */
    public function askLists(array $map, $order = '', $page = 1, $ps = 20)
    {
        $param['order'] = $order;
        $param['page'] = $page;
        $param['ps'] = $ps;
        $param = $param + $map;

        $response = $this->_askClient->get('/care/home/questions',
            ['query' => $param]
        );

        return $response;
    }
    /**
     * add ask
     */
    public function askAdd($data){
        return $this->_askClient->post('/care/home/question',['form_params'=>$data]);
    }
}