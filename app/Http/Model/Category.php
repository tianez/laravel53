<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'db_article_category';
    
    protected $fillable = array('category_name','category_ico','category_des','pid','taxonomy','status');
    
    public function Article(){
        $results = $this->belongsToMany('App\Http\Model\Article', 'db_article_taxonomy', 'cat_id','article_id');
        return $results;
    }
    
}