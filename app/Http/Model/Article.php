<?php
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model {
    use SoftDeletes;
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'article';
    
    protected $fillable = array('title','keyword','excerpt','thumb','content','link','type','temp','uid','view','bookmark','comment','comment_status','status');
    
    //获取用户组的权限
    public function Tags() {
        $results = $this->belongsToMany('App\Http\Model\Category', 'article_taxonomy', 'article_id', 'cat_id');
        return $results;
    }
}