<?php
namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

use App\Http\Model\Fields;

class FieldsController extends MainController {
    
    public function __construct() {
        parent::__construct();
        $this->model = new Fields();
        $this->files = 'fields';
        $this->title = '字段';
        $this->thead = array('id'=>'ID','key'=>'字段key', 'title'=>'字段名称', 'f_module'=>'字段模块','status'=>'状态');
    }
}