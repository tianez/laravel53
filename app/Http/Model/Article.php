<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'article';
    
    protected $fillable = array('*');
}