<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'article_category';
    
    protected $fillable = array('category_name','category_ico','category_des','pid','taxonomy','status');
    
    public function Article(){
        $results = $this->belongsToMany('App\Http\Model\Article', 'article_taxonomy', 'cat_id','article_id');
        return $results;
    }
    
}