<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbTjMember
 */
class DbTjMember extends Model
{
    protected $table = 'db_tj_member';

    public $timestamps = true;

    protected $fillable = [
        'tj_id',
        'tj_name',
        'password',
        'c_time',
        'a_time'
    ];

    protected $guarded = [];

        
}