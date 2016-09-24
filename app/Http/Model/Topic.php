<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'topic';
    
    protected $fillable = array('title', 'content', 'status');
    
}