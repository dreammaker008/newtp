<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    use \Component\Traits\notetrait;
    public function index()
    {
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8');
    }
    public function testGuzzle()
    {
        header('Accept', 'application/json');
        // $client = new \Component\Http\RestClient([
        //     'base_uri' => 'http://dev.base.gaodun.com',
        //     'app_id' => 'gd_note_partner121', 'app_secret' => 'ca6d93b43feae5b286629c0f0dab3178',
        // ]);
        $askmodel=D('AskRest');
        $map = [
            'ps' => 1,
            'page' => 2,
            'order' => 'id desc',
        ];
        $param1 = [
            'type' => '1',
            'student_id' => '1749694',
            'regdate' => '1460526822',
            'content' => 'tsetss',
            'video_time' => '1460526821',
            'modifydate' => '1460526822',
            'is_view' => '1',
            'class_id' => '0',
            'more_content' => 'f',
            'icid' => '',
            'file_url' => '',
        ];
        $param2 = [
            "project_id" => "14",
            "subject_id" => "130",
            "courseware_part_id" => "84856",
            "student_id" => "1749694",
            "course_id" => "1406",
            "course_ware_id" => "16442",
            "regdate" => 1460959336,
            "content" => "sfsff",
            "isself" => "0",
            "type" => 1,
            "video_time" => "16",
        ];
        //$response = $client->post('/note/home/note', ['form_params' => $param2]);
        //$response = $client->get('/note/home/notes', ['query' => $map]);
        $response=$askmodel->lists([],'id desc',1,1);
        $return = $response->json()->result;
        var_export($return);exit;

    }
    
    function testtrait(){
        $config=C('REST_NOTE_CONFIG');
        $baseuri['base_uri']=C('base_service_domain');
        $this->initNoteClient($config+$baseuri);
        $response=$this->noteLists([],'id desc',1,1);
        $return = $response->json()->result;
        var_export($return);exit;
    }
}
