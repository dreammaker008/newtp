<?php 
namespace  tests\Http;
use Component\Http\RestClient;
/**
 * RestClientTest 
 * 
 * @package 
 * @version $id$
 * @copyright Copyright (c) 2012-2016 Gaodun Co. All Rights Reserved.
 * @author Guojing Liu <liuguojing@gaodun.com> 
 * @license 
 */
class RestClientTest extends \PHPUnit_Framework_TestCase {
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
        $this->restClient = new RestClient(['base_uri'=>'http://dev.base.gaodun.com/course/',
                'app_id' => 'gd_course_ephiphany', 'app_secret' => 'ca6d93b43feae5b286629c0f0dab3178'
                ]);
    }
    /**
     * testGetCourse 
     * 
     * @access public
     * @return mixed
     */
    function testGetCourse()
    {
        $response =  $this->restClient->get('Home/CourseRest/11', [
                ]
                );

        $this->assertEquals(0, $response->json()->status);
        $this->assertNotEmpty($response->json()->result);
    }
    /**
     * testGetSyllabusWare 
     * 
     * @access public
     * @return mixed
     */
    function testGetSyllabusWare()
    {
        $response =  $this->restClient->get('Home/SyllabusWareRest?syllabus_id=1713&course_id=1780', [
                ]
                );

        $this->assertEquals(0, $response->json()->status);
        $this->assertNotEmpty($response->json()->result);
    }
    /**
     * testGetResourceWare 
     * 
     * @access public
     * @return mixed
     */
    function testGetResourceWare()
    {
        $response =  $this->restClient->get('Home/WareResourceRest/?ware_id=58', [
                ]
                );

        $this->assertEquals(0, $response->json()->status);
        $this->assertNotEmpty($response->json()->result);
    }
    /**
     * testGetResource 
     * 
     * @access public
     * @return mixed
     */
    function testGetResource()
    {
        $response =  $this->restClient->get('Home/ResourceRest/35', [
                ]
                );

        $this->assertEquals(0, $response->json()->status);
        $this->assertNotEmpty($response->json()->result);
    }
    function testGetWare()
    {
        $response =  $this->restClient->get('Home/WareRest/62', [
                ]
                );

        $this->assertEquals(0, $response->json()->status);
        $this->assertNotEmpty($response->json()->result);
    }
    function testGetCourseSyllabus()
    {
        $response =  $this->restClient->get('Home/CourseSyllabusRest?course_id=1780&level=2', [
                ]
                );

        $this->assertEquals(0, $response->json()->status);
        $this->assertNotEmpty($response->json()->result);
    }

}

