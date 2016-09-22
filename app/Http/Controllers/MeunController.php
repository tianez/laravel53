<?php
namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

use App\Http\Model\Meun;

class MeunController extends MainController {
    
    public function __construct() {
        parent::__construct();
        $this->model = new Meun();
        $this->files = 'meun';
        $this->title = '菜单';
        $this->thead = array('id'=>'ID','link'=>'链接地址', 'title'=>'链接标题', 'description'=>'描述');
    }
}