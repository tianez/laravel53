<?php
namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

use App\Http\Model\Roles;

class RolesController extends MainController {
    
    public function __construct() {
        parent::__construct();
        $this->model = new Roles();
        $this->files = 'roles';
        $this->title = '用户组';
        $this->thead = array('id'=>'ID','name'=>'用户组标识', 'display_name'=>'用户组名称', 'description'=>'描述');
    }
}