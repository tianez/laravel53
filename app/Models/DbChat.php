<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbChat
 */
class DbChat extends Model
{
    protected $table = 'db_chat';

    public $timestamps = true;

    protected $fillable = [
        'username',
        'user_id',
        'head_img',
        'time',
        'content'
    ];

    protected $guarded = [];

        
}