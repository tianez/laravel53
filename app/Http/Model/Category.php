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
    
    protected $fillable = array('*');
    
}