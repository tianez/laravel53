<?php
namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

use App\Http\Model\Chat;

class ChatsController extends MainController {
    
    public function __construct() {
        parent::__construct();
        $this->model = new Chat();
        $this->files = 'chats';
        $this->title = '直播评论';
        $this->thead = array('id'=>'ID','content'=>'内容', 'username'=>'用户名');
    }
}