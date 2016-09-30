<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbUser2
 */
class DbUser2 extends Model
{
    protected $table = 'db_user2s';

    public $timestamps = false;

    protected $fillable = [
        'user_name',
        'createdAt',
        'updatedAt',
        'version'
    ];

    protected $guarded = [];

        
}