<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\Fields;
use App\User;
use App\Http\Model\Roles;
use Auth;
use DB;


use JWTAuth;
use JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiController extends Controller {
    
    public function __construct() {
    }
    
    
    public function authenticate(Request $request)
    {
        $token = (string) JWTAuth::getToken();
        dump( $token);
        $token2 = JWTAuth::parseToken()->authenticate()->toArray();
        dump($token2);
        $setToken =   JWTAuth::setToken('foo.bar.baz');
        dump($setToken);
        // grab credentials from the request
        // $credentials = $request->only('email', 'password');
        $customClaims = ['foo' => 'bar', 'baz' => 'bob','ita'=>time()+10];
        $payload = JWTFactory::make($customClaims);
        dump($payload );
        $token =  (string) JWTAuth::encode($payload);
        dump(compact('token'));
        $credentials = array(
        'user_name'=>'tianez2',
        'password'=>'123456'
        );
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials,$customClaims)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
        
    }
    public function getToken(Request $request){
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            
            return response()->json(['token_expired2222'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }
    
    public function postLogin(request $request) {
        $req = $request->all();
        $data = array('user_name' => $req['username'], 'password' => $req['password']);
        $auth = Auth::attempt($data, true);
        $res = array();
        if ($auth) {
            $res['state'] = 'ok';
            $res['data'] =  Auth::user();
        } else {
            $res['msg'] = '用户名或密码错误！';
        }
        return response()->json($res);
    }
    
    public function postAdd(Request $request) {
        $data = $request->all();
        $info = $this->model->create($data);
        if($info){
            $groups = json_decode($data['groups']);
            $roles = array();
            foreach ($groups as $r) {
                $role = array('user_id'=>$info->id,'role_id'=>$r);
                $roles[] = $role;
            }
            DB::table('role_user')->insert($roles);
        }
        $out = array();
        $out['msg']= '保存成功！';
        $out['info']= $info->toArray();
        return response()->json($out);
    }
}