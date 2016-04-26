<?php 
namespace  tests\Http;
use Component\Http\RestClient;
/**
 * DemoTest 
 * 
 * @package 
 * @version $id$
 * @copyright Copyright (c) 2012-2016 Gaodun Co. All Rights Reserved.
 * @author Guojing Liu <liuguojing@gaodun.com> 
 * @license 
 */
class DemoTest extends \PHPUnit_Framework_TestCase {
    /**
     * restClient 
     * 
     * @var string
     * @access public
     */
    public $restClient = '';

    /**
     * setUp 
     * 
     * @access public
     * @return mixed
     */
    public function setUp()
    {
        $this->restClient = new RestClient(['base_uri'=>'http://dev.base.gaodun.com/demo/',
                'app_id' => 'gd_demo_abcdef', 'app_secret' => '0123456789abcdefghijklmnopqrstuvwxyz'
                ]);
    }
    /**
     * testGet
     * 
     * @access public
     * @return mixed
     */
    function testGet()
    {
        $response =  $this->restClient->get('Home/CommentRest/4', [
                ]
                );
        $this->assertEquals(0, $response->json()->status);
        $this->assertNotEmpty($response->json()->result);
    }
    function testPost()
    {
        $response =  $this->restClient->post('Home/CommentRest', [
                     'form_params' => [
                        'title' =>'dasfsadeeef',
                        'comment' =>'daeeesfsadf',
                     ]
                ]
                );
        $this->assertEquals(0, $response->json()->status);
        return $response->json()->result;
    }
    /**
     * testDelete 
     * @depends testPost
     * 
     * @access public
     * @return mixed
     */
    function testDelete($id)
    {
        $response =  $this->restClient->delete('Home/CommentRest/'.$id, [
                ]
                );
        $this->assertEquals(0, $response->json()->status);
    }

}

