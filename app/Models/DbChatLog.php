<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbChatLog
 */
class DbChatLog extends Model
{
    protected $table = 'db_chat_log';

    public $timestamps = true;

    protected $fillable = [
        'userid',
        'client_id'
    ];

    protected $guarded = [];

        
}