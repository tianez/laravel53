<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbConfig
 */
class DbConfig extends Model
{
    protected $table = 'db_config';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'value',
        'description'
    ];

    protected $guarded = [];

        
}