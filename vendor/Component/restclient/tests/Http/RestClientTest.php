<?php

namespace tests\Http;

use Component\Http\RestClient;

class RestClientTest extends \PHPUnit_Framework_TestCase
{
    public $restClient = '';
    public function setUp()
    {
        $this->restClient = new RestClient(['base_uri' => 'http://dev.base.gaodun.com',
            'app_id' => 'gd_care_partner', 'app_secret' => 'ca6d93b43feae5b286629c0f0dab3178',
        ]);
    }
    public function testGet()
    {
        $map = [
            'ps' => 1,
            'page' => 2,
            'order' => 'id desc',
        ];
        $response = $this->restClient->get('/note/home/notes', ['query' => $map]);

        $this->assertEquals(0, $response->json()->status);
        //$this->assertNotEmpty($response->json(true)['result']);
    }

}
