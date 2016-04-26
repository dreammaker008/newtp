<?php

namespace tests;

use Component\Http\RestClient;

class ProjectClientTest extends \PHPUnit_Framework_TestCase
{
    public $restClient = '';
    public function setUp()
    {
        $this->restClient = new RestClient(['base_uri' => 'http://dev.base.gaodun.com',
            'app_id' => 'gd_project_partner3564', 'app_secret' => 'ca6d93b43feae5b286629c0f0dab3178',
        ]);
    }
    public function testGet()
    {
        $map = [
            'ps' => 1,
            'page' => 2,
            'order' => 'id desc',
        ];
        $response = $this->restClient->get('/project/home/projects', ['query' => $map]);

        $this->assertEquals(0, $response->json()->status);
        $this->assertNotEmpty($response->json()->result);
    }
    // public function testPost()
    // {
    //     $param = [
    //         "project_id" => "14",
    //         "subject_id" => "130",
    //         "courseware_part_id" => "84856",
    //         "student_id" => "1749694",
    //         "course_id" => "1406",
    //         "course_ware_id" => "16442",
    //         "regdate" => 1460959336,
    //         "content" => "sfsff",
    //         "isself" => "0",
    //         "type" => 1,
    //         "video_time" => "16",
    //     ];
    //     $response = $this->restClient->post('/note/home/note', ['form_params' => $param]);

    //     $this->assertEquals(0, $response->json()->status);
    // }
}
