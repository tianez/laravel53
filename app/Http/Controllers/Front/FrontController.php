<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Model\User;
use App\Http\Model\Meun;
use App\Http\Model\Fields;
use Auth;
use DB;
use Illuminate\Http\Request;

// use App\Events\SomeEvent;

class FrontController extends Controller {
    
    public function __construct() {
        
    }
    
    public function getIndex(Request $request) {
        $user = Auth::user();
        // event(new SomeEvent($user));
        if($user){
            $user_id = $user->id;
            $roles = $this->getRoles($user_id);
            $permits = $this->getPermits($user_id);
            $perms = $this->getPerms();
            $request->session()->put('roles', $roles);
            $request->session()->put('permits', $permits);
            $request->session()->put('perms', $perms);
        }
        return view('front.index');
    }
}