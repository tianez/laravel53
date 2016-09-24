<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbTopic
 */
class DbTopic extends Model
{
    protected $table = 'db_topic';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'content',
        'status'
    ];

    protected $guarded = [];

        
}