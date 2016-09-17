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



class CjyunController extends Controller {
    
    public function __construct() {
        // $this->middleware('auth',['except' => 'login']);
    }
    
    public function getIndex(Request $request) {
        
        return view('tk');
    }
    
    /**
    * 生成签名URL
    * @access public
    *
    * @param string $url
    * @param array $params
    * @return string
    */
    protected function sign($url = '', array $params)
    {
        $time = time();
        $params['time'] = $time;
        $params['appid'] = $this->appid;
        ksort($params);
        $sign = http_build_query($params);
        $params['sign'] = md5(md5($sign) . $this->appid . $this->secret . $time);
        
        return $url . '?' . http_build_query($params);
    }
    
}