<?php
namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

use App\Models\DbConfig;

class ConfigController extends MainController {
    
    public function __construct() {
        parent::__construct();
        $this->model = new DbConfig();
        $this->files = 'config';
        $this->title = '设置';
        $this->thead = array('id'=>'ID','name'=>'设置名', 'value'=>'设置值',  'description'=>'说明');
    }
}