<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Meun extends Model {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'meun';
    
    protected $fillable = array('link', 'title', 'icon', 'description','roles','order', 'status');
    
}