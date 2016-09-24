<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DbXbh
 */
class DbXbh extends Model
{
    protected $table = 'db_xbh';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'sex',
        'danwei',
        'zhiwu',
        'fanghao',
        'checi'
    ];

    protected $guarded = [];

        
}