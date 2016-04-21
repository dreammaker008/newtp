<?php
namespace Home\Widget;
use Think\Controller;
class TestWidget extends Controller {
public function menu($id,$name){
echo $id.':'.$name;
}
}