<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\Http\Model\User;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Image;
use App\Http\Model\Fields;
use Route;
use Storage;

use Schema;
use Illuminate\Database\Schema\Blueprint;

class TestController extends Controller {
    
    public function __construct() {
        // $this->middleware('auth',['except' => 'login']);
    }
    
    public function getIndex(Request $request) {
        $actions = $request->route();
        dump($actions);
        $actions = $request->route()->getAction();
        dump($actions);
        echo Route::getCurrentRoute()->getActionName();
        dump(Route::getCurrentRoute());
        dump(Route::getRoutes());
        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $value) {
            // $arr[] =    $value->getPath();
            dump($value->getAction());
        }
        //  $actions = $request->route()->getAction();
        // abort(404, 'Unauthorized action.');
        // return response('Unauthorized.', 404);
        // $info = User::find(1);
        // dump($info);
        // $roles = $info->Roles->toArray();
        // dump($roles);
        // Fields::destroy(3);
        $d = [1,2,3,4,5,5,6];
        // Fields::create(['key' => 'Flight10','title' => 'Flight10','type'=>'text','f_add'=>json_encode($d)]);
        $data =['key' => 'Flight10','title' => '898988989','type'=>'text','f_add'=>json_encode($d)];
        // $Fields = new Fields();
        // $validator = $Fields->Validator($data);
        // if ($validator->fails()) {
        //     $out['res'] = 500;
        //     $errors = $validator->errors();
        //     $es = $errors->toArray();
        //     // $es = json_decode(json_encode($errors), TRUE);
        //     $error = array();
        //     foreach ($es as $key => $e) {
        //         $error[] = $e[0];
        //     }
        //     $out['res'] = 404;
        //     $out['msg'] = $error;
        //     return response()->json($out);
        // }
        // $res = Fields::firstOrCreate($data);
        // $info = Fields::where('id',22)->get();
        // $info = Fields::find(22)->update($data);
        // $res = $info->update($data);
        // $img = Image::make('resources/images/1.jpg')->resize(800, 600);
        // return $img->response('jpg');
    }
    
    
    public function upload(Request $request) {
        $stime = mtime();
        $data = $request->all();
        $res = array();
        $filename = $_FILES["file"]['name'];
        $file = Storage::put($filename,file_get_contents($_FILES['file']['tmp_name']));
        if($file){
            return response()->json($_FILES["file"]);
        }
    }
}