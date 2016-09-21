<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model {
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'chat';

    public $timestamps = false;
    
    protected $fillable = array('content','username','user_id','head_img','time');
    
}