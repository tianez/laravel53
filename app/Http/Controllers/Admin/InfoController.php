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

    public function getCategory(Request $request) {
        $categorys = DB::table('article_category')->get();
        $res = array();
        $r = array();
        foreach($categorys as $category){
            $r['title'] = $category->category_name;
            $r['value'] = $category->id;
            $res[] = $r;
        }
        return response()->json($res);
    }
    
    public function getPermtsGroup(Request $request) {
        $res = array();
        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $value) {
            $arr = $value->getAction();
            if($arr['prefix'] !== 'api'){
                $rs = array();
                // if(strpos($arr['controller'],'AdminController')){
                    $rs['title'] = $arr['controller'];
                    $rs['value'] = $arr['controller'];
                    $res[] = $rs;
                // }
            }
        }
        return response()->json($res);
    }
}