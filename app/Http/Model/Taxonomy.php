<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'article_taxonomy';
    
    protected $fillable = array('article_id','cat_id');

}