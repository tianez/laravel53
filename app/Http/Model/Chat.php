<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

use Validator;


class Chat extends Model {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'chat';
    
    // public $timestamps = false;
    
    protected $fillable = array('content','username','user_id','head_img','time');
    
    public function Validator($date, $v = true) {
        $rules = array();
        $messages = array();
        $rules['content'] = 'required|foo';
        $messages['content.required'] = '标题不能为空 ！';
        $messages['content.foo'] = '对不起，你发布的评论有敏感词 ！';
        
        $validator = Validator::make($date, $rules, $messages);
        return $validator;
    }
    
}