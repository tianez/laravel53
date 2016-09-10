<?php
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Article extends Model {
    use SoftDeletes;
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'article';
    
    protected $fillable = array('title','keyword','excerpt','thumb','content','link','type','temp','uid','view','bookmark','comment','comment_status','status','order');
    
    public function Validator($date, $v = true) {
        $rules = array();
        $messages = array();
        $rules['title'] = 'required|max:255|min:2|unique:article';
        $messages['title.required'] = '标题不能为空 ！';
        $messages['title.min'] = '标题不能少于:min个字符 ！';
        $messages['title.max'] = '标题不能多于:max个字符 ！';
        $messages['title.unique'] = '标题重复 ！';
        $validator = Validator::make($date, $rules, $messages);
        return $validator;
    }
    
    public function Tags() {
        $results = $this->belongsToMany('App\Http\Model\Category', 'article_taxonomy', 'article_id', 'cat_id');
        return $results;
    }
}