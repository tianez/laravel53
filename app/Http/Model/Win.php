<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Win extends Model {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'db_chat_win';
    
    protected $fillable = array('phone');
    
}