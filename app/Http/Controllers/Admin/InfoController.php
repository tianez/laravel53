<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\User;
use App\Http\Model\Fields;
use Auth;
use DB;
use Route;
use Illuminate\Http\Request;

class InfoController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function getRolesGroup(Request $request) {
        $roles = DB::table('roles')->get();
        $res = array();
        $r = array();
        foreach($roles as $role){
            $r['title'] = $role->display_name;
            $r['value'] = $role->id;
            $res[] = $r;
        }
        return response()->json($res);
    }

    public function getPermtsGroup(Request $request) {
        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $value) {
            // $arr[] =    $value->getPath();
            dump($value->getAction());
        }
    }
}