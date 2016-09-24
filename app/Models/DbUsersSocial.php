<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbUsersSocial
 */
class DbUsersSocial extends Model
{
    protected $table = 'db_users_social';

    public $timestamps = true;

    protected $fillable = [
        'uid',
        'openid',
        'nickname',
        'sex',
        'city',
        'province',
        'country',
        'headimgurl',
        'subscribe_time',
        'plat',
        'status'
    ];

    protected $guarded = [];

        
}