<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbUsers22
 */
class DbUsers22 extends Model
{
    protected $table = 'db_users22s';

    public $timestamps = false;

    protected $fillable = [
        'user_name',
        'password',
        'version',
        'createdAt',
        'updatedAt'
    ];

    protected $guarded = [];

        
}