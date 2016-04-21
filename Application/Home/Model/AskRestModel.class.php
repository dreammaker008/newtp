<?php
namespace Home\Model;
/**
 * restful service model for ask
 *
 * @author jasonchen
 * @date 2016-4-19
 */

class AskRestModel extends RestModel
{
	public function __construct()
    {
    	$config=C('REST_ASK_CONFIG');
        $baseuri['base_uri']=C('base_service_domain');
        parent::__construct($config+$baseuri);
    }
/**
 * get page ask list data
 */
    public function lists(array $map, $order='', $page=1, $ps=20) {
        $param['order'] = $order;
        $param['page'] = $page;
        $param['ps'] = $ps;
        $param = $param + $map;

        $response = $this->_client->get('/care/home/questions',
            ['query' => $param]
        );

        return $response;
    }
}
