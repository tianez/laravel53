<?php
namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

use App\Http\Model\Topic;

class TopicController extends MainController {
    
    public function __construct() {
        parent::__construct();
        $this->model = new Topic();
        $this->files = 'topic';
        $this->title = '直播话题';
        $this->thead = array('id'=>'ID','title'=>'标题', 'content'=>'内容', 'status'=>'状态');
    }
}